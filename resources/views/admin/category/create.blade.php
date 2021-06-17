@extends('admin.master')

@section('content')

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Category Create</h1>

        <div class="row">
            <div class="col-12 col-xl-6">

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
                        <form action="{{ url('/admin/category/create') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <input type="text" class="form-control" name="category" placeholder="Category">

                                @error('category')
                                    <span  class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
</main>

    
@endsection