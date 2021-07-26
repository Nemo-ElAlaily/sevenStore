<?php

namespace App\Http\Controllers;

use App\Http\Requests\Settings\DatabaseSettingsRequest;
use App\Models\Settings\DatabaseSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
class HomeController extends Controller
{

    public $database_name ='';
    public $database_user='';
   public $database_pass= '';


  public  $cpanel_username='';
  public  $cpanel_pass='';
   public $cpanel_theme='';
   public $prefix='';
   public $DB_HOST ='';
   public $WP_DB_HOST='';
   public $WP_DB_DATABASE='';
  public $WP_DB_USERNAME='';
 public  $WP_DB_PASSWORD='';




    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->database_pass = Str::random(11);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function redir()
    {

        //             $config = config('database.connections.mysql.database');


        // dd($config);


        // require_once __DIR__ . '/xmlapi.php';
        // require_once __DIR__ . '/test.php';
        return view('admin.cuba.forms.db-new');
        //   require("xmlapi.php"); // this can be downlaoded from https://github.com/CpanelInc/xmlapi-php/blob/master/xmlapi.php

    }


//    public function test(){
//
//        $this->cpanel_username = "future";
//        $this->prefix = substr($this->cpanel_username, 0, 7);
//
//        dd($this->prefix);
//
//    }


    public function index()
    {

        return view('home');
    } // end of index

    public function welcome()
    {
        if ((Schema ::hasTable('database_settings')) || (DatabaseSetting::first() != null)) {
            //   dd('hi');
            return redirect('/');

        }
        return view('admin.cuba.forms.db-new');
    } // end of welcome

    public function initApp(DatabaseSettingsRequest $request)
    {

//  dd($request);

        $request_data = $request -> except(['_token', '_method']);
// dd($request_data);

        $this -> database_name = $request_data['DB_DATABASE']; //without prefix
        $this -> database_user = $request_data['DB_USERNAME']; //database name and database username are both similar, change the value if you want
// $this->database_pass =  $request_data['DB_PASSWORD'];
// $this->cpanel_username = "future";
        $this -> cpanel_username = $request_data['cpanel_username'];
        $this -> prefix = substr($this -> cpanel_username, 0, 7) . '_';
        $this -> cpanel_pass = $request_data['cpanel_pass'];;
        $this -> cpanel_theme = "paper_lantern"; // change this to "x3" if you don't have paper_lantern yet

// dd($database_name);

        $this -> DB_HOST = $request_data['DB_HOST'];
        $this -> WP_DB_HOST = $request_data['WP_DB_HOST'];
        $this -> WP_DB_DATABASE = $request_data['WP_DB_DATABASE'];
        $this -> WP_DB_USERNAME = $request_data['WP_DB_USERNAME'];
        $this -> WP_DB_PASSWORD = $request_data['WP_DB_PASSWORD'];


        $path = base_path('config/database.php');
        $contents = File ::get($path);

        $contents = str_replace("env('DB_HOST')", "'" . $request_data['DB_HOST'] . "'", $contents);
        $contents = str_replace("env('DB_DATABASE')", "'" . $this -> prefix . $this -> database_name . "'", $contents);
        $contents = str_replace("env('DB_USERNAME')", "'" . $this -> prefix . $this -> database_user . "'", $contents);
        $contents = str_replace("env('DB_PASSWORD')", "'" . $this -> database_pass . "'", $contents);

        $contents = str_replace("env('WP_DB_HOST')", "'" . $request_data['WP_DB_HOST'] . "'", $contents);
        $contents = str_replace("env('WP_DB_DATABASE')", "'" . $request_data['WP_DB_DATABASE'] . "'", $contents);
        $contents = str_replace("env('WP_DB_USERNAME')", "'" . $request_data['WP_DB_USERNAME'] . "'", $contents);
        $contents = str_replace("env('WP_DB_PASSWORD')", "'" . $request_data['WP_DB_PASSWORD'] . "'", $contents);
        File ::put($path, $contents);


//Create Db
        $this -> createDb($this -> cpanel_theme, $this -> cpanel_username, $this -> cpanel_pass, $this -> database_name);

//Create User
        $this -> createUser($this -> cpanel_theme, $this -> cpanel_username, $this -> cpanel_pass, $this -> database_user, $this -> database_pass);

//Add user to DB - ALL Privileges
        $this -> addUserToDb($this -> cpanel_theme, $this -> cpanel_username, $this -> cpanel_pass, $this -> database_user, $this -> database_name, 'ALL PRIVILEGES');

//Add user to DB - SELECTED PRIVILEGES
// $this->addUserToDb($this->cpanel_theme, $this->cpanel_username, $this->cpanel_pass, $this->database_user, $this->database_name, 'DELETE,UPDATE,CREATE,ALTER');


        return redirect() -> route('done');


    } // end of initApp


