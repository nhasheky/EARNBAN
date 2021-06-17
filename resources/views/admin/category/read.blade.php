@extends('admin.master')


@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Category</h1>

        <div class="row">
            <div class="col-8 col-xl-8">


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
                                <form action="{{url('admin/category')}}"  method="get">
                                    <input type="text" name="search" class="form-control" placeholder="Search">
                                </form>
                            </div>

                            <div>
                                <a href="{{ url('admin/category/create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i>  Add Category</a>
                            </div>

                        </div>



                    </div>

                    @if(count($categories) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width:40%;">Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($categories as $category)
                            <tr>
                                <td>{{$category->category}}</td>
                                <td class="table-action">
                                    <a href="{{url('admin/category/'.$category->id.'/edit')}}"><i class="align-middle" data-feather="edit-2"></i></a>
                                    <a href="{{url('admin/category/'.$category->id.'/delete')}}"><i class="align-middle" data-feather="trash"></i></a>
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