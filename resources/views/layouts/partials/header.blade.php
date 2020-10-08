<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top top-bg d-none d-lg-block">
                <div class="container-fluid">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left d-flex">
                                <div class="flag">
                                    <img src="{{asset('ui/fontend')}}/assets/img/icon/header_icon.png" alt="">
                                </div>
                                <div class="select-this">
                                    <form action="#">
                                        <div class="select-itms">
                                            <select name="select" id="select1">
                                                <option value="">US</option>
                                                <option value="">BAN</option>
                                                <option value="">PAK</option>
                                                <option value="">NEP</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <ul class="contact-now">
                                    <li>+01859487474</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul>
                                 @if (Auth::user())
                                 <li ><a href="{{url('/logout-user')}}" class="text-danger authuser p-2">Logout </a></li>
                                </li>
                                @else
                                 <li ><a href="{{url('/user-login')}}" class="authuser p-2">Login </a></li>
                                
                                @endif
                                  
                                    <li><a href="{{url('/confirmation-order/')}}">Orders</a></li>
                                     
                                    <li><a href="{{url('/about_us')}}">About</a></li>
                                    <li><a href="{{url('/contact_us')}}">Contact</a></li>
                                {{-- <li><a href="{{url('/checkout')}}">Checkout</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                            <div class="logo">
                                <a href="{{url('/')}}"><img src="{{asset('ui/fontend')}}/assets/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-8 col-md-7 col-sm-5">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                       <li><a href="{{url('/')}}">Home</a></li>
                                       @foreach ($testcat as $category)
                                    <li><a href="{{url('/product-by-category',$category->id)}}">{{$category->name}}</a>
                                        <ul class="submenu">
                                            @php
                                                $sub = App\Subcategory::where(['category_id'=>$category->id,'status'=>1])->get();

                                            @endphp
                                            @foreach ($sub as $item)
                                            <li><a href="{{url('/product-by-subcategory',$item->id)}}"> {{$item->name}}</a></li>
                                            @endforeach
                           
                                        </ul>
                                    </li>
                                       @endforeach
                              
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-3 col-md-3 col-sm-3 fix-card">
                            <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                <li class="d-none d-xl-block">
                                    <div class="form-box f-right ">
                                        <form method="post" action="{{url('/search/')}}">
                                        @csrf
                                        <input type="text"  name="search" placeholder="Search products">
                                       
                                        <div class="search-icon">
                                            <i class="fas fa-search special-tag"></i>
                                        </div>
                                        </form>
                                        
                                    </div>
                                </li>
                              
                                <li>
                                    <div class="shopping-card">
                                        <a href="{{url('/showcart')}}"><i class="fas fa-shopping-cart"></i></a>
                                    <span id="totalCartItem" class="htc__qua mr-3" >{{Cart::count()}}</span>
                                    </div>
                                </li>
                                @if (Auth::user())
                            <li><a href="{{url('/profile/')}}" class="authuser btn-outline-info"><i class="fa fa-user-circle" aria-hidden="true"></i> {{Auth::user()->name}}</a>
                                
                                
                                </li>
                                @else
                                <li class="d-none d-lg-block"> <a href="{{url('/user-login')}}" class="btn header-btn">Login</a></li>
                                @endif
                                
                            </ul>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>