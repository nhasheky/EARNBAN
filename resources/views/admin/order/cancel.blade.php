@extends('admin.master')


@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Cancel Orders</h1>

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
                                <form action="{{url('admin/order/cancel')}}"  method="get">
                                    <input type="text" name="search" class="form-control" placeholder="Search">
                                </form>
                            </div>
                        </div>
                    </div>

                    @if(count($orders) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Transaction Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($orders as $order)
                            <tr>
                                <td>
                                  <b>{{$order->transaction_id}}</b>
                                </td>
                                <td>{{$order->name}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->phone}}</td>
                                <td>${{$order->amount}}</td>
                                <td>
                                   @if ($order->status=="Processing")
                                   <span class="text-primary">Processing</span>
                                   @elseif($order->status=="Cancel")
                                   <span class="text-danger">Cancel</span>
                                   @elseif($order->status=="Completed")
                                   <span class="text-success">Completed</span>
                                   @endif
                                </td>
                                <td class="table-action">
                                    <a href="{{url('admin/order/'.$order->id.'/delete')}}"><i class="fa fa-trash"></i></a>
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