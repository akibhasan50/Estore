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
            $table->unsignedInteger('user_id');
            $table->string('customer_name',60);
            $table->string('customer_phone',60);
            $table->string('customer_email',160);
            $table->string('shipping_address',100);
            $table->string('zip',100);
            $table->string('city',100);
            $table->decimal('total_amount',10,2);
            $table->string('payment_status')->default('pending');
            $table->string('order_status')->default('pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')
            ->on('users')->softDelete('cascade');
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
