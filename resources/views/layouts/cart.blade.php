@extends('layouts.master');


@section('content')
    <!-- slider Area Start-->
  <div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{asset('ui/fontend')}}/assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Card List</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- slider Area End-->
    <!--================Cart Area =================-->
    <section class="cart_area section_padding">
        <div class="container">
          <div class="cart_inner">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  @if ($cartproducts->count() > 0)
                  
                  @php
                      $sum = 0;
                  @endphp
                  <tr>
                    
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                 
                      @foreach ($cartproducts as $item)
                      <tr>
                        
                        <td>
                          <div class="media">
                            <div class="d-flex">
                              <img src="{{url($item->options->image)}}" alt="" />
                            </div>
                            <div class="media-body">
                            <p>{{$item->name}}</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <h5>${{$item->price}}</h5>
                        </td>
                        <td>
                          <div class="product_count">


                        <form action="{{url('/update-cart/')}}" method="post">
                              @csrf
                                <input type="hidden" name="rowId" value="{{$item->rowId}}">
                               <input type="number" name="qty" value="{{$item->qty}}" min="1">
                             
                               <input type="submit" value="update">
                              
                            </form>
                          </div>
                        </td>
                        <td>
                        <h5>${{$total = $item->price * $item->qty}}</h5>
                        </td>
                        <td>
                        <a href="{{url('cart-delete',$item->rowId)}}">
                            <span class="badge badge-pill badge-danger">Delete</span>        
                          </a>
                          
                        </td>
                      </tr>

                      @php
                      $sum+=$total;
                  @endphp
                      @endforeach
                    
                  <tr>
                    <td></td>
                    <td></td>
                    <td>
                      <h5>Subtotal</h5>
                    </td>
                    <td>
                    <h5>${{ $sum}}</h5>
                    </td>
                  </tr>
             
                  
              
                </tbody>
              </table>
              <div class="checkout_btn_inner float-right">
              <a class="btn_1" href="{{url('/')}}">Continue Shopping</a>
                <a class="btn_1 checkout_btn_1" href="{{url('/checkout')}}">Proceed to checkout</a>
              </div>
            </div>

            @else
            <h1 class="text-center text-danger">Sorry !!NO item in cart please add some</h1>
          @endif
          </div>
      </section>
      <!--================End Cart Area =================-->
@endsection
