<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Corporate Ask</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<!-- //#EEEEEE -->
<body style="background-color: currentColor;">
<section class="pay">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 mt-5 mb-5">
                <!-- <div class="w3-container w3-center w3-animate-bottom"> -->
                <div>
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center font-weight-bold font-italic">
                                Payment Gateway - Corporate Ask
                            </h1>
                        </div>
                        <div class="card-body">
                            <div class="col-md-6 col-sm-12 float-left mt-3">
                                <img src="../images/1627484883.jpg" style="height: 430px; width: 100%;">
                            </div>
                            <div class="col-md-6 col-sm-12 float-left mt-3">
                                <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token" />
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
                                        <label> Amount <sup class="text-danger">*</sup></label>
                                        <input type="number" min="10" name="amount" id="total_amount" placeholder="Enter Your Amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}">
                                        @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                                 <label style="color: red">{{ $message }}</label>
                                             </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" required><a target="_blank"> Accept Terms & Condition</a>
                                    </div>
                                    <div class="form-group">
                                        <input name="btn" class="btn btn-primary btn-lg btn-block" type="submit" value="Pay Now">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

</body>
</html>
