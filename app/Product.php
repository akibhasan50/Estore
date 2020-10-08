<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Parsedown;
use Parsedown as GlobalParsedown;

class Product extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
       parent::boot();

       static::creating( function($product){
         
         $product->slug =Str::slug($product->title);
       });
    }

    public function category()
    {    
       return  $this->belongsTo(Category::class);
    }
    public function subcategory()
    {    
       return  $this->belongsTo(Subcategory::class);
    }

   //  public function  getBodyHtmlAttribute()
   //  {
      
 
   //      return parsedown()::instance()->text($this->description);
 
   //   }
}
