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
                        <a href="{{ route('order-services.index') }}" class="btn btn-primary">New Service Orders</a>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Provide Service</th>
{{--                                <th>Download</th>--}}
                                <th> Status</th>
                                <th>More</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $i=>$order)
                                @if($order->process_status >='4')
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>
                                            <a href="{{ route('service-provides.edit', $order->id) }}" class="text-decoration-none btn btn-info"> <i class="fa fa-upload"></i> Upload</a>
                                        </td>
{{--                                        <td>--}}
{{--                                            @if($order->process_status == '5')--}}
{{--                                                @if($order->id !== $download_id)--}}
{{--                                                    <span class="label bg-red">Not Ready!</span>--}}
{{--                                                @else--}}
{{--                                                    <a href="{{ route('service-provides.show', $download_id) }}" class="text-decoration-none"> <i class="fa fa-download"></i> Download</a>--}}
{{--                                                @endif--}}
{{--                                            @else--}}
{{--                                                <span class="label bg-red">Not Ready!</span>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
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
