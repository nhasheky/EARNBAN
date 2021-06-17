@extends('admin.master')


@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Message Details</h1>

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
                       <div>
                      <b>{{$contact->name}}</b>
                      <p>{{$contact->email}}</p>
                   </div>
                   <div class="my-3 font-weight-bold">
                       {{$contact->subject}}
                   </div>

                   <p class="my-3">
                       {{$contact->message}}
                   </p>

                  </div>

                </div>
            </div>

            
        </div>

    </div>
</main>


@endsection