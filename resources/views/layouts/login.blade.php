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
                            <h2>Login / Register</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
       <!--================login_part Area =================-->
       <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>New to our Shop?</h2>
                            <p>create a account</p>
                                <form class="row contact_form" action="{{url('user-registration')}}" method="post" >
                                    @csrf
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Name">
                                        @error('name')
                                        <strong class="text-light">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="email" class="form-control"  name="email"  value="{{old('email')}}"  placeholder="Email">
                                        @error('email')
                                        <strong class="text-light">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control"  name="phone"  value="{{old('phone')}}" placeholder="phone">
                                        @error('phone')
                                        <strong class="text-light">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" name="password" value="{{old('password')}}"  placeholder="Password">
                                        @error('password')
                                        <strong class="text-light">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" name="confirm_password"   placeholder="Confirm Password">
                                        @error('confirm_password')
                                        <strong class="text-light">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group">
                                        
                                        <button type="submit" value="submit" class="btn_3" style="cursor: pointer">
                                            Sign up
                                        </button>
                                       
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3 class="text-info" style="letter-spacing: 3px">Welcome  Back ! <br>
                                Please  Log in  now</h3>
                            <form class="row contact_form" action="{{url('login-user')}}" method="post" novalidate="novalidate">
                                @csrf
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control"  name="email" value=""
                                        placeholder="Email">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value=""
                                        placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group">
                               
                                    <div class="creat_account d-flex align-items-center">
                                        <a href="{{url('/login/facebook')}}" class="fb socbtn mr-3">
                                         <i class="fab fa-facebook" aria-hidden="true"></i></i>       Facebook Login
                                        </a>
                                        <a href="{{url('/login/google')}}" class="google socbtn">
                                            <i class="fab fa-google" aria-hidden="true"></i></i>   Google Login
                                            </a>
                                    </div>
                                    <button type="submit" value="submit" class="btn_3" style="cursor: pointer">
                                        log in
                                    </button>
                                    <a class="lost_pass" href="#">forget password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->
@endsection