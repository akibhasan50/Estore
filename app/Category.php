<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
       parent::boot();

       static::creating( function($category){
         
         $category->slug =Str::slug($category->name);
       });
    }

    public function subcategories()
    {    
       return  $this->hasMany(Subcategory::class);
    }

    public function product()
    {     
       return  $this->hasMany(Product::class);
    }

 
}
