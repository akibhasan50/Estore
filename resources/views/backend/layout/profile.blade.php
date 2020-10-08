@extends('backend.layout.master')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">User Profile</h1>
      @if (session('msg'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <strong>{{session('msg')}}</strong> 
      </div>
      <script>
        $(".alert").alert();
      </script>
      @endif
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Profile</li>
        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
      </ol>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-8 mb-4">
        <!-- Simple Tables -->
        <div class="card">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">User Profile</h6>
         
          </div>
          <div class="container">
            <form action="{{route('registration')}}" method="post">
                @csrf
                  <div class="form-group">
                    <label for="">name</label>
                    <input type="text"
                      class="form-control" value="{{old('name')}}"  name="name" id="" aria-describedby="helpId" placeholder="{{Auth::user()->name}}">
                      @error('name')
                      <strong class="text-danger">{{$message}}</strong>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="">email</label>
                    <input type="text"
                      class="form-control" value="{{old('email')}}" name="email" id="" aria-describedby="helpId" placeholder="{{Auth::user()->email}}">
                     @error('email')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                  </div>
                
                
                <button type="submit" class="btn btn-primary btn-block">Update</button>
                </form>
          </div>
          <div class="card-footer"></div>
        </div>
      </div>
    </div>
    <!--Row-->



  </div>

@endsection