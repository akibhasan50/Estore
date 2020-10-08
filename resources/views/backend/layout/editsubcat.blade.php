@extends('backend.layout.master')


@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h2 class="m-0 font-weight-bold text-primary text-center">Add New Subategory</h2>
            <a href="{{route('subcategory.index')}}" class="btn btn-sm btn-outline-success">All Subategory</a>
            </div>
            <div class="card-body">
              <form method="POST" action="{{route('subcategory.update',$singlesubcat->id)}}">
                @csrf
                @method('put')
                <div class="form-group">
                  <label >Name</label>
                  <input type="text" name="name"   class="form-control"
                    value="{{$singlesubcat->name}}">

                    @error('name')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
              

               <div class="form-group">
                 <label for="">Category</label>
                 <select class="form-control" name="category" >
                   <option>select Category</option>
                   @foreach ($showcat as $item)
                     <option @if ($singlesubcat->category_id == $item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                   @endforeach
                 
                   
                 </select>

                 @error('category')
                 <strong class="text-danger">{{$message}}</strong>
                 @enderror
               </div>
               <div class="form-group">
                 <label for="">Status</label>
                 <select class="form-control" name="status" id="">
                   <option>select status</option>
                   <option @if ($singlesubcat->status == 1) selected @endif value="1">Active</option>
                   <option @if ($singlesubcat->status == 0) selected @endif value="0">Dactive</option>
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