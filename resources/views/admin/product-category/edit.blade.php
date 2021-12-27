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
                        <a href="{{ route('service-category.index') }}" class="btn btn-primary">Manage Service Category</a>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                       <form action="{{ route('product-category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Category Name :<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}" placeholder="Enter Service Category Name" autocomplete="name" autofocus>
                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                     <strong style="color: red">{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>
                            <div class="from-group">
                                <input type="submit" name="btn" class="btn btn-success" value="Update">
                            </div>

                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
   
@endsection
