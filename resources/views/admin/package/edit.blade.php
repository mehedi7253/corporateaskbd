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
                        <a href="{{ route('packages.index') }}" class="btn btn-primary">Manage Pacakges</a>
                    </ul>
                </div>
                <div class="body">
                    <form action="{{ route('packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="name">Package Name :<sup class="text-danger">*</sup></label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $package->name }}" placeholder="Enter Package Name" autocomplete="name" autofocus>
                                    </div>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <label style="color: red">{{ $message }}</label>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Package Price :<sup class="text-danger">*</sup></label>
                                        <input id="price" type="number" min="1" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $package->price }}" placeholder="Enter Package Price" autocomplete="price" autofocus>
                                    </div>
                                    @error('price')
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
                                        <label> Discount Price:<sup class="text-danger">*</sup></label>
                                        <input id="default_discount" type="number" min="0" class="form-control @error('default_discount') is-invalid @enderror" name="default_discount" value="{{ $package->default_discount }}" placeholder="Enter Discount Price" autocomplete="default_discount" autofocus>
                                    </div>
                                    @error('default_discount')
                                    <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if($package->status == '0')
                                    <input type="radio" name="status" checked id="male" value="0" class="with-gap">
                                    <label for="male">Publish</label>

                                    <input type="radio" name="status" value="1" id="female" class="with-gap">
                                    <label for="female" class="m-l-20">Un-Publish</label>
                                @else
                                    <input type="radio" name="status"  id="male" value="0" class="with-gap">
                                    <label for="male">Publish</label>

                                    <input type="radio" name="status" checked value="1" id="female" class="with-gap">
                                    <label for="female" class="m-l-20">Un-Publish</label>
                                @endif
                                </div>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Package Image :<sup class="text-danger">*</sup></label><br/>
                                    <img src="{{ asset('package/images/'.$package->thumbnail) }}" style="height: 120px; width: 120px"><br/>
                                    <input id="thumbnail" type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" value="{{ old('thumbnail') }}">
                                </div>
                                @error('thumbnail')
                                <span class="invalid-feedback" role="alert">
                                        <label style="color: red">{{ $message }}</label>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Url:<sup class="text-danger">*</sup></label>
                                        <input id="slug" type="text" disabled class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $package->slug }}" placeholder="Enter Url" autocomplete="slug" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row clearfix">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="submit" name="service" class="btn btn-success btn-block" value="Update">
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
