<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function addtocart(Request $request)
    {
        $cartid = $request->get('cartid');
        $qty = $request->get('qty');
        $product = Product::Find($cartid);
       //$product = Product::Find($request->product_id);

        Cart::add([
            'id' =>$product->id,
            'name' =>$product->title,
            'price' =>$product->price,
            'qty' =>$qty,
            'options'=>[
                'image'=>$product->image,
            ]

        ]);
        $totalItem = Cart::count();
        return $totalItem;

        // return redirect()->back();
    }


    public function showcart()
    {
        $cartproducts = Cart::content();
        //return  $cartproducts;
        return view('layouts.cart',compact('cartproducts'));
    }

    public function updatecart(Request $request)
    {
        Cart::update($request->rowId,$request->qty);
        Alert::toast('Cart Updated Successfully!','success');
        return redirect('/showcart');
    }
    public function deletecart($id)
    {
        Cart::remove($id);
        Alert::toast('Product Deleted from cart Successfully!','success');
        return redirect('/showcart');
    }
}
