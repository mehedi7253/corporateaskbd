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
                        <a href="{{ route('coupon-codes.create') }}" class="btn btn-primary">Add New Coupon code</a>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Coupon Code</th>
                                <th>Discount Percent</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coupons as $i=>$coupon)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $coupon->coupon_code }}</td>
                                    <td>{{ $coupon->discount }}</td>
                                    <td>
                                        @if($coupon->status == '0')
                                            <span class="label bg-teal">Published</span>
                                        @else
                                            <span class="label bg-red">Un-Published</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('coupon-codes.destroy', $coupon->id) }}" method="post">
                                            <a href="{{ route('coupon-codes.edit', $coupon->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a> |
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
