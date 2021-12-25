@extends('pages.layouts.app')
@section('content')

<section class="recomandation">
    <div class="container">
        <div class="col-md-8 mx-auto mb-5 mt-3">
            <div class="card">
                <div class="card-header">
                    <h4>Complete Your Payment</h4>
                </div>
                <div class="card-body">
                    @foreach ($service as $services)
                        <div>
                            <p class="font-weight-bold">Package Type: <span class="font-weight-normal">{{ $services->serviceName }}</span> </p>
                            <p class="font-weight-bold">Package Price: <span class="font-weight-normal"> {{ number_format($services->servicePrice,2) }} BDT.</span> </p>
                        </div> 
                    @endforeach
                   
                    <form action="{{ route('pay_cv.cv_pay') }}" method="POST" class="needs-validation" id="form_calc" enctype="multipart/form-data">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" />

                        <h6 style="color: red" class="text-center"> Enter Your Personal Information </h6>
                        <div class="green user">
                            <div class="form-group">
                                <label>Full Name <sup class="text-danger">*</sup></label>
                                <input type="text" name="customer_name" id="customer_name" placeholder="Enter Your Full Name" class="form-control @error('customer_name') is-invalid @enderror" value="{{ old('customer_name') }}">
                                @error('customer_name')
                                    <span class="invalid-feedback" role="alert">
                                        <label style="color: red">{{ $message }}</label>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label> Email <sup class="text-danger">*</sup></label>
                                <input type="email" name="customer_email" id="email" placeholder="Enter Your Email" class="form-control @error('customer_email') is-invalid @enderror" value="{{ old('customer_email') }}">
                                @error('customer_email')
                                <span class="invalid-feedback" role="alert">
                                        <label style="color: red">{{ $message }}</label>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label> Phone Number <sup class="text-danger">*</sup></label>
                                <input type="text" name="customer_mobile" id="mobile" placeholder="Enter Your Phone Number" class="form-control @error('customer_mobile') is-invalid @enderror" value="{{ old('customer_mobile') }}">
                                @error('customer_mobile')
                                <span class="invalid-feedback" role="alert">
                                        <label style="color: red">{{ $message }}</label>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <input hidden type="text"  class="form-control" name ="invoice_number" id="invoice_number" value="{{ $cvcheck->invoice_number }}">
                                <input hidden value="{{ $cvcheck->price }}" name="amount" id="totalsum" required/>
                                <input type="checkbox" required><a target="_blank" href="{{ url('/policy') }}"> Accept Terms & Condition</a>
                            </div>
                            <div class="form-group">
                                <input name="btn" class="btn btn-primary col-4" type="submit" value="Pay Now">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</section>
    
@endsection
