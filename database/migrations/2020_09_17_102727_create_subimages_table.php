<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subimages', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('product_id');
            $table->string('sub_image',100);
            $table->timestamps();

            $table->foreign('product_id')->references('id')
            ->on('products')->softDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subimages');
    }
}
