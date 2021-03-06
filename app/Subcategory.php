<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subcategory extends Model
{
    protected $guarded = [];
    protected static function boot()
    {
    parent::boot();

    static::creating(function($subcategory){
      
      $subcategory->slug =Str::slug($subcategory->name);
    });
    }
    
    public function category()
    {   
      
       return  $this->belongsTo(Category::class);
    }
}
