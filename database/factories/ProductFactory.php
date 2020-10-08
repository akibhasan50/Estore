<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Model;
use App\Product;
use App\Subcategory;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
       'category_id'=> Category::all()->random(),
       'subcategory_id'=> Subcategory::all()->random(),
       'title'=>$faker->jobTitle,
       'description'=>$faker->paragraph(rand(3,7),true),
       'price'=>rand(100,500),
       'sale_price'=>rand(300,600),
       'image' => $faker->imageUrl(),
    ];
});
