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
    <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}" type="text/css">
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>

        <div class="container"  style="padding-top: 120px; color: red">
            <div class="row">
                <div class="col-md-10 mx-auto mt-5 mb-5">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1>404</h1>
                            <h2>Page Not Found</h2>
                            <p class="text-capitalize">We are sorry, the page you request could not be found. please go back to the home page</p>
                            <a class="btn btn-primary" href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
