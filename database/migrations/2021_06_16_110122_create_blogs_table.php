<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('main_category_id')->unsigned()->index();
            $table->string('image')->default('default.png');
            $table->boolean('is_active')->default(0);
            $table->boolean('show_in_homepage')->default(0);
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('main_category_id')
                ->references('id')
                ->on('main_categories')
                ->onDelete('cascade')
                ->onupdate('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('blogs');
    }
}
