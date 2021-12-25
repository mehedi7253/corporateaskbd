@extends('admin.layouts.app')
@section('content')
    <ol class="breadcrumb" style="background-color: aliceblue; font-size: 15px; border-radius: 15px">
        <li class="breadcrumb-item">
            <a href="{{ route('user.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">{{$page_name}}</li>
    </ol>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @if($order_list->invoice_number == '0')
                <div class="card" id="mainFrame">
                    <div class="header">
                        <h2>{{$page_name}}</h2>
                        <ul class="header-dropdown m-r--5">
                            <a href="{{ route('cvchecks.index') }}" class="btn btn-primary"><i class="fa fa-backward" style="color: white"></i></a>
                        </ul>
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
                                </address>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12 col-sm-12 float-left">
                                <h3 class="text-center">Manual Payment</h3>
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
            @else
                <div class="card" >
                    <div class="header">
                        <h2>{{$page_name}}</h2>
                        <ul class="header-dropdown m-r--5">
                            <a href="{{ route('order-services.index') }}" class="btn btn-primary"><i class="fa fa-backward" style="color: white"></i></a>
                        </ul>
                    </div>
                    <div class="body" id="mainFrame">
                        <span class="text-success border-bottom">Order Status</span>
                        <div class="mt-3 mb-5">
                            <div class="row clearfix">
                                <div class="col-md-6 col-sm-12 float-left mt-2 mb-3">
                                    @if($order_list->process_status == '0')
                                        <button class='btn btn-danger btn-block'>Pending</button>
                                    @elseif($order_list->process_status == '1')
                                        <button class='btn btn-success btn-block'>Received</button>
                                    @elseif($order_list->process_status == '2')
                                        <button class='btn btn-success btn-block'>Received</button>
                                    @endif
                                </div>
                             
                              
                                <div class="col-md-6 col-sm-12 float-left mt-2 mb-3">
                                    @if($order_list->process_status == '0')
                                        <button class='btn btn-danger btn-block'>Pending</button>
                                    @elseif($order_list->process_status == '1')
                                        <button class='btn btn-danger btn-block'>Deliverd</button>
                                    @elseif($order_list->process_status == '2')
                                        <button class='btn btn-success btn-block'>Deliverd</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6 float-left mt-5">
                                <address>
                                    <strong>Billed To:</strong><br>
                                    <span class="text-capitalize">{{$order_list->name}}</span><br>
                                    {{ $order_list->phone }}<br>
                                   
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
                            <div class="col-md-9">
                                <address>
                                    <strong>Payment Details:</strong><br/>
                                    <label>Order Date: {{ date('d-M-Y', strtotime($order_list->created_at)) }}</label><br>
                                    <label>Transaction ID: {{ $order_list->transaction_id}}</label><br>
                                    <label>Pay Amount: {{ number_format($order_list->amount,2) }} BDT.</label><br>
                                </address>
                            </div>
                            <div class="col-md-3 float-left">
                                <img src="{{ asset('images/logo-dark.png')}}" class="float-right" style="height: 50px; width: 100%">
                            </div>
                        </div>
                        <div class="row mt-4 clearfix">
                            <div class="col-md-12">
                                <h4 class="section-title font-weight-bold">Order Summary</h4>
                                <p class="section-lead">All items here cannot be deleted.</p>

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                       @foreach ($service as $services)
                                        <tr>
                                            <th>Service Name: </th>
                                            <td> {{ $services->service_name }} </td>
                                        </tr>
                                        <tr>
                                            <th>Service Price: </th>
                                            <td> {{ number_format($services->discount_price,2) }} </td>
                                        </tr>
                                       @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr/>
                    </div>
                    <div class="row clearfix mb-5" >
                        <div class="col-md-10 col-sm-12 float-left">
                        </div>
                        <div class="col-md-2 col-sm-12 float-left">
                            <button class="btn btn-primary btn-icon icon-left btn-block" type="pss" id="prntPSS"><i class="fas fa-print"></i> Save</button>
                        </div>
                        <div class="col-md-10 col-sm-12 float-left mt-3">
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
