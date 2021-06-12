<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_setting_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('site_setting_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->string('welcome_phrase')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['site_setting_id', 'locale']);
            $table->foreign('site_setting_id')
                ->references('id')
                ->on('site_settings')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_setting_translations');
    }
}
