<?php

namespace App\Http\Controllers;

use App\Order;
use App\Orderproducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use RealRashid\SweetAlert\Facades\Alert;
use Session;

class OrderController extends Controller
{
 
    public function newOrder(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'city'=>'required',
            'zip'=>'required',
            'payment'=>'required|in:cod,online',
        ]);
        if($request->payment == "cod"){
           $order = new Order();
            $order->user_id = Auth::user()->id;

           $order->customer_name =$request->name;
           $order->customer_phone =$request->phone;
           $order->customer_email =$request->email;
           $order->city =$request->city;
           $order->zip =$request->zip;
           $order->shipping_address =$request->address;
           $order->total_amount =Session::get('grandtotal');
           $order->customer_name =$request->name;

            $order->save();
         $cartproduct = Cart::content();
    
         
            foreach ($cartproduct as $product) {
                $orderproduct = new Orderproducts();
             
               $orderproduct->order_id = $order->id;
               $orderproduct->product_id = $product->id;
               $orderproduct->quantity = $product->qty;
               $orderproduct->price = $product->price;
               $orderproduct->product_name = $product->name;
               $orderproduct->save();

            }

            Cart::destroy();
            Alert::toast('Order placed successfully!','success');
            return redirect('/confirmation-order/');
           
        }else{
            $order = new Order();
            $order->user_id = Auth::user()->id;

           $order->customer_name =$request->name;
           $order->customer_phone =$request->phone;
           $order->customer_email =$request->email;
           $order->city =$request->city;
           $order->zip =$request->zip;
           $order->shipping_address =$request->address;
           $order->total_amount =Session::get('grandtotal');
           $order->customer_name =$request->name;

            $order->save();
         $cartproduct = Cart::content();
    
         
            foreach ($cartproduct as $product) {
                $orderproduct = new Orderproducts();
             
               $orderproduct->order_id = $order->id;
               $orderproduct->product_id = $product->id;
               $orderproduct->quantity = $product->qty;
               $orderproduct->price = $product->price;
               $orderproduct->product_name = $product->name;
               $orderproduct->save();

            }

            Cart::destroy();
            Alert::toast('Order placed successfully!','success');
            return redirect('/payment/');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function confirmationOrder()
    {
        $id = Auth::user()->id;
        $orderinfo = Order::where('user_id',$id)->first();
         $prodinfo = Orderproducts::where('order_id',$orderinfo->id)->get();
         return view('layouts.confirmation',compact('orderinfo','prodinfo'));
    }

   
    
    public function payment()
    {
        return view('layouts.stripe');
    }
    public function paymentDone(Request $request)
    {

        \Stripe\Stripe::setApiKey('sk_test_51HZfchKmDbcQ6f76CYD97QVIDA4jnlefw6bDoJIo5F971wPXi70McasDZaAoarjIbM9sKwf0RlnIBOd68uc1jhZZ00mEwDnO8L');

        
        $token = $_POST['stripeToken'];
       
          $charge =  \Stripe\Charge::create([
                "amount" =>Session::get('grandtotal') * 100,
                "currency" => "USD",
                "source" => $request->stripeToken,
    ]);
     
    Alert::toast('Order placed successfully!','success');
    return redirect('/confirmation-order/');
    }
}
