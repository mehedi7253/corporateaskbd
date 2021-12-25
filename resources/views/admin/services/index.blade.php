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
                        <a href="{{ route('services.create') }}" class="btn btn-primary">Add New Services</a>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Service Name</th>
                                    <th>Start Price</th>
                                    <th>Discount Price</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $i=>$service)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $service->service_name }}</td>
                                        <td>{{ number_format($service->start_price,2) }}</td>
                                        <td>{{ number_format($service->discount_price,2) }}</td>
                                        <td>
                                            @if($service->status == '0')
                                                <span class="label bg-teal">Published</span>
                                            @else
                                                <span class="label bg-red">Un-Published</span>
                                            @endif
                                        </td>
                                        <td>
                                            <img src="{{ asset('services/images/'.$service->service_image) }}" style="height: 30px; width: 50px;" class="img-fluid">
                                        </td>
                                        <td>
                                            <form action="{{ route('services.destroy', $service->id) }}" method="post">
                                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a> |
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete !!');"><i class="fa fa-trash"></i></button>
                                            </form>
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