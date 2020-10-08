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
                                <h2>product Details</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      <div class="container my-5">
        <div class="card">
          <div class="container-fliud">
            <div class="wrapper row">
              <div class="preview col-md-6">
                
                <div class="preview-pic tab-content">
                  <div class="tab-pane active" id="pic-1"><img src="{{url($product->image)}}" /></div>
                  
                 
                </div>
                <ul class="preview-thumbnail nav nav-tabs">
             
                  @foreach ($subimg as $item)
                  <li><a data-target="#pic-1" data-toggle="tab"><img src="{{url($item->sub_image)}}" /></a></li>
                 
                  @endforeach
           
                </ul>
                
              </div>
              <div class="details col-md-6">
              <h3 class="product-title py-3">{{$product->title}}</h3>
                <div class="rating py-3">
                  <div>
                    <h4 class="py-3">category:{{$product->category->name}}</h4>
                  </div>
                  <div>
                    <h4 class="py-3">Subcategory: {{$product->subcategory->name}}</h4>
                  </div>
               
                <h4 class="price py-3">current price: <span>${{$product->sale_price}}</span></h4>
               
                <h5 class="sizes py-3">Product stock:
                  <span class="size" data-toggle="tooltip" title="small">{{$product->in_stock = (true) ? "in stock" :"out of stock"  }}</span>
                 
                </h5>
              <form class="form-inline" action="{{url('/cart/')}}" method="post">
                  @csrf
                    
                    <input type="number" id="qty"  class="form-control" value="1" min="1">
                <input type="hidden" name="product_id"  value="{{$product->id}}">
                    <button style="cursor: pointer"  onclick="addToCart({{$product->id}})" class="default-btn" type="button">Add to Cart</button>
                </form>
               
           
                
              </div>
            </div>
            <hr>
            <div class="col-lg-12 mt-40">
              <h2>description</h2>
              <hr>
              <p  class="product-description">{{$product->description}}
              </p>
            </div>
          </div>
        </div>
      </div>

    

      <!--================End Single Product Area =================-->
       <!-- subscribe part here -->
       <section class="subscribe_part section_padding">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-8">
                      <div class="subscribe_part_content">
                          <h2>Get promotions & updates!</h2>
                          <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p>
                          <div class="subscribe_form">
                              <input type="email" placeholder="Enter your mail">
                              <a href="#" class="btn_1">Subscribe</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- subscribe part end -->


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
        }
    });
    }
</script>
@endsection