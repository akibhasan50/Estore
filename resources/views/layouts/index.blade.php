@extends('layouts.master')

@section('content')
<main>

    <!-- slider Area Start -->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            <div class="single-slider slider-height" data-background="{{asset('ui/fontend')}}/assets/img/hero/h1_hero.jpg">
                <div class="container">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-none d-md-block">
                            <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                <img src="{{asset('ui/fontend')}}/assets/img/hero/hero_man.png" alt="">
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8">
                            <div class="hero__caption">
                                <span data-animation="fadeInRight" data-delay=".4s">60% Discount</span>
                                <h1 data-animation="fadeInRight" data-delay=".6s">Winter <br> Collection</h1>
                                <p data-animation="fadeInRight" data-delay=".8s">Best Cloth Collection By 2020!</p>
                                <!-- Hero-btn -->
                                <div class="hero__btn" data-animation="fadeInRight" data-delay="1s">
                                    <a href="industries.html" class="btn hero-btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider slider-height" data-background="{{asset('ui/fontend')}}/assets/img/hero/h1_hero.jpg">
                <div class="container">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-none d-md-block">
                            <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                <img src="{{asset('ui/fontend')}}/assets/img/hero/hero_man.png" alt="">
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8">
                            <div class="hero__caption">
                                <span data-animation="fadeInRight" data-delay=".4s">60% Discount</span>
                                <h1 data-animation="fadeInRight" data-delay=".6s">Winter <br> Collection</h1>
                                <p data-animation="fadeInRight" data-delay=".8s">Best Cloth Collection By 2020!</p>
                                <!-- Hero-btn -->
                                <div class="hero__btn" data-animation="fadeInRight" data-delay="1s">
                                    <a href="industries.html" class="btn hero-btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!-- Category Area Start-->
    <section class="category-area section-padding30">
        <div class="container-fluid">
            <!-- Section Tittle -->
            <div class="row product-btnjustify-content-center">
                <!-- Section Tittle -->
                <div class="col-xl col-lg-5 col-md-5">
                    <div class="section-tittle mb-30">
                        <h2>Shop By Category</h2>
                    </div>
                </div>
               
               
            </div>
            <div class="row">
                @foreach ($showcat as $item)
                <div class="col-xl-4 col-lg-6">
                    <div class="single-category mb-30">
                        <div class="category-img">
                            <img src="{{url($item->banner)}}" alt="" style="height: 230px; width:380px;">
                            <div class="category-caption">
                            <h3 class="text-dark">{{$item->name}}</h3>
                                <span class="best"><a href="{{url('/product-by-category',$item->id)}}">Best New Deals</a></span>
                                <span class="collection">New Collection</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
              
         
            </div>
        </div>
    </section>
    <!-- Category Area End-->
    <!-- Latest Products Start -->
    <section class="latest-product-area padding-bottom">
        <div class="container">
            <div class="row product-btn d-flex justify-content-end align-items-end">
                <!-- Section Tittle -->
                <div class="col-xl-4 col-lg-5 col-md-5">
                    <div class="section-tittle mb-30">
                        <h2>Latest Products</h2>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 col-md-7">
                    <div class="properties__button f-right">
                        <!--Nav Button  -->
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                    href="#nav-home" role="tab" aria-controls="nav-home"
                                    aria-selected="true">NEW</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                    href="#nav-profile" role="tab" aria-controls="nav-profile"
                                    aria-selected="false">All</a>
                               
                              
                            </div>
                        </nav>
                        <!--End Nav Button  -->
                    </div>
                </div>
            </div>
            <!-- Nav Card -->
            <div class="tab-content" id="nav-tabContent">
                <!-- card one -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    

                    <div class="row">
                        @foreach ($latestproducts as $ltproduct)
                       
                      
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
    
                                <div class="add-to-cart" >
                                    <form class="form-inline" action="{{url('/cartadd/')}}" method="post">
                                        @csrf
                                         
                                          <input type="hidden" id="qty"  class="form-control" value="1" min="1">
                                      <input type="hidden" name="product_id"  value="{{$ltproduct->id}}">
                                         <button style="cursor: pointer"  onclick="addToCart({{$ltproduct->id}})" class="default-btn" type="button">Add to Cart</button>
                                      </form>
                                   
                                </div>
                            </div>
                        </div>
                           
                        @endforeach
                    </div>
                </div>
                <!-- Card two -->
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row">
                        @foreach ($products as $product)
                       
                       
                        <div class="col-xl-4 col-lg-4 col-md-6"> 
                            <div class="single-publication shadow" >
                                <figure>
                                 
                                    <a href="{{url('/product_details',$product->id)}}"> <img src="{{url($product->image)}}" alt="" style="height: 250px; width:280px;"></a>
                                </figure>
    
                                <div class="publication-content">
                             
                                    <h3><a href="{{url('/product_details',$product->id)}}">{{$product->title}}</a></span>
                                       </h3>
                                            <div class="product-ratting">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star low-star"></i>
                                                <i class="far fa-star low-star"></i>
                                            </div>
                                    <h4 class="price">${{$product->price}} <span>${{$product->sale_price}}</span></h4>
                                </div>
    
                                <div class="add-to-cart">
                                     <form class="form-inline" action="{{url('/cartadd/')}}" method="post">
                                        @csrf
                                         
                                          <input type="hidden" id="qty"  class="form-control" value="1" min="1">
                                      <input type="hidden" name="product_id"  value="{{$ltproduct->id}}">
                                         <button style="cursor: pointer"  onclick="addToCart({{$ltproduct->id}})" class="default-btn" type="button">Add to Cart</button>
                                      </form>
                                   
                                </div>
                            </div>
                        </div>
                           
                        @endforeach
                    </div>
                    
                </div>
     
            </div>
            <!-- End Nav Card -->
        </div>
    </section>
    <!-- Latest Products End -->
    <!-- Best Product Start -->
    <div class="best-product-area lf-padding">
        <div class="product-wrapper bg-height" style="background-image: url('{{asset('ui/fontend')}}/assets/img/categori/card.png')">
            <div class="container position-relative">
                <div class="row justify-content-between align-items-end">
                    <div class="product-man position-absolute  d-none d-lg-block">
                        <img src="{{asset('ui/fontend')}}/assets/img/categori/card-man.png" alt="">
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 d-none d-lg-block">
                        <div class="vertical-text">
                            <span>Manz</span>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8">
                        <div class="best-product-caption">
                            <h2>Find The Best Product<br> from Our Shop</h2>
                            <p>Designers who are interesten creating state ofthe.</p>
                            <a href="#" class="black-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shape -->
        <div class="shape bounce-animate d-none d-md-block">
            <img src="{{asset('ui/fontend')}}/assets/img/categori/card-shape.png" alt="">
        </div>
    </div>
    <!-- Best Product End-->
    <!-- Best Collection Start -->
    <div class="best-collection-area section-padding2">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-end">
                <!-- Left content -->
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="best-left-cap">
                        <h2>Best Collection of This Month</h2>
                        <p>Designers who are interesten crea.</p>
                        <a href="#" class="btn shop1-btn">Shop Now</a>
                    </div>
                    <div class="best-left-img mb-30 d-none d-sm-block">
                        <img src="{{asset('ui/fontend')}}/assets/img/collection/collection1.png" alt="">
                    </div>
                </div>
                <!-- Mid Img -->
                <div class="col-xl-2 col-lg-2 d-none d-lg-block">
                    <div class="best-mid-img mb-30 ">
                        <img src="{{asset('ui/fontend')}}/assets/img/collection/collection2.png" alt="">
                    </div>
                </div>
                <!-- Riht Caption -->
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="best-right-cap ">
                        <div class="best-single mb-30">
                            <div class="single-cap">
                                <h4>Menz Winter<br> Jacket</h4>
                            </div>
                            <div class="single-img">
                                <img src="{{asset('ui/fontend')}}/assets/img/collection/collection3.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="best-right-cap">
                        <div class="best-single mb-30">
                            <div class="single-cap active">
                                <h4>Menz Winter<br>Jacket</h4>
                            </div>
                            <div class="single-img">
                                <img src="{{asset('ui/fontend')}}/assets/img/collection/collection4.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="best-right-cap">
                        <div class="best-single mb-30">
                            <div class="single-cap">
                                <h4>Menz Winter<br> Jacket</h4>
                            </div>
                            <div class="single-img">
                                <img src="{{asset('ui/fontend')}}/assets/img/collection/collection5.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Best Collection End -->
    <!-- Latest Offers Start -->
    <div class="latest-wrapper lf-padding">
        <div class="latest-area latest-height d-flex align-items-center"
            data-background="{{asset('ui/fontend')}}/assets/img/collection/latest-offer.png">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-5 col-lg-5 col-md-6 offset-xl-1 offset-lg-1">
                        <div class="latest-caption">
                            <h2>Get Our<br>Latest Offers News</h2>
                            <p>Subscribe news latter</p>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-6 ">
                        <div class="latest-subscribe">
                            <form action="#">
                                <input type="email" placeholder="Your email here">
                                <button>Shop Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- man Shape -->
            <div class="man-shape">
                <img src="{{asset('ui/fontend')}}/assets/img/collection/latest-man.png" alt="">
            </div>
        </div>
    </div>
    <!-- Latest Offers End -->
    <!-- Shop Method Start-->
    <div class="shop-method-area section-padding30">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-package"></i>
                        <h6>Free Shipping Method</h6>
                        <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-unlock"></i>
                        <h6>Secure Payment System</h6>
                        <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-reload"></i>
                        <h6>Secure Payment System</h6>
                        <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Method End-->
    <!-- Gallery Start-->
    @include('layouts.partials.galary')
    <!-- Gallery End-->

</main>

     <script>

 function addToCart(product_id)
    {
        var cartid = product_id;
        var qty =$('#qty').val();

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
       $.ajax({
    
        url: "{{route('cart.addtocart')}}",
        type: "POST",
        data: {cartid:cartid,qty:qty},
        success: function (result) {
           $('#totalCartItem').html(result);
          return result.alert;
        }
    });
    }
</script>
@endsection

