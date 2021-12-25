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
                            <a href="{{ route('order-services.index') }}" class="btn btn-primary"><i class="fa fa-backward" style="color: white"></i></a>
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
                                <div class="col-md-3 col-sm-12 float-left mt-2 mb-3">
                                    @if($order_list->process_status == '0')
                                        <button class='btn btn-danger btn-block'>Pending</button>
                                    @elseif($order_list->process_status == '1')
                                        <button class='btn btn-success btn-block'>Received</button>
                                    @elseif($order_list->process_status == '2')
                                        <button class='btn btn-success btn-block'>Received</button>
                                    @elseif($order_list->process_status == '3')
                                        <button class='btn btn-success btn-block'>Received</button>
                                    @elseif($order_list->process_status == '4')
                                        <button class='btn btn-success btn-block'>Received</button>
                                    @elseif($order_list->process_status == '5')
                                        <button class='btn btn-success btn-block'>Received</button>
                                    @else
                                        <button class='btn btn-danger btn-block'>Canceled</button>
                                    @endif
                                </div>
                                <div class="col-md-3 col-sm-12 float-left mt-2 mb-3">
                                    @if($order_list->process_status == '0')
                                        <button class='btn btn-danger btn-block'>Pending</button>
                                    @elseif($order_list->process_status == '1')
                                        <button class='btn btn-danger btn-block'>Arrange Meeting</button>
                                    @elseif($order_list->process_status == '2')
                                        <button class='btn btn-success btn-block'>Arrange Meeting</button>
                                    @elseif($order_list->process_status == '3')
                                        <button class='btn btn-success btn-block'>Arrange Meeting</button>
                                    @elseif($order_list->process_status == '4')
                                        <button class='btn btn-success btn-block'>Arrange Meeting</button>
                                    @elseif($order_list->process_status == '5')
                                        <button class='btn btn-success btn-block'>Arrange Meeting</button>
                                    @else
                                        <button class='btn btn-danger btn-block'>Canceled</button>
                                    @endif
                                </div>
                                <div class="col-md-3 col-sm-12 float-left mt-2 mb-3">
                                    @if($order_list->process_status == '0')
                                        <button class='btn btn-danger btn-block'>Pending</button>
                                    @elseif($order_list->process_status == '1')
                                        <button class='btn btn-danger btn-block'>Work Start</button>
                                    @elseif($order_list->process_status == '2')
                                        <button class='btn btn-danger btn-block'>Work Start</button>
                                    @elseif($order_list->process_status == '3')
                                        <button class='btn btn-success btn-block'>Work Start</button>
                                    @elseif($order_list->process_status == '4')
                                        <button class='btn btn-success btn-block'>Work Start</button>
                                    @elseif($order_list->process_status == '5')
                                        <button class='btn btn-success btn-block'>Work Start</button>
                                    @else
                                        <button class='btn btn-danger btn-block'>Canceled</button>
                                    @endif
                                </div>
                                <div class="col-md-3 col-sm-12 float-left mt-2 mb-3">
                                    @if($order_list->process_status == '0')
                                        <button class='btn btn-danger btn-block'>Pending</button>
                                    @elseif($order_list->process_status == '1')
                                        <button class='btn btn-danger btn-block'>Complete Work</button>
                                    @elseif($order_list->process_status == '2')
                                        <button class='btn btn-danger btn-block'>Complete Work</button>
                                    @elseif($order_list->process_status == '3')
                                        <button class='btn btn-danger btn-block'>Complete Work</button>
                                    @elseif($order_list->process_status == '4')
                                        <button class='btn btn-success btn-block'>Complete Work</button>
                                    @elseif($order_list->process_status == '5')
                                        <button class='btn btn-success btn-block'>Delivered</button>
                                    @else
                                        <button class='btn btn-danger btn-block'>Canceled</button>
                                    @endif
                                </div>
                            </div>
                        </div>
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
                            <div class="col-md-9">
                                <address>
                                    <strong>Payment :</strong><br/>
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
                                        <tr>
                                            <th>Service Name: </th>
                                            <td> {{ $service_name }} </td>
                                            <td>
                                                {{ number_format($service_price,2) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Experience:  </th>
                                            <td> {{ $experience }}  years</td>
                                            <td>
                                                {{ number_format($experience * 100,2) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Selected Packages: </th>
                                            <td>
                                                @if($service_name == 'Premium Package (All In One)')
                                                    @foreach($cv_services as $service)
                                                        <li>{{ $service->name }}</li>
                                                    @endforeach
                                                @else
                                                    @foreach($cv_service_item as $cart_services)
                                                        <li>{{ $cart_services->CvServiceName }} </li>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                {{ number_format($total_price,2) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Delivery</th>
                                            <td>
                                                @if($order_list->delivery == 'Regular')
                                                    <li>Regular Delivery</li>
                                                @elseif($order_list->delivery == 'Urgent')
                                                    <li>Urgent Delivery</li>
                                                @endif
                                            </td>
                                            <td>
                                                @if($order_list->delivery == 'Regular')
                                                    0.00
                                                @elseif($order_list->delivery == 'Urgent')
                                                    1000.00
                                                @endif
                                            </td>
                                        </tr>
                                        <tr class="border-0">
                                            <th class="border-0"></th>
                                            <td class="border-0"> </td>
                                            <td class="border-0">
                                                @if($order_list->delivery == 'Regular')
                                                    {{ number_format($total_price + ($experience * 100) + $service_price,2) }}
                                                @elseif($order_list->delivery == 'Urgent')
                                                    {{ number_format($total_price + ($experience * 100) + $service_price + 1000,2) }}
                                                @endif
                                            </td>
                                        </tr>

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
