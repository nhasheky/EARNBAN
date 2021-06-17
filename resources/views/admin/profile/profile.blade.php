@extends('admin.master')


@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Profile</h1>

        <div class="row">
            <div class="col-12 col-xl-12">


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
                        <table class="table table-borderless">
                        <tr>
                            <th>Name</th>
                            <td>:</td>
                            <td>{{Auth::user()->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td>{{Auth::user()->email}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>:</td>
                            <td>{{Auth::user()->phone}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>:</td>
                            <td>{{Auth::user()->address}}</td>
                        </tr>
                        
                    </table>
                    </div>


                </div>
            </div>

            
        </div>

    </div>
</main>


@endsection