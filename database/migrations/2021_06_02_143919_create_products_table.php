<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vendor_id')->unsigned()->index();
            $table->bigInteger('main_category_id')->unsigned()->index(); // main categories table

            $table->text('image')->nullable();

            $table->string('sku')->nullable();
            $table->integer('stock')->default(0);
            $table->double('regular_price', 8, 2)->nullable();
            $table->double('sale_price', 8, 2)->nullable();

            $table->string('status')->default('publish');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('vendor_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onupdate('cascade');

            $table->foreign('main_category_id')
                ->references('id')
                ->on('main_categories')
                ->onDelete('cascade')
                ->onupdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
