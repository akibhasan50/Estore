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
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('subcategory_id');
            $table->string('title',100)->unique();
            $table->string('slug',110)->unique();
            $table->longText('description');
            $table->string('in_stock',30)->default('true');
            $table->decimal('price',10,2);
            $table->decimal('sale_price',10,2);
            $table->string('image',120);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('category_id')->references('id')
            ->on('categories')->softDelete('cascade');

            $table->foreign('subcategory_id')->references('id')
            ->on('subcategories')->softDelete('cascade');
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
