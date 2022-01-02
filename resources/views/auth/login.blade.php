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
    <title>Login | Corporate Ask</title>
</head>
<body>

<!--navbar-->
@include('pages.layouts.nav')
<!--end ceo token-->
<section class="login recomandation" style="padding-top: 70px">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5 mb-5">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h3 class="text-center">User Login</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email" autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Enter Password" autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <p class=""><input required type="checkbox">
                                    <a href="{{ url('/policy') }}">Agree Terms & Condition</a>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link float-right" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </p>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary col-6">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <p class="text-p">  <a href="{{route('register')}}" class="float-right">New User? CLick Here To Registration</a></p>
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
                <p class="text-center text-white pt-1" style="font-size: 14px">This site is Copyright By &copy;<b> <i>Corporate Ask.Com</i></b></p>
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


