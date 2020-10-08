@extends('backend.layout.master')

@section('content')
    <section class="confirmation_part section_padding">
    <div class="container">
      <div class="row  justify-content-center">
        
        <div class="col-lg-12 my-3">
         <a class="btn btn-info"  href="{{url('/admin/pdf',$orderinfo->id)}}" role="button"><i class="fa fa-download" aria-hidden="true"></i> Download Pdf</a>
        </div>
        
        <div class="col-lg-4 col-lx-4 my-3">
        
          <div class="single_confirmation_details">
          
            
              <ul class="list-group">
                  <li class="list-group-item active">order info</li>
                  <li class="list-group-item">
                    <p>order id : {{$orderinfo->id}}</p>
                  </li>
                  <li class="list-group-item">
                    <p>date :  {{$orderinfo->created_at->diffForHumans()}}</p>
                  </li>
                  <li class="list-group-item">
                    <p>Total :   USD {{$orderinfo->total_amount}}</p>
                  </li>
                  <li class="list-group-item">
                    <p>payment status :  {{$orderinfo->payment_status}}</p>
                  </li>
                  <li class="list-group-item">
                    <p>Order status :  {{$orderinfo->order_status}}</p>
                  </li>
                  
              </ul>
        
          </div>
        </div>
        <div class="col-lg-4 col-lx-4 my-3">
        
          <div class="single_confirmation_details">
          
            
              <ul class="list-group">
                  <li class="list-group-item active">Billing Address</li>
                  <li class="list-group-item">
                    <p>Name : {{$orderinfo->user->name}}</p>
                  </li>
                  <li class="list-group-item">
                    <p>Email :  {{$orderinfo->user->email}}</p>
                  </li>
                  
                  <li class="list-group-item">
                    <p>Phone:  {{$orderinfo->user->phone}}</p>
                  </li>
                  
                  
              </ul>
        
          </div>
        </div>
        <div class="col-lg-4 col-lx-4 my-3">
        
          <div class="single_confirmation_details">
          
            
              <ul class="list-group">
                  <li class="list-group-item active">shipping Address</li>
                  <li class="list-group-item">
                    <p>Name : {{$orderinfo->customer_name}}</p>
                  </li>
                  <li class="list-group-item">
                    <p>Email :  {{$orderinfo->customer_email}}</p>
                  </li>
                  
                  <li class="list-group-item">
                    <p>Phone:  {{$orderinfo->customer_phone}}</p>
                  </li>
                  <li class="list-group-item">
                    <p>Address: {{$orderinfo->shipping_address}}</p>
                  </li>
                  <li class="list-group-item">
                    <p>City: {{$orderinfo->city}}</p>
                  </li>
                  <li class="list-group-item">
                    <p>Zip:  {{$orderinfo->zip}}</p>
                  </li>
                  
                  
              </ul>
        
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-lg-12">
        <h3>Order Details</h3>
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                     <th scope="col" >Product name</th>
                  <th scope="col">Product id</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($prodinfo as $product)
                   <tr>
                  <th><span>{{$product->product_name}}</span></th>
                  <th ><span>{{$product->product_id}}</span></th>
                  <th>{{$product->quantity}}</th>
                  <th> <span>${{$product->price}}</span></th>
                </tr>
             
                </tbody>
        </table>
          <div class="order_details_iner">
          
            
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection