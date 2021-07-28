<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class DatabaseSettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "DB_HOST" => 'required',
            "DB_DATABASE" => 'required',
            "DB_USERNAME" => 'required',
            "cpanel_username" => 'required',
            "cpanel_pass" => 'required',
           // "DB_PASSWORD" => 'required',

            "WP_DB_HOST" => 'required',
            "WP_DB_DATABASE" => 'required',
            "WP_DB_USERNAME" => 'required',
            // "WP_DB_PASSWORD" => 'required',
        ];
    } // end of rules

    public function messages()
    {
        return [
              'DB_HOST.required'  => 'The Database Host field is required',
              'DB_DATABASE.required'  => 'The Database Name  field is required',
        'DB_USERNAME.required'  => 'The Database Username field is required',
        'cpanel_username.required'  => 'The Cpanel username field is required',
        'cpanel_pass.required'  => 'The  Cpanel password field is required',
        
    'WP_DB_HOST.required'  => 'The Wordpress Host field is required',
'WP_DB_DATABASE.required'  => 'The Wordpress Database field is required',
        'WP_DB_USERNAME.required'  => 'The Wordpress Databae UserName field is required',
        ];
    }
}
