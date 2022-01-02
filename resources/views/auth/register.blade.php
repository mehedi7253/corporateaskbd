<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Corporate Ask</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/nav2.css') }}" type="text/css">
    <link rel="icon" href="{{ asset('images/logo.png') }} ">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
<!--navbar-->
<!--navbar-->
@include('pages.layouts.nav')
<!--end ceo token-->
<!--end ceo token-->
<section class="login recomandation" style="padding-top: 50px">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto mt-5 mb-5">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h3 class="text-center">User Registration</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-md-6 float-left">
                                <label for="first_name">First Name</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder="Enter First Name" autocomplete="first_name" autofocus>
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 float-left">
                                <label for="last_name">Last Name</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" placeholder="Enter Last Name" autocomplete="last_name" autofocus>
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 float-left">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email" autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 float-left">
                                <label for="phone">Phone</label>
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Enter Phone Number" autocomplete="phone" autofocus>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 float-left">
                                <label for="birth_date">Date Of Birth</label>
                                <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" placeholder="Enter Phone Number" autocomplete="birth_date" autofocus>
                                @error('birth_date')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 float-left">
                                <label for="organization">Organization</label>
                                <input id="organization" type="text" class="form-control @error('organization') is-invalid @enderror" name="organization" value="{{ old('organization') }}" placeholder="Enter Organization Name" autocomplete="organization" autofocus>
                                @error('organization')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 float-left">
                                <label for="designation">Designation</label>
                                <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" placeholder="Enter Designation" autocomplete="designation" autofocus>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 float-left">
                                <label for="gender">Gender</label><br/>
                                <input type="radio" checked name="gender" value="Male"> Male
                                <input type="radio" name="gender" value="Fe Male"> Fe Male
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 float-left">
                                <label for="address">{{ __('Address') }}</label>
                                <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Enter Address"></textarea>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group float-left">
                                <label for="password">{{__('Password')}}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" name="password" autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ 'Your password must be more than 7 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.' }}</strong>
                                </span>
                                @enderror
                                <div class="form-group pt-2">
                                    <input type="checkbox" class="" id="showhide"><span class="text-info font-weight-bold ml-2">Show Password</span>
                                </div>
                            </div>
                            <div class="form-group col-md-6 float-left">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Enter Confirm Password" autocomplete="new-password">
                            </div>

                            <div class="form-group mt-5 col-md-6 float-left">
                                <input type="submit" name="user_login"  value="Submit" class="btn btn-success btn-block"/>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('login') }}" class="text-decoration-none">Old User? Login Here</a>
                    </div>
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
                        <h5 style="color: #fff;" class="ml-5 p-1">Community</h5>
                        <ul class="ul_fotter">
                            <li class="nav-link"><a class="foter_li" href="https://www.facebook.com/CorporateAsk" target="_blank" title="Facebook Page">Facebook Group</a></li>
                            <li class="nav-link"><a class="foter_li" href="https://www.youtube.com/channel/UCjm5cMnB7RSLmL-165bIZbA/featured" target="_blank">Youtube</a></li>
                            <li class="nav-link"><a class="foter_li" href="https://www.linkedin.com/company/corporate-ask/" target="_blank">linkedin</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 float-left">
                    <div class="mt-3 mb-4">
                        <h5 style="color: #fff;" class="ml-5 p-1">Help</h5>
                        <ul class="ul_fotter">
                            <li class="nav-link"><a class="foter_li" href="{{ route('blogsbn.index') }}">Read Blog</a></li>
                            <li class="nav-link"><a class="foter_li" href="{{ url('/') }}">How system Works</a></li>
                            <li class="nav-link"><a class="foter_li" href="{{ url('/policy') }}">Terms & Condition</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 float-left">
                    <div class="mt-3">
                        <h5 style="color: #fff;" class="ml-5 p-1">About Us</h5>
                        <ul class="ul_fotter">
                            <li class="nav-link"><a class="foter_li" href="{{ url('/about-us') }}">About</a></li>
                            <li class="nav-link"><a class="foter_li" href="{{ url('/Niaz-Ahmed') }}">About Niaz</a></li>
                            <li class="nav-link"><a class="foter_li" href="{{route('contact.index')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 float-left">
                    <div class="mt-3">
                        <a href="{{ route('pages.service.package') }}"><button class="btn_fotter text-uppercase"><i class="fas fa-shopping-basket"></i> Order Now</button></a> <br/>
                        <button class="btn_fotter text-uppercase"><i class="fas fa-money-bill-alt"></i> Affiliate Area</button><br/>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mx-auto mb-3">
                <!--                <h4 class="text-info text-center">Follow Us</h4>-->
                <ul class="social-network social-circle text-center">
                    <li><a href="https://www.facebook.com/CorporateAsk" target="_blank" class="icoFacebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/corporate-ask/" target="_blank" class="icoLinkedin" title="twitter"><i class="fab fa-linkedin-in "></i></a></li>
                    <li><a href="mailto:corporateask@gmail.com?subject = Feedback&body = Message" class="icoLinkedin" title="Gmail"><i class="far fa-envelope "></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCjm5cMnB7RSLmL-165bIZbA/featured" target="_blank" class="icoLinkedin" title="Youtube"><i class="fab fa-youtube youtube"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Messenger Chat Plugin Code -->
<section class="fotter bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <p class="text-center text-white pt-1" style="font-size: 14px">This site is Copy Wright By &copy;<b> <i>Corporate Ask.Com</i></b></p>
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
    $('#showhide').click(function () {
        var typevalue = $('#password').attr('type');
        if (typevalue == 'password'){
            $('#password').attr('type', 'text');
        }
        else
        {
            $('#password').attr('type', 'password');
        }
    });
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
<!--end script-->
</body>
</html>

