<!doctype html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-207188585-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-207188585-1');
    </script>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Corporate Ask</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/nav2.css') }}" type="text/css">
    <link rel="icon" href="{{ asset('images/fb_icon.png') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;700&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
</head>
<body>

<!--navbar-->
<header class="header">
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container"><a href="#" class="navbar-brand text-uppercase font-weight-bold">
            <img src="{{asset('images/logo-dark.png')}}" style="width: 150px; height: auto" alt="corporate_logo">
        </a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
            
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase" href="{{ route('services-packages.index') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Services
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @php
                                $nav = DB::table('services')->limit('4')->get();
                            @endphp
                            @foreach ($nav as $nav_bar)
                                 <a class="dropdown-item text-capitalize" href="{{ route('pages.show', ['name'=>$nav_bar->url]) }}">{{ $nav_bar->service_name }}</a>
                            @endforeach
                          <a class="dropdown-item text-capitalize" href="{{ route('services-packages.index') }}">More</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{ url('/cv-check') }}">CV Check</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{ route('courses-and-tutorials.index') }}">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{ route('books.index') }}">Books</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase" href="{{ route('services-packages.index') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Blogs
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-capitalize" href="{{ route('blogsbn.index') }}">Bangla</a>
                            <a class="dropdown-item text-capitalize" href="{{ route('blog.englishblog') }}">English</a>
                        </div>
                    </li>
                   
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase" href="{{ url('/about-us') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          About US
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-capitalize" href="{{ url('/about-us') }}">About US</a>
                            <a class="dropdown-item text-capitalize" href="https://niazahmed.net/" target="_blank">About CEO</a>
                            <a class="dropdown-item text-capitalize" href="{{ route('our-team.index') }}">Our Team</a>
                        </div>
                    </li>
                
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{ route('contact.index') }}">Contact Us</a>
                    </li>
                
                    <li class="nav-item dropdown">
                        @if (Route::has('login'))
                            @auth
                            <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->first_name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-capitalize" href="user/index">Profile</a>
                                <a class="dropdown-item text-capitalize" href="{{ route('logout') }}"
                                onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @else
                            <a class="nav-link dropdown-toggle text-uppercase" href="{{ route('login') }}" target="_blank" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Login
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-capitalize" href="{{ route('login') }}">Login</a>
                                <a class="dropdown-item text-capitalize" href="{{ route('register') }}">Registration</a>
                            </div>
                            @endauth
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- end nav -->

<section class="recomandation" style="padding-top: 50px">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 float-left mt-5 mb-5">
                <form action="{{ url('/pay') }}" method="POST" class="needs-validation" id="form_calc">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                <div class="card" style="border: 2px solid red; border-radius: 10px">
                    <div class="card-header">
                        <h3 class="text-capitalize text-dark">{{$page_name}}</h3>
                    </div>
                    <div class="card-body" style="font-family: 'Lato'">
                        <div class="col-md-7 col-sm-12 float-left">
                            <span class="text-success border-bottom">Order Details</span>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Package Type:</th>
                                        <td>{{ $service_name }}</td>
                                        <td class="text-right" style="width: 10%">
                                            {{ number_format($service_price,2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Experience: </th>
                                        <td>  @if($experience == '') 0 @else {{ $experience }} @endif  years</td>
                                        <td class="text-right">
                                            {{ number_format($experience * 100,2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Selected Services: </th>
                                        <td>
                                            @if($service_name == 'Premium Package (All In One)')
                                                <li>Professional Cv / Resume</li>
                                                @foreach($cv_services as $service)
                                                    <li>{{ $service->name }}</li>
                                                @endforeach
                                                <li>One To One Session</li>
                                            @else
                                                @foreach($cart_item as $cart_services)
                                                    <li>{{ $cart_services->name }} </li>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            {{ number_format($total_price,2) }}
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
                                        @if(session()->has('copun_codes') == true)
                                            <input hidden value="{{ $total = $total_price + ($experience * 100) + $service_price - session()->get('copun_codes') }}">
                                        @else
                                            <input type="text" hidden name="{{ $total = $total_price + ($experience * 100) + $service_price }}" value="" class="form-control text-right" style="border: none; background-color: white" disabled>
                                        @endif

                                        <label for="staticEmail2" class="p-2"> Subtotal : </label>
                                        <input class="form-control" id="totalsum2" value="" style="border: none; background-color: white" disabled>
                                    </div>
                                    <div class="form-group input-group">
                                        <label for="staticEmail2" class="p-2"> Discount : </label>
                                        @if(session()->has('copun_codes') == true)
                                           <input type="text" name="" value="{{ number_format(session()->get('copun_codes'),2) }}" class="form-control text-right" style="border: none; background-color: white" disabled>
                                        @else
                                           <input type="text" name="" value="0.00" class="form-control text-right" style="border: none; background-color: white" disabled>
                                        @endif
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
                                                <input type="text" hidden class="form-control" name ="invoice_number" id="invoice_number" value="{{ $invoice_number }}">
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

<!-- footer-->
<section class="big_footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="col-md-3 col-sm-12 float-left">
                    <div class="mt-3">
                        <h5 style="color: #fff;" class="ml-5 p-1 big_footer_heading">Community</h5>
                        <ul class="ul_fotter">
                            <li class="nav-link"><a class="foter_li" href="https://www.facebook.com/CorporateAsk" target="_blank" title="Facebook Page">Facebook Group</a></li>
                            <li class="nav-link"><a class="foter_li" href="https://www.youtube.com/channel/UCjm5cMnB7RSLmL-165bIZbA/featured" target="_blank">Youtube</a></li>
                            <li class="nav-link"><a class="foter_li" href="https://www.linkedin.com/company/corporate-ask/" target="_blank">linkedin</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 float-left">
                    <div class="mt-3 mb-4">
                        <h5 style="color: #fff;" class="ml-5 p-1 big_footer_heading">Help</h5>
                        <ul class="ul_fotter">
                            <li class="nav-link"><a class="foter_li" href="{{ route('blogsbn.index') }}">Read Blog</a></li>
                            <li class="nav-link"><a class="foter_li" href="{{ url('/') }}">How system Works</a></li>
                            <li class="nav-link"><a class="foter_li" href="{{ url('/policy') }}">Terms & Condition</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 float-left">
                    <div class="mt-3">
                        <h5 style="color: #fff;" class="ml-5 p-1  big_footer_heading">About Us</h5>
                        <ul class="ul_fotter">
                            <li class="nav-link"><a class="foter_li" href="{{ url('/about-us') }}">About US</a></li>
                            <li class="nav-link"><a class="foter_li" href="https://niazahmed.net/" target="_blank">About Niaz</a></li>
                            <li class="nav-link"><a class="foter_li" href="{{route('contact.index')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 float-left">
                    <div class="mt-4">
                        <a href="{{ route('services-packages.index') }}"><button class="btn_fotter text-uppercase"><i class="fas fa-shopping-basket"></i> Order Now</button></a> <br/>
                        <button class="btn_fotter text-uppercase"><i class="fas fa-money-bill-alt"></i> Affiliate Area</button><br/>
                    </div>
                </div>
            </div>

           
        </div>
    </div>
</section>

<!-- Messenger Chat Plugin Code -->

<section class="fotter bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 float-left mx-auto p-2 ml-5">
                <ul class="social-network social-circle">
                    <li><a href="https://www.facebook.com/CorporateAsk" target="_blank" class="icoFacebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/corporate-ask/" target="_blank" class="icoLinkedin" title="twitter"><i class="fab fa-linkedin-in "></i></a></li>
                    <li><a href="mailto:corporateask@gmail.com?subject = Feedback&body = Message" class="icogmail" title="Gmail"><i class="far fa-envelope "></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCjm5cMnB7RSLmL-165bIZbA/featured" target="_blank" class="icoYoutube" title="Youtube"><i class="fab fa-youtube youtube"></i></a></li>
                </ul>
            </div>
            <div class="col-md-6 col-sm-12 float-left">
                <p class="text-right mr-3 text-white pt-1" style="font-size: 14px; margin: 6px; font-family: 'Lato';">This site is Copyright By &copy;<b> Corporate Ask</b></p>
            </div>
        </div>
    </div>
</section>
<!--end  footer-->
<button id="topBtn"><i class="fas fa-arrow-up"></i></button>
<div id="fb-root"></div>


<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution="page_inbox"
     page_id="1465613063755348">
</div>


<!--script-->
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/topdown.js') }} "></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<!--end script-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('message') }}");
    @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.error("{{ session('error') }}");
    @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.info("{{ session('info') }}");
    @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>
<script>
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

    $(document).ready(function() {
        $(':checkbox:checked').prop('checked',false);
        function updateSum() {
            var total = 0;
            $(".sum:checked").each(function(i, n) {total += parseFloat($(n).val());})
            //$("#totalsum").val(total);
            $("#totalsum3").val(total.toFixed(2));
        }
        // run the update on every checkbox change and on startup
        $("input.sum").change(updateSum);
        updateSum();
    })
</script>
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
</script>
<script type="text/javascript">
    window.fbAsyncInit = function() {
        FB.init({
            xfbml       : true,
            version     : 'v10.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    $(document).on("scroll", function() {
        if ($(document).scrollTop() > 86) {
            $("#banner").addClass("w3hubs");
            // $("#banner").addClass("bgs");

        } else {
            $("#banner").removeClass("w3hubs");
        }
    });

</script>
<script>
    $(function () {
    $(window).on('scroll', function () {
        if ( $(window).scrollTop() > 10 ) {
            $('.navbar').addClass('active');
        } else {
            $('.navbar').removeClass('active');
        }
        });
    });
</script>
</body>
</html>
