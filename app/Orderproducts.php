<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderproducts extends Model
{
    protected $guarded = [];

    public function order()
    {   
       return  $this->belongsTo(Order::class);
    }
    public function products()
    {   
       return  $this->belongsTo(Product::class);
    }
}
