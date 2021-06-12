<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabaseSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('database_settings', function (Blueprint $table) {
            $table->id();
            $table -> string('WP_DATABASE_URL')->nullable();
            $table -> string('WP_DB_CONNECTION')->nullable();
            $table -> string('WP_DB_HOST')->nullable();
            $table -> string('WP_DB_PORT')->nullable();
            $table -> string('WP_DB_DATABASE')->nullable();
            $table -> string('WP_DB_USERNAME')->nullable();
            $table -> string('WP_DB_PASSWORD')->nullable();
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
        Schema::dropIfExists('database_settings');
    }
}
