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
            <div class="card">
                <div class="header">
                    <h2>{{$page_name}}</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Order Date</th>
                                    <th>Delivery Date</th>
                                    <th>Process</th>
                                    <th>Delivery Status</th>
                                    <th>View More</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order as $i=>$orders)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ date('d-M-Y', strtotime($orders->created_at)) }}</td>
                                       <td>
                                           @if($orders->delivery == 'Regular')
                                               <?php
                                                   $order_date = (date('Y-m-d', strtotime($orders->created_at)));
                                                   $date = new DateTime($order_date);
                                                   $date->modify('+ 14 days');
                                                   $date = $date->format('M-d-Y');
                                                   echo $date;
                                               ?>
                                               @elseif($orders->delivery == 'Urgent')
                                               <?php
                                                   $order_date = (date('Y-m-d', strtotime($orders->created_at)));
                                                   $date = new DateTime($order_date);
                                                   $date->modify('+ 3 days');
                                                   $date = $date->format('M-d-Y');
                                                   echo $date;
                                               ?>
                                           @endif
                                       </td>
                                        <td>
                                            @if($orders->process_status == '0')
                                                   <span style="font-size: 12px" class="label bg-red">Pending</span>
                                                @elseif($orders->process_status == '1')
                                                    <span style="font-size: 12px" class='label bg-green'>Received</span>
                                                @elseif($orders->process_status == '2')
                                                    <span style="font-size: 12px" class='label bg-blue'>Arrange Meeting</span>
                                                @elseif($orders->process_status == '3')
                                                     <span style="font-size: 12px" class='label bg-orange'>Work Start</span>
                                                @elseif($orders->process_status == '4')
                                                      <span style="font-size: 12px" class='label bg-green'>Complete Work</span>
                                                @elseif($orders->process_status == '5')
                                                     <span style="font-size: 12px" class='label bg-green'>Delivered</span>
                                            @else
                                                <span style="font-size: 12px" class='label bg-red'>Canceled</span>
                                            @endif

                                        </td>
                                        <td>
                                            @if($orders->process_status == '5')
                                                <a href="" class="text-decoration-none"> <i class='fa fa-eye'></i> View</a>"
                                            @else
                                                <span style="font-size: 12px" class='label bg-red'>Not Ready Yet</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="text-decoration-none" href="{{ route('service-orders.show', $orders->id) }}"> <i class="fa fa-eye fa-1x"></i> View</a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
