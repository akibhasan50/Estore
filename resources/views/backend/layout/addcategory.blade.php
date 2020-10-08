@extends('backend.layout.master')


@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h2 class="m-0 font-weight-bold text-primary text-center">Add New Category</h2>
            <a href="{{route('categories.index')}}" class="btn btn-sm btn-outline-success">All Category</a>
            </div>
            <div class="card-body">
              <form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label >Name</label>
                  <input type="text" name="name" class="form-control"
                    placeholder="Enter Category">

                    @error('name')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="">Banner</label>
                  <input type="file" class="form-control" name="banner" >
                  @error('banner')
                  <strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>

               <div class="form-group">
                 <label for="">Status</label>
                 <select class="form-control" name="status" >
                   <option>select status</option>
                   <option value="1">Active</option>
                   <option value="0">Dactive</option>
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