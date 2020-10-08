@extends('backend.layout.master')


@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h2 class="m-0 font-weight-bold text-primary text-center">Edit Category</h2>
            <a href="{{route('categories.index')}}" class="btn btn-sm btn-outline-success">All Category</a>
            </div>
            <div class="card-body">
              <form method="POST" action="{{route('categories.update',$singlecat->id)}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                  <label class="h4">Name</label>
                  <input type="text" name="name"  class="form-control"
                value="{{old('name').$singlecat->name}}">

                    @error('name')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                  <label class="h4">Banner</label><br>
                  <img src="{{url($singlecat->banner)}}" alt="" style="height: 50px; width:50px;"> <br><br>
                  <input type="file" class="form-control" name="banner" >
                  <input type="hidden" name="oldimg" value="{{$singlecat->banner}}">
                  @error('banner')
                  <strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>

               <div class="form-group">
                 <label class="h4">Status</label>
                 <select class="form-control" name="status" id="">
                   <option>select status</option>
                   <option @if ($singlecat->status == 1) selected @endif value="1">Active</option>
                   <option @if ($singlecat->status == 0) selected @endif value="0">Dactive</option>
                 </select>

                 @error('status')
                 <strong class="text-danger">{{$message}}</strong>
                 @enderror
               </div>
                
                
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        
    </div>
</div>

@endsection