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
                        <a href="{{ route('cvcheck-order.index') }}" class="btn btn-primary">New Orders</a>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>File</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($order as $i=>$orders)
                                    @if($orders->process_status == '2')
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $orders->name }}</td>
                                        <td>{{ $orders->email }}</td>
                                        <td>{{ $orders->phone }}</td>
                                        <td>
                                            <span class="btn btn-success">Deliverd</span>
                                        </td>
                                        <td>
                                            @php
                                                $file = DB::table('cvcheckorders')
                                                    ->join('orders','orders.id', '=', 'cvcheckorders.order_id')
                                                    ->where('orders.id', '=', $orders->id)
                                                    ->get();
                                            @endphp
                                            @foreach ($file as $files)
                                                @if($files->file_name == '')
                                                        <a class="btn btn-success" target="_blank" href="{{ $files->link_url }}"><i class="fa fa-link"></i></a>
                                                    @else
                                                        <a class="btn btn-success" target="_blank" href="{{ asset('cvcheck/file/'.$files->file_name ) }}"><i class="fa fa-download"></i></a>
                                                @endif
                                            @endforeach
                
                                        </td>
                                        <td>
                                            <a href="{{ route('cvcheck-order.show', $orders->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
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
