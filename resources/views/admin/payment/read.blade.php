@extends('admin.master')


@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Withdraw Requests</h1>

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
                    
                    @if(count($payment) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Bank Name</th>
                                <th>Bank Account</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($payment as $payment)
                            <tr>
                                <td>{{$payment->bank_name}}</td>
                                <td>{{$payment->bank_account}}</td>
                                <td>${{$payment->withdraw_amount}}</td>
                                <td>{{date('d/m/Y',strtotime($payment->updated_at))}}</td>
                                <td class="table-action">
                                    <a href="{{url('admin/withdraw/'.$payment->id.'/status')}}"><i class="fa fa-check-circle fa-lg"></i></a>
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