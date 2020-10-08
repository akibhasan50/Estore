@extends('layouts.master')

@section('content')

<main>
      <!-- slider Area Start-->
      <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{asset('ui/fontend')}}/assets/img/hero/category.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Checkout</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- slider Area End-->
      <section class="checkout_area section_padding">
        <div class="container">
              {{-- <div class="col-lg-8 col-md-6 ">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3 class="text-danger">If you are not logged in Please Login First</h3>
                            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="name" value=""
                                        placeholder="Username">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value=""
                                        placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group">
                                
                                    <button type="submit" value="submit" class="btn_3">
                                        log in
                                    </button>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
              </div> --}}
                
          <div class="billing_details">
            <div class="row">


              <div class="col-lg-7">
                <h2>Billing  Details</h3>
               <form class="row contact_form" action="{{url('/new-order')}}" method="post">
                @csrf
                  <div class="col-md-12 form-group p_star">
                   <input type="text" class="form-control" id="first" name="name" value="{{auth()->user()->name}}" />
                   
                   @error('name')
                        <strong class="text-danger">{{$message}}</strong>
                   @enderror
                  </div>
                  <div class="col-md-6 form-group p_star">
                    <input type="text" class="form-control" id="number" name="phone"  value="{{auth()->user()->phone}}"/>
                    @error('name')
                        <strong class="text-danger">{{$message}}</strong>
                   @enderror
                  </div>
                  <div class="col-md-6 form-group p_star">
                    <input type="text" class="form-control" id="email" name="email"  value="{{auth()->user()->email}}"/>
                    @error('email')
                        <strong class="text-light">{{$message}}</strong>
                   @enderror
                  </div>
                 
                  <div class="col-md-12 form-group p_star">
                    <input type="text" class="form-control" id="add1" name="address"  placeholder="Address"/>
                     @error('address')
                        <strong class="text-danger">{{$message}}</strong>
                   @enderror
                  </div>
                  
                  <div class="col-md-12 form-group p_star">
                    <input type="text" class="form-control" id="city" name="city"  placeholder="City"/>
                   @error('city')
                        <strong class="text-danger">{{$message}}</strong>
                   @enderror
                  </div>
                 
                  <div class="col-md-12 form-group">
                    <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP" />

                     @error('zip')
                        <strong class="text-danger">{{$message}}</strong>
                   @enderror
                  </div>
{{--                 
                </form> --}}
              </div>
              <div class="col-lg-5">
                <div class="order_box">
                   
                  <h2>Your cart ({{$cartproducts->count()}})</h2>
                  <ul class="list">
                    <li>
                      <a href="#">Product
                        <span>Total</span>
                      </a>
                    </li>
                            @php
                            $sum = 0;
                            @endphp
                    @foreach ($cartproducts as $item)
                      <li>
                          <a href="#">{{$item->name}}
                            <span class="middle">x ({{$item->qty}})</span>
                            <span class="last">${{$total =$item->qty * $item->price }}</span>
                          </a>
                      </li>
                          @php
                            $sum+=$total;
                        @endphp
                    @endforeach
                  
             
                   
                  </ul>
                  <ul class="list list_2">
                    <li>
                      <a  href="#">Subtotal
                        <span>${{$grandtotal = $sum}}</span>
                        {{Session::put('grandtotal',$grandtotal)}}
                      </a>
                    </li>
                   
                  </ul>


                  <div class="form-check">
                  
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="payment"  value="cod">
                     Cash on Delivery
                    </label> <br>
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="payment" id="" value="online" >
                     Online Payment
                    </label> 
                    <br><br>

                     @error('payment')
                        <strong class="text-danger">{{$message}}</strong>
                      @enderror
                  </div>
                 
                
                <button type="submit" class="btn_3 btn-100" style="cursor:pointer;">Continue Checkout</button>
                  
                </div>
                
              </form>
              </div>
            </div>
          </div>
        </div>
      </section>
</main>

@endsection