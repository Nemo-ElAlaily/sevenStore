<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone')->nullable();
            $table->string('logo')->default('default.png');
            $table->string('favicon')->default('favicon.png');
            $table->longText('google_analytics')->nullable();
            $table->string('google_client_id')->nullable();
            $table->string('google_secret_key')->nullable();
            $table->string('google_redirect')->nullable();

            $table->string('facebook_client_id')->nullable();
            $table->string('facebook_secret_key')->nullable();
            $table->string('facebook_redirect')->nullable();
            
            
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_settings');
    }
}
