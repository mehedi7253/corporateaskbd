@extends('admin.layouts.app')
@section('content')
    <ol class="breadcrumb" style="background-color: aliceblue; font-size: 15px; border-radius: 15px">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">{{$page_name}}</li>
    </ol>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>{{$page_name}}</h2>
                    <ul class="header-dropdown m-r--5">
                        <a href="{{ route('order-services.create') }}" class="btn btn-primary">Complete Orders</a>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Order Date</th>
                                    <th>Delivery Date</th>
                                    <th>Status</th>
                                    <th>Update Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $i=>$order)
                                    @if($order->process_status < '4')
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $order->name }} @if($order->notify == '0') <sup class="text-success">New</sup> @endif</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ date('d-M-Y', strtotime($order->created_at)) }}</td>
                                        <td>
                                            @if($order->delivery == 'Regular')
                                                <?php
                                                $order_date = (date('Y-m-d', strtotime($order->created_at)));
                                                $date = new DateTime($order_date);
                                                $date->modify('+ 10 days');
                                                $date = $date->format('M-d-Y');
                                                echo $date;
                                                ?>
                                            @elseif($order->delivery == 'Urgent')
                                                <?php
                                                $order_date = (date('Y-m-d', strtotime($order->created_at)));
                                                $date = new DateTime($order_date);
                                                $date->modify('+ 3 days');
                                                $date = $date->format('M-d-Y');
                                                echo $date;
                                                ?>
                                            @endif
                                        </td>
                                        <td>
                                            @if($order->process_status == '0')
                                                <span style="font-size: 12px" class="label bg-red">Pending</span>
                                            @elseif($order->process_status == '1')
                                                <span style="font-size: 12px" class='label bg-green'>Received</span>
                                            @elseif($order->process_status == '2')
                                                <span style="font-size: 12px" class='label bg-blue'>Arrange Meeting</span>
                                            @elseif($order->process_status == '3')
                                                <span style="font-size: 12px" class='label bg-orange'>Work Start</span>
                                            @elseif($order->process_status == '4')
                                                <span style="font-size: 12px" class='label bg-green'>Complete Work</span>
                                            @elseif($order->process_status == '5')
                                                <span style="font-size: 12px" class='label bg-green'>Delivered</span>
                                            @else
                                                <span style="font-size: 12px" class='label bg-red'>Canceled</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="row clearfix">
                                                <form action="{{ route('order-services.update', $order->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <select class="form-control" name="process_status">
                                                                    <option>---Select One---</option>
                                                                    <option value="1">Received</option>
                                                                    <option value="2">Arrange Meeting</option>
                                                                    <option value="3">Work Start</option>
                                                                    <option value="4">Complete Work</option>
                                                                    <option value="6">Canceled</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <input type="submit" name="btn" class="btn btn-info" value="Update">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('order-services.show', $order->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    $('select').selectpicker();
@endsection
