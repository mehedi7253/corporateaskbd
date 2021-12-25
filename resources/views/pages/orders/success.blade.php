@extends('pages.layouts.app')
@section('content')

    <div class="col-md-8 mx-auto mt-5 mb-5">
        <h2 class="text-center text-success">Congratulations! Your Transaction is Successful. </h2>
        <br>
        <div class="card">
            <div class="card-header">
                <h3 colspan="2">Payment Details <a href="{{ url('/') }}" class="btn btn-info float-right"><i class="fa fa-home"></i> Home</a></h3>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="mainFrame">
                    <table border="1" class="table tabble-border table-striped">
                        <tbody>
                        <tr>
                            <td class="text-right">Transaction ID</td>
                            <td>{{ $tran_id }}</td>
                        </tr>
                        <tr>
                            <td class="text-right">Transaction Time</td>
                            <td>{{$tran_date}}</td>
                        </tr>
                        <tr>
                            <td class="text-right">Payment Method</td>
                            <td>{{$card_issuer}}</td>
                        </tr>
                        <tr>
                            <td class="text-right">Bank Transaction ID</td>
                            <td>{{$bank_tran_id}}</td>
                        </tr>
                        <tr>
                            <td class="text-right">Amount</td>
                            <td>{{$amount}} {{$currency}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-info btn-icon icon-left" type="pss" id="prntPSS"><i class="fas fa-print"></i> Save</button>
            </div>
        </div>
    </div>
@endsection

