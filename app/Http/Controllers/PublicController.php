<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Subcategory;
use App\Subimage;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $showcat =Category::where('status',1)->latest()->get();
        $products =Product::where('status',1)->inRandomOrder()->get();
        $latestproducts =Product::where('status',1)->latest()->take(4)->get();
        return view('layouts.index',compact('showcat','products','latestproducts'));
    }
    public function contact()
    {
        return view('layouts.contact');
    }
    public function checkout()
    {
        $cartproducts = Cart::content();
        return view('layouts.checkout',compact('cartproducts'));
    }
   
   
    public function about()
    {
        return view('layouts.about_us');

    }
    public function product_details($id)
    {
        $product =Product::with('category','subcategory')->Find($id);
        $subimg =Subimage::where('product_id',$id)->get();
        return view('layouts.product_details',compact('product','subimg'));

    }
    public function category_products($id)
    {
        $latestproducts =Product::with('category')->where('category_id',$id)->get();
        $catname =Category::Find($id);
       
        return view('layouts.productbycat',compact('latestproducts','catname'));

    }
    public function subcategory_products($id)
    {
        $latestproducts =Product::with('category')->where('subcategory_id',$id)->get();
        $subcatname =Subcategory::Find($id);
       
        return view('layouts.productbysubcat',compact('latestproducts','subcatname'));

    }
    public function searchItems(Request $request)
    {
        $query = $request->search;
        session()->put('query', $query);
        
        $product = Product::where('title','LIKE',"%$query%")->get();
        return view('layouts.search',compact('product'));

    }
    public function ShowProfile()
    {
        return view('layouts.profile');

    }
}
