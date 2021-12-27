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
                        <a href="{{ route('packages.create') }}" class="btn btn-primary">Add New Package</a>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> Name</th>  
                                    <th>Price</th>
                                    <th>Discount Price</th>
                                    <th>URL</th>
                                    <th>Thumbnail</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($packages as $i=>$package)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $package->name }}</td>
                                        <td>{{ number_format($package->price,2) }}</td>
                                        <td>{{ number_format($package->default_discount,2) }}</td>
                                        <td>{{ $package->slug }}</td>
                                        <td>
                                            <img src="{{ asset('package/images/'.$package->thumbnail) }}" class="img-fluid" alt="{{ $package->name }}" style="height: 50px; width: 50px;">
                                        </td>
                                        <td>
                                            <form action="{{route('packages.destroy', $package->id)}}" method="post">
                                                <a class="btn btn-info" href="{{ route('packages.edit', $package->id) }}"><i class="fa fa-edit"></i></a> |
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
@section('script')
   
@endsection
