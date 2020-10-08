<?php

namespace App\Providers;

use App\Category;
use App\Subcategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
      
            $cat = Category::select('id','name')->where('status',1)->get();
        
            $subcat = Subcategory::where('status',1)->get();
    
            $cart = Cart::count();
           
            view()->share(['subcat'=>$subcat,'testcat'=>$cat,'cartitem'=>$cart]);
        
      
    }
}
