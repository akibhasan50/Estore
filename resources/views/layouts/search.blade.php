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
                                <h2>Search Result For : {{session()->get('query')}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
  <section class="latest-product-area padding-bottom mt-30">
        <div class="container">
            <div class="row product-btn d-flex justify-content-end align-items-end">
                <!-- Section Tittle -->
                <div class="col-xl-4 col-lg-5 col-md-5">
                    <div class="section-tittle mb-30">
                    <h3>Total {{$product->count()}} result found</h3>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 col-md-7">
                    
                </div>
            </div>
            <!-- Nav Card -->
            <div class="tab-content" id="nav-tabContent">
                <!-- card one -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    

                    <div class="row">
                        @if ($product->count() > 0 )
                        @foreach ($product as $ltproduct)

                        <div class="col-xl-4 col-lg-4 col-md-6"> 
                            <div class="single-publication shadow">
                                <figure>
                                 
                                    <a href="{{url('/product_details',$ltproduct->id)}}"> <img src="{{url($ltproduct->image)}}" alt="" style="height: 250px; width:280px;"></a>
                                </figure>
    
                                <div class="publication-content">
                             
                                    <h3><a href="{{url('/product_details',$ltproduct->id)}}">{{$ltproduct->title}}</a></span>
                                       </h3>
                                            <div class="product-ratting">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star low-star"></i>
                                                <i class="far fa-star low-star"></i>
                                            </div>
                                    <h4 class="price">${{$ltproduct->price}} <span>${{$ltproduct->sale_price}}</span></h4>
                                </div>
    
                                <div class="add-to-cart">
                                    <form class="form-inline" action="{{url('/cart/')}}" method="post">
                                        @csrf
                                         
                                          <input type="hidden" name="qty" class="form-control" value="1" min="1">
                                      <input type="hidden" name="product_id" value="{{$ltproduct->id}}">
                                         <button style="cursor: pointer" class="default-btn" type="submit">Add to Cart</button>
                                      </form>
                                   
                                </div>
                            </div>
                        </div>
                    

                           
                        @endforeach
                        @else
                        <div class="justify-content-center " style="margin-left:60px">
                            <h2 class="text-center text-danger">Sorry!! No product found!!!!!</h1> 
                        </div>
                          
                        @endif
                       
                    </div>
                </div>
            
     
            </div>
            <!-- End Nav Card -->
        </div>
    </section>

@endsection
