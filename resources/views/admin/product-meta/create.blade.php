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
                    <h2>{{$page_name}} On {{ $product->name }}</h2>
                    <ul class="header-dropdown m-r--5">
                        <a href="{{ route('metatag-edit.show', $product->id) }}" ><i class="fa fa-edit"></i></a>
                    </ul>
                </div>
                <div class="body">
                   <form action="{{ route('product-meta.store') }}" method="POST">
                       @csrf
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="sku_id" hidden value="{{ $product->id }}">
                                        <label for="service_name">Select Type :<sup class="text-danger">*</sup></label>
                                        <select class="form-control" name="type">
                                            <option value="default">Default</option>
                                            <option value="seo">SEO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Select Key :<sup class="text-danger">*</sup></label>
                                        <select class="form-control" name="key">
                                            <option value="faq">FAQ</option>
                                            <option value="features">Features & Benefits</option>
                                            <option value="title">SEO Title</option>
                                            <option value="description">SEO Meta Description</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="sku_type">Select Sku Type :<sup class="text-danger">*</sup></label>
                                        <select class="form-control" name="sku_type">
                                            <option value="package">Package</option>
                                            <option value="product">Product</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                               
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label> Value :<sup class="text-danger">*</sup></label>
                                        <textarea id="ckeditor" name="value"></textarea>
                                    </div>
                                    @error('value')
                                    <span class="invalid-feedback" role="alert">
                                         <strong style="color: red">{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="submit" name="service" class="btn btn-success btn-block" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                   </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
   
@endsection
