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
                        <a href="{{ route('products.create') }}" class="btn btn-primary">Add New prodcuts</a>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Name</th>  
                                    <th>Price</th>
                                    <th>Discount Price</th>
                                    <th>Meta Data</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prodcuts as $i=>$prodcut)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $prodcut->productCategories->name }}</td>
                                        <td>{{ $prodcut->name }}</td>
                                        <td>{{ number_format($prodcut->price,2) }}</td>
                                        <td>{{ number_format($prodcut->default_discount,2) }}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ route('product-meta.show', $prodcut->id) }}"><i class="fa fa-plus"></i></a> |
                                            <a class="btn btn-primary" href="{{ route('metatag-edit.show', $prodcut->id) }}"><i class="fa fa-eye"></i></a>
                                        </td>
                                        <td>
                                            <form action="{{route('products.destroy', $prodcut->id)}}" method="post">
                                                <a class="btn btn-info" href="{{ route('products.edit', $prodcut->id) }}"><i class="fa fa-edit"></i></a> |
                                                <a class="btn btn-info" href="{{ route('products.show', $prodcut->id) }}"><i class="fa fa-eye"></i></a> |
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
