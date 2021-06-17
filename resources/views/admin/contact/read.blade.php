@extends('admin.master')


@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Messages</h1>

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

                    @if(count($contacts) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($contacts as $contact)
                            <tr>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->subject}}</td>
                                <td>{{date('d/m/Y',strtotime($contact->created_at))}}</td>
                                <td>
                                    @if($contact->status==1)
                                    <span class="text-secondary">Seen</span>
                                    @else
                                     <span class="text-danger">New</span>
                                    @endif
                                </td>
                                <td class="table-action">
                                     <a href="{{url('admin/contact/'.$contact->id.'/details')}}" class="mr-2"><i class="fa fa-eye"></i></a>
                                    <a href="{{url('admin/contact/'.$contact->id.'/delete')}}"><i class="fa fa-trash"></i></a>
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