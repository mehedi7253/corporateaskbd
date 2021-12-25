@extends('user.layouts.app')
@section('content')
    <ol class="breadcrumb" style="background-color: aliceblue; font-size: 15px; border-radius: 15px">
        <li class="breadcrumb-item">
            <a href="{{ route('user.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">{{$page_name}}</li>
    </ol>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card" id="mainFrame">
                <div class="header">
                    <h2>{{$page_name}}</h2>
                </div>
                <div class="body">
                    <span class="text-success border-bottom">Order Status</span>
                    <div class="row clearfix">
                        <div class="col-md-6 float-left mt-5">
                            <address>
                                <strong>Billed To:</strong><br>
                                <span class="text-capitalize">{{$order_list->name}}</span><br>
                                {{$order_list->phone}}<br>
                                {{$order_list->address}}<br>
                            </address>
                        </div>
                        <div class="col-md-6 float-left text-right mt-5">
                            <address>
                                <strong>Company Details:</strong><br>
                                <label class="font-weight-bold">Corporate Ask</label><br/>
                                <label class="font-weight-bold"> 01975409545</label><br/>
                            </address>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <address>
                                <strong>Payment :</strong><br/>
                                <label>Order Date: {{ date('d-M-Y', strtotime($order_list->created_at)) }}</label><br>
                                <label>Transaction ID: {{ $order_list->transaction_id}}</label><br>
                                <label>Pay Amount: {{ number_format($order_list->amount,2) }} BDT.</label><br>
                                <strong>Shiping Address : {{ $order_list->address }}</strong><br/>
                            </address>
                        </div>
                        <div class="col-md-3 float-left">
                            <img src="{{ asset('images/logo-dark.png')}}" style="height: 50px; width: 100%; float: right">
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12 col-sm-12 float-left">
                            <h4 class="section-title font-weight-bold">Order Summary</h4>
                            <p class="section-lead">All items here cannot be deleted.</p>

                            <div class="table-responsive text-center">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $i=>$orders)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $orders->BookName }}</td>
                                                <td>{{ $orders->Quantity }}</td>
                                                <td>{{ number_format($orders->Price,2) }}</td>
                                                <td class="text-right">
                                                    {{ number_format($orders->Quantity * $orders->Price,2) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="text-right">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Sub Total: </td>
                                            <td>   
                                                 @foreach ($subtotal as $sub_total)
                                                    {{ number_format($sub_total->PaybleAmount) }}
                                                 @endforeach
                                            </td>
                                        </tr>
                                       
                                        <tr class="text-right">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Discount: </td>
                                            <td>   
                                                0.00
                                            </td>
                                        </tr>
                                        <tr class="text-right">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Courier Charge: </td>
                                            <td>   
                                                60.00
                                            </td>
                                        </tr>
                                        <tr class="text-right">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Total: </td>
                                            <td>   
                                                @foreach ($subtotal as $total)
                                                    {{ number_format($sub_total->PaybleAmount + 60,2) }}
                                                @endforeach
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row clearfix">
                        <div class="col-md-10 col-sm-12 float-left">
                        </div>
                        <div class="col-md-2 col-sm-12 float-left">
                            <button class="btn btn-primary btn-icon icon-left btn-block" type="pss" id="prntPSS"><i class="fas fa-print"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
