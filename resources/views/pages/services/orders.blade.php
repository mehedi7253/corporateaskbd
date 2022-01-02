@extends('pages.layouts.app')
@section('meta-content')
   <!-- Global site tag (gtag.js) - Google Analytics -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-207188585-1"></script>
   <script>
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());

   gtag('config', 'UA-207188585-1');
   </script>

   <meta name="description" content="Corporate Ask is offering various services for your career success including CV, Resume Writing, LinkedIn, BD Jobs Profile Update. Check out our all services and packages.">
   <meta property="og:type" content="Corporate Ask"/>
   <meta property="og:url" content="https://corporateaskbd.com"/>
   <meta property="og:image" content="https://corporateaskbd.com/images/fb-logo.png">
   <meta property="og:image:height" content="300px"/>
   <meta property="og:image:width" content="600px"/>
   <meta property="og:site_name" content="Corporate Ask"/>
   <link rel="canonical" href="https://corporateaskbd.com/"/>
   <title>Orders Item | Corporate Ask</title>
@endsection
@section('content')
    <section class="recomandation" style="padding-top: 50px">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 float-left mt-5 mb-5">
                    <form action="{{ url('/pay') }}" method="POST" class="needs-validation" id="form_calc">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                    <div class="card" style="border: 2px solid red; border-radius: 10px">
                        <div class="card-header">
                            <h3 class="text-capitalize text-dark"> Order Item </h3>
                        </div>
                        <div class="card-body" style="font-family: 'Lato'">
                            <div class="col-md-7 col-sm-12 float-left">
                                <span class="text-success border-bottom">Order Details</span>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        @foreach ($packages as $package)
                                            <tr>
                                                <th>Package Type:</th>
                                                <td>{{ $package->PckageName }}</td>
                                                <td class="text-right" style="width: 10%">
                                                        {{ number_format($package->PackagePrice,2) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Experience: </th>
                                                <td> {{ $package->Experience }}   years</td>
                                                <td class="text-right">
                                                    {{ number_format($package->Experience * 100,2) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th>Selected Services: </th>
                                            <td>
                                                @foreach ($products as $product)
                                                    <li>{{ $product->ProductName }}</li>
                                                @endforeach
                                            </td>
                                            <td class="text-right">
                                                @foreach ($products as $product)
                                                    <li style="list-style: none">{{ number_format($product->productPrice,2) }}</li>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Delivery</th>
                                            <td>
                                                <input type="checkbox"> Regular Delivery 13-15 Days <br/>
                                                <input name="delivery" id="outside" class="sum" value="1000"  type="checkbox"> Urgent Delivery  3 Days
                                            </td>
                                            <td style="width: 24%">
                                                <input class="col-12 text-right" id="totalsum3" value="" style="border: none; background-color: white" disabled>
                                            </td>
                                        </tr>
                                    </table>

                                    <div class="col-md-8 col-sm-12 float-left">
                                        {{-- <form action="{{ route('apply') }}" method="get" role="search">
                                            <div class="form-group col-8">
                                                <label>Coupon Code (if any)</label>
                                                <input type="text" class="form-control" dirname="coupon_code" id="coupon_code" name="search" placeholder="Enter Coupon Code" required>
                                            </div>
                                            <div class="form-group col-3">
                                                <input type="submit" class="btn btn-primary fld-btn" value="Redeem Coupon" id="search">
                                            </div>
                                        </form> --}}
                                    </div>
                                    <div class="col-md-4 col-sm-12 float-left">
                                        <div class="form-group input-group">
                                            @foreach ($packages as $package)
                                                <label for="staticEmail2" class="p-2"> Subtotal : </label>
                                                <input hidden type="text" name="{{ $total = $total_price + ($package->Experience * 100 + $package_price) }}" value="" class="form-control text-right" style="border: none; background-color: white" disabled>
                                                <input class="form-control" id="totalsum2" value="" style="border: none; background-color: white" disabled>
                                            @endforeach
                                        </div>
                                        <div class="form-group input-group">
                                            <label for="staticEmail2" class="p-2"> Discount : </label>
                                            <input type="text" name="" value="0.00" class="form-control text-right" style="border: none; background-color: white" disabled>
                                        </div>
                                        <hr/>
                                        <div class="form-group input-group">
                                            <label for="staticEmail2" class="p-2"> Total : </label>
                                            <input class="form-control text-right" id="grandTotal" value="" style="border: none; background-color: white" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-12 float-left">
                                {{-- <form action="{{ url('/pay') }}" method="POST" class="needs-validation" id="form_calc">
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token" /> --}}
                                <div class="card mt-4">
                                    <div class="card-body">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        @if(Auth::check() && Auth::user()->role_id == 2)
                                            <div class="form-group">
                                                <label>Name <sup>*</sup></label>
                                                <input disabled class="form-control" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Email <sup>*</sup></label>
                                                <input disabled class="form-control" value="{{ Auth::user()->email }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Phone <sup>*</sup></label>
                                                <input disabled class="form-control" value="{{ Auth::user()->phone }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Address <sup>*</sup></label>
                                                <input disabled class="form-control" value="{{ Auth::user()->address }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" hidden class="form-control" name ="invoice_number" id="invoice_number" value="{{ $invoice_number }}">
                                                <input hidden value="" name="amount" id="totalsum" required/>
                                                <input type="checkbox" required><a target="_blank" href="{{ url('/policy') }}"> Accept Terms & Condition</a>
                                            </div>
                                            <div class="form-group">
                                                <input name="btn" class="btn btn-primary btn-lg btn-block" type="submit" value="Pay Now">
                                            </div>
                                        @else
                                            <h6 style="color: red"> For Complete Payment Process Select User Type :</h6>
                                            <div class="form-group">
                                                <select class="form-control">
                                                    <option>Select User Type</option>
                                                    <option value="red">Old user</option>
                                                    <option value="green">Guest User</option>
                                                </select>
                                            </div>
                                            <div class="red user">
                                                <a class="text-center btn btn-success" href="{{ route('login') }}">Login Now</a>
                                            </div>
                                            <div class="green user">
                                                <div class="form-group">
                                                    <label>Full Name <sup class="text-danger">*</sup></label>
                                                    <input type="text" name="customer_name" id="customer_name" placeholder="Enter Your Full Name" class="form-control">
                                                    @error('customer_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <label style="color: red">{{ $message }}</label>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label> Email <sup class="text-danger">*</sup></label>
                                                    <input type="email" name="customer_email" id="email" placeholder="Enter Your Email" class="form-control" >
                                                    @error('customer_email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <label style="color: red">{{ $message }}</label>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label> Phone Number <sup class="text-danger">*</sup></label>
                                                    <input type="text" name="customer_mobile" id="mobile" min="11" max="11" placeholder="Enter Your Phone Number" class="form-control" >
                                                    @error('customer_mobile')
                                                    <span class="invalid-feedback" role="alert">
                                                        <label style="color: red">{{ $message }}</label>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" hidden class="form-control" name ="invoice_number" id="invoice_number" value="">
                                                    <input hidden value="" name="amount" id="totalsum" required/>
                                                    <input type="checkbox" required><a target="_blank" href="{{ url('/policy') }}"> Accept Terms & Condition</a>
                                                </div>
                                                <div class="form-group">
                                                    <input name="btn" class="btn btn-primary btn-lg btn-block" type="submit" value="Pay Now">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script language="JavaScript">
        // jQuery functions to hide and show the div
        $(document).ready(function () {
            $("select").change(function () {
                $(this).find("option:selected")
                    .each(function () {
                        var optionValue = $(this).attr("value");
                        if (optionValue) {
                            $(".user").not("." + optionValue).hide();
                            $("." + optionValue).show();
                        } else {
                            $(".user").hide();
                        }
                    });
            }).change();
        });

        //totoal sum
        $(document).ready(function() {
        $(':checkbox:checked').prop('checked',false);
        function updateSum() {
            var total = {{ $total }};
            $(".sum:checked").each(function(i, n) {total += parseFloat($(n).val());})
            //$("#totalsum").val(total);
            $("#totalsum").val(total.toFixed(2));
            $("#grandTotal").val(total.toFixed(2));
            $("#totalsum2").val(total.toFixed(2));
            $("#totalsum3").val(total.toFixed(2));
        }
        // run the update on every checkbox change and on startup
        $("input.sum").change(updateSum);
        updateSum();
    })
    </script>
@endsection