    public function migrate_seed()
    {

        DB ::beginTransaction();


        Artisan ::call('migrate:fresh');


        $database_settings = DatabaseSetting ::create([
            'DB_HOST' => $this -> DB_HOST,
            'DB_DATABASE' => $this -> database_name,
            'DB_USERNAME' => $this -> database_user,
            'DB_PASSWORD' => $this -> database_pass,
            'WP_DB_HOST' => $this -> WP_DB_HOST,
            'WP_DB_DATABASE' => $this -> WP_DB_DATABASE,
            'WP_DB_USERNAME' => $this -> WP_DB_USERNAME,
            'WP_DB_PASSWORD' => $this -> WP_DB_PASSWORD,
        ]);

        DB ::commit();

        Artisan ::call('db:seed');

        $app_path = base_path('app/Providers/AppServiceProvider.php');
        $contents = File ::get($app_path);

        $contents = str_replace("// Fetch the Site Settings object", "// Fetch the Site Settings object
        \$site_settings = SiteSetting::find(1);
        \$social_settings = SocialSetting::all();
        \$main_categories = MainCategory::where('show_in_navbar','1')->get();
        View::share([
            'site_settings' =>  \$site_settings,
            'social_settings' => \$social_settings,
            'main_categories' => \$main_categories,
        ]);", $contents);

        File ::put($app_path, $contents);

        session() -> flash('success', 'Your App Started Successfully :)');
        return redirect() -> route('admin.index');


    }


    // *************************************************************************
    function createDb($cpanel_theme, $cPanelUser, $cPanelPass, $dbName)
    {
        $buildRequest = "/frontend/" . $this -> cpanel_theme . "/sql/addb.html?db=" . $dbName;

        $openSocket = fsockopen('localhost', 2082);
        if (!$openSocket) {
            return "Socket error";
            exit();
        }

        $authString = $cPanelUser . ":" . $cPanelPass;
        $authPass = base64_encode($authString);
        $buildHeaders = "GET " . $buildRequest . "\r\n";
        $buildHeaders .= "HTTP/1.0\r\n";
        $buildHeaders .= "Host:localhost\r\n";
        $buildHeaders .= "Authorization: Basic " . $authPass . "\r\n";
        $buildHeaders .= "\r\n";

        fputs($openSocket, $buildHeaders);
        while (!feof($openSocket)) {
            fgets($openSocket, 128);
        }
        fclose($openSocket);
    }

// ****************************************************************************
    function createUser($cpanel_theme, $cPanelUser, $cPanelPass, $userName, $userPass)
    {
        $buildRequest = "/frontend/" . $this -> cpanel_theme . "/sql/adduser.html?user=" . $userName . "&pass=" . $userPass;

        $openSocket = fsockopen('localhost', 2082);
        if (!$openSocket) {
            return "Socket error";
            exit();
        }

        $authString = $cPanelUser . ":" . $cPanelPass;
        $authPass = base64_encode($authString);
        $buildHeaders = "GET " . $buildRequest . "\r\n";
        $buildHeaders .= "HTTP/1.0\r\n";
        $buildHeaders .= "Host:localhost\r\n";
        $buildHeaders .= "Authorization: Basic " . $authPass . "\r\n";
        $buildHeaders .= "\r\n";

        fputs($openSocket, $buildHeaders);
        while (!feof($openSocket)) {
            fgets($openSocket, 128);
        }
        fclose($openSocket);
    }

// **********************************************************************

    function addUserToDb($cpanel_theme, $cPanelUser, $cPanelPass, $userName, $dbName, $privileges)
    {
        $buildRequest = "/frontend/" . $this -> cpanel_theme . "/sql/addusertodb.html?user=" . $cPanelUser . "_" . $userName . "&db=" . $cPanelUser . "_" . $dbName . "&privileges=" . $privileges;

        $openSocket = fsockopen('localhost', 2082);
        if (!$openSocket) {
            return "Socket error";
            exit();
        }

        $authString = $cPanelUser . ":" . $cPanelPass;
        $authPass = base64_encode($authString);
        $buildHeaders = "GET " . $buildRequest . "\r\n";
        $buildHeaders .= "HTTP/1.0\r\n";
        $buildHeaders .= "Host:localhost\r\n";
        $buildHeaders .= "Authorization: Basic " . $authPass . "\r\n";
        $buildHeaders .= "\r\n";

        fputs($openSocket, $buildHeaders);
        while (!feof($openSocket)) {
            fgets($openSocket, 128);
        }
        fclose($openSocket);
    }

} // end of controller
