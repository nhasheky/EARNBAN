@extends('admin.master')


@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Jobs</h1>

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
                                <form action="{{url('admin/job')}}"  method="get">
                                    <input type="text" name="search" class="form-control" placeholder="Search">
                                </form>
                            </div>
                        </div>
                    </div>

                    @if(count($jobs) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Job Name</th>
                                <th>Skills</th>
                                <th>Budget</th>
                                <th>ExpireDate</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($jobs as $job)
                            <tr>
                                <td width="40%">
                                    <div>
                                        <b>{{$job->project_name}}</b>
                                    </div>
                                     <div>
                                        <p>{{$job->project_description}}</p>
                                    </div>
                                </td>
                                <td>{{$job->skills}}</td>
                                <td>${{$job->budget}}</td>
                                <td>{{date('d/m/Y',strtotime($job->expire_date))}}</td>
                                <td class="table-action">
                                    <a href="{{url('admin/job/'.$job->id.'/delete')}}"><i class="fa fa-trash"></i></a>
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