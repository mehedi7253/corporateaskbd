@extends('pages.layouts.app')
@section('content')
    <div class="col-md-8 mx-auto mt-5 mb-5">
        <h2 class="text-center text-danger">{{$msg}}</h2>
        <br>
        <div class="card">
            <div class="card-header">
                <h3 colspan="2">Payment Details <a href="{{ url('/') }}" class="btn btn-info float-right"><i class="fa fa-home"></i> Home</a></span></h3>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="mainFrame">
                    <table border="1" class="table table-striped">
                        <thead class="thead-dark">
                        <tr class="text-center">
                            <th colspan="2">Payment Details</th>
                        </tr>
                        </thead>
                        <tr>
                            <td class="text-right">Description</td>
                            <td><span class="text-danger">Cancel Transaction</span></td>
                        </tr>
                        <tr>
                            <td class="text-right">Transaction ID</td>
                            <td>{{$tran_id}}</td>
                        </tr>
                        <tr>
                            <td class="text-right"><b>Amount: </b></td>
                            <td>{{$amount }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-info btn-icon icon-left" type="pss" id="prntPSS"><i class="fas fa-print"></i> Save</button>
            </div>
        </div>
    </div>
@endsection
