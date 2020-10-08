@extends('layouts.master')

@section('content')
 <div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h2 class="m-0 font-weight-bold text-primary text-center">Your Profile</h2>
         
            </div>
            <div class="card-body">
              <form method="POST" action="" >
                @csrf
               
                <div class="form-group">
                  <label class="h4"> Name</label>
                  <input type="text" name="name" disabled  class="form-control"
                value="{{Auth::user()->name}}">

                </div>
                <div class="form-group">
                  <label class="h4"> Emal</label>
                  <input type="text" name="email" disabled  class="form-control"
                value="{{Auth::user()->email}}">

                </div>

                <div class="form-group">
                  <label class="h4"> Phone</label>
                  <input type="text" name="phone" disabled  class="form-control"
                value="{{Auth::user()->phone}}">

                </div>
           
              </form>
            </div>
          </div>
        
    </div>
</div>   
@endsection