@extends('frontend.master')

@section('content')
    <section class="container">
        <nav aria-label="breadcrumb" class="mt-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Register</li>
            </ol>
        </nav>

        <div class="contact">
            <div class="col-md-6 mx-auto">
                <div class="contact-box">
                    <h3 class="mb-4">Create Account</h3>
                    <form  method="post" action="{{ url('register') }}" enctype="multipart/form-data">
                        @csrf

                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Account Type</label>
                        <select name="type" id="" class="form-control">
                            <option value="">Select Type</option>
                            <option value="Buyer">I Am Buyer</option>
                            <option value="Seller">I Am Seller</option>
                        </select>
                        @error('type')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>   

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Your Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Your Phone</label>
                        <input type="text" class="form-control" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('phone')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Your Address</label>
                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('address')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                        @error('password')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3">
                       <div>
                            <label for="exampleInputPassword1" class="form-label">Profile Photo</label>
                       </div>
                        <input type="file" name="profile">
                        @error('profile')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Register Now</button>
                </form>
                </div>
            </div>
        </div>
    </section>
@endsection

