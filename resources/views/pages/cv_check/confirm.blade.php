@extends('pages.layouts.app')
@section('content')
    <div class="col-md-8 mx-auto mt-5 mb-5">
        <div class="card">
            <div class="card-body">
                <p class="text-center"><i class="far fa-check-circle fa-5x" style="color: green"></i></p>
                <h3 class="text-center text-success">Your Order Placed Successful</h3>
                <p class="text-center">Your Serial Number : <span style="font-weight: bold; color: red">{{ $orders->serial }}</span></p>
                <a href="{{ url('/') }}" class="btn btn-success text-center col-4 mt-5" style="margin-left: 30%">Home</a>
            </div>
        </div>
    </div>
@endsection