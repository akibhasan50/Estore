@extends('backend.layout.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h2 class="m-0 font-weight-bold text-primary text-center">Edit Order</h2>
            <a href="{{route('categories.index')}}" class="btn btn-sm btn-outline-success">All Order</a>
            </div>
            <div class="card-body">
              <form method="POST" action="{{url('/admin/orders-update',$orderinfo->id)}}" >
                @csrf
               
                <div class="form-group">
                  <label class="h4">Customer Name</label>
                  <input type="text" name="name" disabled  class="form-control"
                value="{{$orderinfo->customer_name}}">

                </div>
               
                
                <div class="form-group">
                  <label class="h4">Order Status</label>
                  <select class="form-control" name="ostatus" id="">
                    <option>select status</option>
                    <option @if ($orderinfo->order_status == 'pending') selected @endif  value="pending">pending</option>
                    <option  @if ($orderinfo->order_status == 'processing') selected @endif value="processing">Processing</option>
                    <option  @if ($orderinfo->order_status == 'delivered') selected @endif value="delivered">Delivered</option>
                  </select>
 
                  @error('status')
                  <strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="h4">Payment Status</label>
                  <select class="form-control" name="pstatus" id="">
                    <option>select status</option>
                    <option @if ($orderinfo->payment_status == 'pending')  selected @endif  value="pending">pending</option>
                    <option @if ($orderinfo->payment_status == 'successfull') selected @endif  value="successfull">Successfull</option>
                  </select>
 
                  @error('status')
                  <strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
            </div>
          </div>
        
    </div>
</div>
@endsection