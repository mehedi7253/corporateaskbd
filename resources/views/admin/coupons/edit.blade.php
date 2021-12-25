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
                        <a href="{{ route('coupon-codes.index') }}" class="btn btn-primary">Manage Coupons</a>
                    </ul>
                </div>
                <div class="body">
                    <form action="{{ route('coupon-codes.update', $coupon->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="coupon_code">Coupon Code :<sup class="text-danger">*</sup></label>
                                        <input id="coupon_code" disabled type="text" class="form-control @error('coupon_code') is-invalid @enderror" name="coupon_code" value="{{ $coupon->coupon_code }}" placeholder="Enter Coupon Code" autocomplete="coupon_code" autofocus>
                                    </div>
                                    @error('coupon_code')
                                    <span class="invalid-feedback" role="alert">
                                         <label style="color: red">{{ $message }}</label>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="discount">Discount Percent :<sup class="text-danger">*</sup></label>
                                        <input id="discount" type="number" min="1" class="form-control @error('discount') is-invalid @enderror" name="discount" value="{{ $coupon->discount }}">
                                    </div>
                                    @error('discount')
                                    <span class="invalid-feedback" role="alert">
                                         <label style="color: red">{{ $message }}</label>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if($coupon->status == '0')
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
                                        <label></label>
                                        <input type="submit" name="btn" class="btn btn-info btn-block" value="Submit">
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
