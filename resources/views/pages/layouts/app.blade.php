<!doctype html>
<html lang="en">
<head>
    @include('pages.layouts.header')
    @yield('meta-content')
</head>
<body>
<!--top header-->

<!--  end top header section-->

<!--navbar-->
<header class="header">
   @include('pages.layouts.nav')
</header>

<section class="main-body recomandation" style="padding-top: 70px">
     @yield('content')
</section>

@include('pages.layouts.footer')
@include('pages.layouts.script')
@yield('script')
</body>
</html>
