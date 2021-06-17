@extends('admin.master')


@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Users</h1>

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
                    <div class="card-header">
                       
                        <div class="d-flex justify-content-between">
                            <div>
                                <form action="{{url('admin/user')}}"  method="get">
                                    <input type="text" name="search" class="form-control" placeholder="Search">
                                </form>
                            </div>
                        </div>
                    </div>

                    @if(count($users) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Type</th>
                                <th>Join Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{$user->type}}</td>
                                <td>{{date('d/m/Y',strtotime($user->created_at))}}</td>
                                <td class="table-action">
                                    <a href="{{url('admin/user/'.$user->id.'/delete')}}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>

                    @else

                    <h3 class="text-center my-5">Result not found!</h3>


                    @endif


                </div>
            </div>

            
        </div>

    </div>
</main>


@endsection