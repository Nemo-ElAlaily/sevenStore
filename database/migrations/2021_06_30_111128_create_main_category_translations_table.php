<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_category_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('main_category_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name'); // translatable
            $table->string('slug'); // translatable

            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();

            $table->softDeletes();

            $table->unique(['main_category_id', 'locale']);
            $table->foreign('main_category_id')
                ->references('id')
                ->on('main_categories')
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
        Schema::dropIfExists('main_category_translations');
    }
}
