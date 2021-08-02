<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('slider_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->string('sub_title')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['slider_id', 'locale']);
            $table->foreign('slider_id')
                ->references('id')
                ->on('sliders')
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
        Schema::dropIfExists('slider_translations');
    }
}
