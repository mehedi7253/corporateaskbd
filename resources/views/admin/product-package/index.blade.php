@extends('admin.layouts.app')
@section('content')
    <ol class="breadcrumb" style="background-color: aliceblue; font-size: 15px; border-radius: 15px">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">{{$page_name}} On {{ $package->name }}</li>
    </ol>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>{{$page_name}} </h2>
                    <ul class="header-dropdown m-r--5">
                        <a href="{{ route('packages.index') }}" class="btn btn-primary">Manage packages </a>
                    </ul>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-md-5" style="border-right: 1px solid blue">
                            <form action="{{ route('product-packages.update', $package->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Select Product <sup class="text-danger">*</sup></label><br/>
                                    {{-- <input name="package_id" value="{{ $package->id }}" hidden> --}}
                                    @foreach ($products as $product)
                                        <input type="checkbox" id="remember_me{{ $product->id }}" name="product_id[]" value="{{ $product->id }}" class="filled-in">
                                        <label for="remember_me{{ $product->id }}">{{ $product->name }}</label>
                                        <br/>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Product Required :<sup class="text-danger">*</sup></label><br/>
                                        <input type="radio" name="is_required" id="male" value="1" class="with-gap">
                                        <label for="male">Required</label>
    
                                        <input type="radio" name="is_required" value="0" id="female" class="with-gap">
                                        <label for="female" class="m-l-20">Not-Required</label>
                                    </div>
                                    @error('is_required')
                                    <span class="invalid-feedback" role="alert">
                                         <strong style="color: red">{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="service" class="btn btn-success  col-5" value="Submit">
                                </div>
                            </form>
                        </div>


                        <div class="col-md-7">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product_package as $i=>$product_packages)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $product_packages->ProductName }}</td>
                                                <td>
                                                    <form action="{{route('product-packages.destroy', $product_packages->producPackaID)}}" method="post">
                                                        <a class="btn btn-info" href="{{ route('packages.edit', $product_packages->producPackaID) }}"><i class="fa fa-edit"></i></a> |
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
        </div>
    </div>
@endsection
@section('script')
   
@endsection
