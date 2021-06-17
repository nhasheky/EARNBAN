@extends('admin.master')


@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Percentage</h1>

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
                     @if(!$per)
                    <div class="card-header">
                       
                        <div class="d-flex justify-content-between">
                            <div></div>
                            <div>
                                <a href="{{ url('admin/percentage/create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i>  Add Percentage</a>
                            </div>
                        </div>

                    </div>
                    @endif

                    @if($per)
                    <table class="table">
                       
                          <tr>
                              <th>Percentage</th>
                              <td>:</td>
                              <td>{{$per->percentage}} %</td>
                              <td>
                                  <a href="{{url('admin/percentage/'.$per->id.'/edit')}}" class="mr-2"><i class="fa fa-edit"></i></a>
                                  <a href="{{url('admin/percentage/'.$per->id.'/delete')}}"><i class="fa fa-trash"></i></a>
                              </td>
                          </tr> 

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