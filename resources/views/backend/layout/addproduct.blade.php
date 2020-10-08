@extends('backend.layout.master')


@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h2 class="m-0 font-weight-bold text-primary text-center">Add New Product</h2>
              <a href="{{route('products.index')}}" class="btn btn-sm btn-outline-info">All Products</a>

            </div>
            <div class="card-body">
            <form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label class="h4"  for="exampleInputEmail1">Product Name</label>
                  <input type="text" class="form-control"  value="{{old('title')}}" name="title"  placeholder="Enter Product Name">

                    @error('title')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                  <label  class="h4" for="">Category</label>
                  <select class="form-control" name="category" id="catgid"  onchange="get_sub_cat()">
                    <option>select category</option>
                    @foreach ($showcat as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>

                  @error('category')
                  <strong class="text-danger">{{$message}}</strong>
                  @enderror

                 
                </div>
                <div class="form-group">
                  <label  class="h4" for="">Subategory</label>
                  <select class="form-control" name="subcategory" id="subcategory">
                    <option>select subcategory</option>
                  </select>

                  @error('subcategory')
                  <strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="h4"  for="exampleInputEmail1">Price</label>
                  <input type="text" class="form-control" value="{{old('price')}}" name="price"  placeholder="Product price">

                    @error('price')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="form-group">
                  <label class="h4"  for="exampleInputEmail1">Selling price</label>
                  <input type="text" class="form-control" value="{{old('sale_price')}}" name="sale_price"  placeholder="Product selling price">

                    @error('sale_price')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                  <label  class="h4" for="">Description</label>
                  <textarea class="form-control" name="description" value="{{old('description')}}" rows="5"></textarea>

                  @error('description')
                  <strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
               
               <div class="form-group">
                 <label class="h4" >Main Images</label>
                 <input type="file" class="form-control" name="image">
                
               </div>
               <div class="form-group">
                 <label class="h4" >Sub Image</label>
                 <input type="file" class="form-control" name="subimg[]"   accept="image/*" multiple >
                
               </div>
               
               <div class="form-group">
                <label class="h4">Stock</label>
                <select class="form-control" name="stock" >
                  <option>select stock</option>
                  <option value="true">in stock</option>
                  <option value="false">out of stock</option>
                </select>

                @error('stock')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
              </div>

               <div class="form-group">
                <label class="h4">Status</label>
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

<script>

  function get_sub_cat(){
    var catgid = $("#catgid").val();
    //var token = $('input[name="_token"]').val();
    
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    
     url: "{{route('products.showsubcat')}}",
    type: "POST",
    data: {catgid:catgid},
    success: function (result) {
      $('#subcategory').html(result);
    }
  });
  }

</script>
@endsection