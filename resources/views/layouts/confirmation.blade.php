@extends('layouts.master')

@section('content')
    
    <!-- slider Area Start-->
    <div class="slider-area ">
      <!-- Mobile Menu -->
      <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{asset('ui/fontend')}}/assets/img/hero/category.jpg">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="hero-cap text-center">
                          <h2>Order Details</h2>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- slider Area End-->

  <!--================ confirmation part start =================-->
  <section class="confirmation_part section_padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="confirmation_tittle">
          <h2>{{session('successmsg')}}</h2>

          </div>
        </div>
      
        
        <div class="col-lg-12 col-lx-4">
          <div class="single_confirmation_details">
            <h4>order info</h4>
            <ul>
              <li>
                <p>order id</p><span>: {{$orderinfo->id}}</span>
              </li>
              <li>
                <p>data</p><span>: {{$orderinfo->created_at->diffForHumans()}} </span>
              </li>
              <li>
                <p>total</p><span>: USD {{$orderinfo->total_amount}} </span>
              </li>
            
              <li>
                <p>payment status</p><span>: {{$orderinfo->payment_status}}</span>
              </li>
              <li>
                <p>Order status</p><span>: {{$orderinfo->order_status}}</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-12 col-lx-4">
          <div class="single_confirmation_details">
            <h4>Billing Address</h4>
            <ul>
              <li>
              <p>Name</p><span>:{{Auth::user()->name}}</span>
              </li>
              <li>
                <p>Email</p><span>:{{Auth::user()->email}}</span>
              </li>
              <li>
                <p>Phone</p><span>:{{Auth::user()->phone}}</span>
              </li>
             
            </ul>
          </div>
        </div>
        <div class="col-lg-12 col-lx-4">
          <div class="single_confirmation_details">
            <h4>shipping Address</h4>
            <ul>
              <li>
              <p>Name</p><span>: {{$orderinfo->customer_name}}</span>
              </li>
              <li>
                <p>Email</p><span>: {{$orderinfo->customer_email}}</span>
              </li>
              <li>
                <p>Phone</p><span>: {{$orderinfo->customer_phone}}</span>
              </li>
              <li>
                <p>Address</p><span>: {{$orderinfo->shipping_address}}</span>
              </li>
              <li>
                <p>City</p><span>: {{$orderinfo->city}}</span>
              </li>
              <li>
                <p>Zip</p><span>: {{$orderinfo->zip}}</span>
              </li>
              
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="order_details_iner">
            <h3>Order Details</h3>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col" colspan="2">Product name</th>
                  <th scope="col">Product id</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($prodinfo as $product)
                   <tr>
                  <th colspan="2"><span>{{$product->product_name}}</span></th>
                  <th ><span>{{$product->product_id}}</span></th>
                  <th>{{$product->quantity}}</th>
                  <th> <span>${{$product->price}}</span></th>
                </tr>
              @endforeach
               
               
              
              </tbody>
             
            </table>
          </div>
        </div>
      </div>
    </div>

    
  </section>
  <!--================ confirmation part end =================-->
@endsection