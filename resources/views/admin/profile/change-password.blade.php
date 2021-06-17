@extends('admin.master')


@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Profile</h1>

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
                        <form action="{{url('admin/change-password')}}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label>New Password</label>
                                <input type="password" class="form-control" name="password"  placeholder="Enter new password">
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group  mb-3">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation"  placeholder="Re-type password">
                            </div>

                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>


                    </div>


                </div>
            </div>

            
        </div>

    </div>
</main>


@endsection