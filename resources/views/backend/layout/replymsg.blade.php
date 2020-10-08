@extends('backend.layout.master')


@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h2 class="m-0 font-weight-bold text-primary text-center">Reply Message</h2>
              <a href="{{url('/admin/message/')}}" class="btn btn-sm btn-outline-success">All Message</a>
            </div>
            <div class="card-body">
             
              <form method="POST" action="{{route('messageSend')}}">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">To</label>
                  <input type="text" name="toemail" class="form-control"
                value="{{$replyto->email}}">

                    @error('email')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">From</label>
                  <input type="text" name="fromemail" class="form-control"
                    >

                    @error('name')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="form-group">
                 <div class="form-group">
                   <label for="">Reply</label>
                   <textarea class="form-control" name="reply" id="" rows="3"></textarea>
                 </div>
                
                
                
                <button type="submit" class="btn btn-primary">Send</button>
              </form>
            
             
            </div>
          </div>
        
    </div>
</div>

@endsection