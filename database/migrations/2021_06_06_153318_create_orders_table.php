<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index(); // foreign  key for users

            $table->string('status');
            $table->double('subtotal');
            $table->double('tax');
            $table->double('discount')->nullable();
            $table->double('total');
            $table->tinyInteger('payment_method')->default(0)->comment('0 = cod, 1 = paymob , 2 = fawry , 3 = credit-card , 4 = others');

            $table->string('slug')->nullable();
            $table->string('currency', 3)->nullable();

            $table->boolean('is_paid')->default(false);
            $table->timestamp('paid_at')-> nullable();
            $table->string('transaction_id')-> nullable();

            /* shipping data */
            $table->text('address_1')->nullable();
            $table->text('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->string('email');
            $table->double('shipping_cost')-> nullable();
            $table->tinyInteger('shipping_status')->default(0)->comment('0 = received, 1 = shipped , 2 = delivered , 3 = others');
            /* end shipping data */

            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('orders');
    }
}
