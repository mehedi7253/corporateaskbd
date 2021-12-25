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
                        <a href="{{ route('admin-offers.index') }}" class="btn btn-primary"> <i class="fa fa-edit" style="color: black"></i> Manage Services</a>
                    </ul>
                </div>
                <div class="body">
                    <form action="{{ route('admin-offers.update', $offer->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Select Service  :<sup class="text-danger">*</sup></label>
                                        <input type="" disabled class="form-control" value="{{ $offer->services->service_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Discount Percent :<sup class="text-danger">*</sup></label>
                                        <input id="discount" type="number" min="1" class="form-control @error('discount') is-invalid @enderror" name="discount" value="{{ $offer->discount }}" placeholder="Enter Discount Percent" autocomplete="discount" autofocus>
                                    </div>
                                    @error('discount')
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
                                    <label>Publication Status :<sup class="text-danger">*</sup></label><br/>
                        
                                    @if($offer->status == '0')
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="url">URL :<sup class="text-danger">*</sup></label>
                                        <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ $offer->url }}" placeholder="Enter URL" autocomplete="url" autofocus>
                                    </div>
                                    @error('url')
                                    <span class="invalid-feedback" role="alert">
                                         <label style="color: red">{{ $message }}</label>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                      
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Image :<sup class="text-danger">*</sup></label><br/>
                                    <img src="{{ asset('offer/images/'.$offer->image) }}" style="height: 120px; width: 120px"><br/>
                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}">
                                    
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                         <label style="color: red">{{ $message }}</label>
                                     </span>
                                    @enderror
                                </div>
                        
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
            
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="submit" name="service" class="btn btn-success btn-block" value="Update Now">
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
=
@endsection