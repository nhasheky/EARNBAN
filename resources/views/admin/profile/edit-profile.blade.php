@extends('admin.master')


@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Update Profile</h1>

        <div class="row">
            <div class="col-6 col-xl-6">


                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">×</span>
                     </button>
                    <div class="alert-message">
                        <strong>Success!</strong> {{session('success')}}
                    </div>
                </div>
                @endif


                <div class="card">
                   
                    <div class="card-body">
                        <form action="{{url('admin/edit-profile')}}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                          <label>Name</label>
                          <input type="text" class="form-control" name="name"  value="{{Auth::user()->name}}">
                          @error('name')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                       </div>
                       <div class="form-group mb-3">
                          <label>Phone</label>
                          <input type="text" class="form-control" name="phone"  value="{{Auth::user()->phone}}">
                          @error('phone')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                       </div>
                       <div class="form-group mb-3">
                          <label>Email</label>
                          <input type="email" class="form-control" name="email"  value="{{Auth::user()->email}}">
                          @error('email')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                       </div>
                       <div class="form-group mb-3">
                          <label>Address</label>
                          <input type="text" class="form-control" name="address"  value="{{Auth::user()->address}}">
                          @error('address')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                       </div>

                       
                       <button type="submit" class="btn btn-primary">Update Profile</button>

                    </form>
                    </div>


                </div>
            </div>

            
        </div>

    </div>
</main>


@endsection