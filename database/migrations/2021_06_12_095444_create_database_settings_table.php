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
            /* new database */
            $table -> string('DB_HOST')->nullable();
            $table -> string('DB_DATABASE')->nullable();
            $table -> string('DB_USERNAME')->nullable();
            $table -> string('DB_PASSWORD')->nullable();
            /* wordpress database */
            $table -> string('WP_DB_HOST')->nullable();
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
