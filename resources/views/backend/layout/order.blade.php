@extends('backend.layout.master')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Order Tables</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active" aria-current="page">Simple Tables</li>
      </ol>
    </div>

    <div class="row">
      <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">All orders</h6>
            <a href=""></a>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>SN#</th>
                  <th>Customer Id</th>
                  <th>Customer Name</th>
                  <th>Customer Email</th>
                  <th>Total Amount</th>
                  <th>payment Status</th>
                  <th>Order Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @php
                  $i = 0;
              @endphp
              @foreach ($orderinfo as $order)
              @php
                  $i++;
              @endphp
                  <tr>
                  <td><a href="#">{{$i}}</a></td>
                  <td>{{ $order->user_id}}</td>
                  <td>{{ $order->customer_name}}</td>
                  <td>{{ $order->customer_email}}</td>
                  <td>{{ $order->total_amount}}</td>
                  <td>

                    @if ($order->payment_status == 'pending')
                    <span class="badge badge-danger">{{$order->payment_status}}</span>
                    @else
                    <span class="badge badge-success">{{$order->payment_status}}</span>  
                    @endif
                    
              
                  </td>
                  <td>
                    
                    @switch($order->order_status)
                    @case('pending')
                    <span class="badge badge-danger">{{$order->order_status}}</span>
                        @break
                    @case('successfull')
                    <span class="badge badge-success">{{$order->order_status}}</span>
                        @break
                    @default
                    <span class="badge badge-info">{{$order->order_status}}</span>
                @endswitch
               
                      <td class="d-flex">
                          <a href="{{url('/admin/orders-edit',$order->id)}}" class="btn btn-sm btn-success mx-2">Edit</a>
                          <a href="{{url('/admin/orders-details',$order->id)}}" class="btn btn-sm btn-primary mx-2">Detail</a>
                          <a href="{{url('/admin/orders-delete',$order->id)}}" class="btn btn-sm btn-danger mx-2">Delete</a>
                        
                        
                          </td>
                  
                </tr>
              @endforeach
              
              </tbody>
            </table>
          </div>
          <div class="card-footer"></div>
        </div>
      </div>
    </div>
    <!--Row-->

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to logout?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
            <a href="login.html" class="btn btn-primary">Logout</a>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection