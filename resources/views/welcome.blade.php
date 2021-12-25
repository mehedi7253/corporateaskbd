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
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="description" content="A professional resume writing & cover letter service provider in 
    Bangladesh. Creating unique CVs for new job seekers and
    increasing their career prospects.">
    <meta property="og:type" content="Corporate Ask"/>
    <meta property="og:url" content="https://corporateaskbd.com"/>
    <meta property="og:image" content="https://corporateaskbd.com/images/fb_icon.png">
    <meta property="og:image:height" content="300px"/>
    <meta property="og:image:width" content="600px"/>
    <meta property="og:site_name" content="Corporate Ask"/>
    <link rel="canonical" href="https://corporateaskbd.com/"/>
    <title>Professional Resume writing service in Bangladesh | Corporate Ask</title>
    
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}" type="text/css">
    <link rel="icon" href="{{ asset('images/fb_icon.png') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;700&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>

</head>
<body>
<!--navbar-->
<header class="header">
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container"><a href="#" class="navbar-brand text-uppercase font-weight-bold">
            <img src="{{asset('images/logo.png')}}" style="width: 150px; height: auto" alt="corporate_logo">
        </a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
            
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase" href="{{ route('services-packages.index') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cv Checking
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @php
                                $cvcheck_nav = DB::table('services')->where('status','=','0')->where('type','=','cvcheck service')->get();
                            @endphp
                            @foreach ($cvcheck_nav as $nav_bar)
                                 <a class="dropdown-item text-capitalize" href="{{ route('cvcheck.cvheckShow', ['cvcheck'=>$nav_bar->url]) }}">{{ $nav_bar->service_name }}</a>
                            @endforeach
                          <a class="dropdown-item text-capitalize" href="{{ route('cvcheck.index') }}">More</a>
                        </div>
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
                                <a class="dropdown-item text-capitalize" href="{{ route('user.index') }}">Profile</a>
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

<!--slider-->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('images/1.jpg') }}" style="height: auto; width: 1200px" alt="First slide">
        </div>
         <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/2.jpg') }}" style="height: auto" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/3.png') }}" style="height: auto" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!--end slider-->
<section class="about_us" style="background-color: white">
    <div class="container">
        <div class="row">
            <div class="col-1 border_top"></div>
            <div class="col-md-11 col-sm-12"></div>
            <div class="col-md-7 col-sm-12 float-left mt-2">
                <h1 class="text-center font-weight-bold" style="color: #717171; font-size: 66px"><span style="font-family: 'Barlow', sans-serif;">About</span>  <span style="color: red; font-family: 'Barlow', sans-serif; font-weight: 300">Corporate Ask</span></h1>
                <div class="home_peragraph">
                    <p>Corporate Ask is the pioneer in Resume Writing Industry in Bangladesh. The company is providing content based Resume writing, Cover letter, bdjobs profile & linkedin profile updating service since 2016.</p>
                </div>
               <div>
                   <p>
                      <span class="mission_home">Mission: <span >Making Achievement based professional Resume with Unique contents.</span>  </span>
                   </p>
               </div>
            </div>
            <div class="col-md-5 col-sm-12 float-left mt-2 mb-5">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="4"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="5"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="6"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('newspaper/rsz_1111.jpg') }}" alt="event Image" style="height: auto">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('newspaper/11111111111.jpg') }}" alt="Sevent Image 2" style="height: auto">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('newspaper/233124674_528092831734054_6797873079622278003_n.jpg') }}" alt="event Image 3" style="height: auto">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('newspaper/233140824_360995578971827_2384819045127305544_n.jpg') }}" alt="event Image 4" style="height: auto">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('newspaper/233657051_353890766396000_3407423059832787958_n.jpg') }}" alt="event Image 5" style="height: auto">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('newspaper/12.jpg') }}" alt="fourth slide" style="height: auto" alt="event Image 6">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('newspaper/13.jpg') }}" alt="fifth slide" style="height: auto" alt="event Image 7">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ceo token-->
<section class="ceo_token">
        <img src="{{ asset('images/cover_photo.jpg')}}" style="height: auto; width: 100%" alt="niaz_recommendation">
</section>
<!--end ceo token-->

<section class="pt-5 pb-5 recomandation">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 float-left">
                <h1 class="font-weight-bold" style="font-size: 59px; font-family: 'Barlow', sans-serif;"><span style="color: red">Recommen</span><span style="color: #666666;">dations</span> </h1>
            </div>
            <div class="col-md-6 col-sm-12 float-left text-right">
                <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators222" role="button" data-slide="prev" style="background-color: red; border: none">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators222" role="button" data-slide="next" style="background-color: red; border: none">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-12">
                <div id="carouselExampleIndicators222" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-4 col-sm-12 float-left mt-2">
                                    <div class="card card-recom" style="height: 455px; border: 2px solid red; border-radius: 10px">
                                        <div class="card-body">
                                            <p class="text-center"><img class="img-fluid cardImage" src="{{asset('recomandation/ayman.jpg')}}" alt="card image"></p>
                                            <h3 class="text-capitalize text-center font-weight-bold recommender_name">Ayman Sadiq </h3>
                                            <p class="text-center recom_desig">CEO at 10 Minute School</p>
                                            <div class="text-center" style="text-align: center">
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                            </div>
                                            <p class="text-justify recom_peragraph"> Probably the best and go to person if you need anything related to CV, resume, cover letter or LinkedIn and BDjobs profile. Loved his professional and dedication towards his work. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 float-left mt-2">
                                    <div class="card card-recom" style="height: 455px; border: 2px solid red; border-radius: 10px">
                                        <div class="card-body">
                                            <p class="text-center"><img class="img-fluid cardImage" src="{{asset('recomandation/mehedi.jpg')}}" alt="card image"></p>
                                            <h3 class="text-capitalize text-center recommender_name">Engr. Mehedi Hasan</h3>
                                            <p class="text-center recom_desig">Founder Chairman, Omicon Group </p>
                                              <div class="text-center" style="text-align: center">
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                            </div>
                                            <p class="text-justify recom_peragraph"> I had opportunity to get proof of Niaz’s ability to write contents like CVS, Research Papers etc in a best way possible, keeping the international standards. He is a big believer of ‘Never Give up’ motto and always finds a unique way to market any of his professional services and works to his networks </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 float-left mt-2">
                                    <div class="card card-recom" style="height: 455px; border: 2px solid red; border-radius: 10px">
                                        <div class="card-body">
                                            <p class="text-center"><img class="img-fluid cardImage" src="{{asset('recomandation/leakat.jpg')}}" alt="card image"></p>
                                            <h3 class="text-capitalize text-center recommender_name">Maruf Leakat </h3>
                                            <p class="text-center recom_desig"> Founder & CEO at Interior Studio</p>
                                              <div class="text-center" style="text-align: center">
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                            </div>
                                            <p class="text-justify recom_peragraph">   Niaz Ahmed is very close friend of mine, As a human being he is very honest & ethical person. He is pioneer of Professional CV writing industry in Bangladesh. He is a very hardworking, passionate & consistent Entrepreneur. Niaz has very clear Entrepreneurial mindset and forecasting ability </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-4 col-sm-12 float-left mt-2">
                                    <div class="card card-recom" style="height: 455px; border: 2px solid red; border-radius: 10px">
                                        <div class="card-body">
                                            <p class="text-center"><img class="img-fluid cardImage" src="{{asset('recomandation/dany.jpg')}}" alt="card image"></p>
                                            <h3 class="text-capitalize text-center recommender_name">Ghulam Sumdany Don </h3>
                                            <p class="text-center recom_desig" > Chief Inspirational Officer at Don Sumdany Facilitation</p>
                                              <div class="text-center" style="text-align: center">
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                            </div>
                                            <p class="text-justify recom_peragraph">   Niaz is a close brother of mine, and I have known him since his job days, and saw him turning into an Entrepreneur. He had the courage and the audacity to move into a very different and challenging industry, and created a niche around it </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 float-left mt-2">
                                    <div class="card card-recom" style="height: 455px; border: 2px solid red; border-radius: 10px">
                                        <div class="card-body">
                                            <p class="text-center"><img class="img-fluid cardImage" src="{{asset('recomandation/ripon.jpg')}}" alt="card image"></p>
                                            <h3 class="text-capitalize text-center recommender_name">K M Hasan Ripon </h3>
                                            <p class="text-center recom_desig" >Author, Speaker, Mentor, Trainer, Video Creator, Blogger, Strategist</p>
                                              <div class="text-center" style="text-align: center">
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                            </div>                                           
                                            <p class="text-justify recom_peragraph">   To me, Niaz Ahmed is one of the consistent and forward-thinking professionals I have ever met.He guided and professionally developed CV/Resume for many professionals at home and abroad as an expert professional CV/Resume writer.  </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 float-left mt-2">
                                    <div class="card card-recom" style="height: 455px; border: 2px solid red; border-radius: 10px">
                                        <div class="card-body">
                                            <p class="text-center"><img class="img-fluid cardImage" src="{{asset('recomandation/amaneo.jpg')}}" alt="card image"></p>
                                            <h3 class="text-capitalize text-center recommender_name">Amaan Sulaiman  </h3>
                                            <p class="text-center recom_desig" > Best Selling Author | Chief Organizer at English Olympiad Global</p>
                                              <div class="text-center" style="text-align: center">
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                            </div>
                                            <p class="text-justify recom_peragraph">   I have been following Niaz Ahmed's activities for 5 years with my close observation, he is highly dedicated soul with passion in his work and promising leader chasing the pursuit of quality for ensuring service to others' career development! </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-4 col-sm-12 float-left mt-2">
                                    <div class="card card-recom" style="height: 455px; border: 2px solid red; border-radius: 10px">
                                        <div class="card-body">
                                            <p class="text-center"><img class="img-fluid cardImage" src="{{asset('recomandation/mostofa.jpg')}}" alt="card image"></p>
                                            <h3 class="text-capitalize text-center recommender_name">Md. Mostafa Kamal </h3>
                                            <p class="text-center recom_desig" >CEO, Savvy Consultancy and Training </p>
                                            <br/>
                                            <div class="text-center" style="text-align: center">
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                            </div>
                                           <p class="text-justify recom_peragraph">   Mr. Niaz Ahmed is a consummate, passionate and professional CV writer. He understands complex job situations and can write extraordinary CV and is able to creatively present them in a simple and highly effective achievement oriented manner. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 float-left mt-2">
                                    <div class="card card-recom" style="height: 455px; border: 2px solid red; border-radius: 10px">
                                        <div class="card-body">
                                            <p class="text-center"><img class="img-fluid cardImage" src="{{asset('recomandation/rusad.jpg')}}" alt="card image"></p>
                                            <h3 class="text-capitalize text-center recommender_name">Rushdina Khan </span>  </h3>
                                            <p class="text-center recom_desig" > Author of Emotional Intelligence (1st book on EI in Bangla)</p>
                                            <div class="text-center" style="text-align: center">
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                            </div>                                            
                                            <p class="text-justify recom_peragraph">   Mr Niaz Ahmed is the pioneer to introduce Resume Writing services in Bangladesh. With his innovations and endeavor to emerge with effective and powerful resumes and Interview-handling techniques </p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4 col-sm-12 float-left mt-2">
                                    <div class="card card-recom" style="height: 455px; border: 2px solid red; border-radius: 10px">
                                        <div class="card-body">
                                            <p class="text-center"><img class="img-fluid cardImage" src="{{asset('recomandation/shuvas.jpg')}}" alt="card image"></p>
                                            <h3 class="text-capitalize text-center recommender_name">shuvasish bhowmick</span></h3>
                                            <p class="text-center recom_desig" > Country Director (Bangladesh)at ATEC* Biodigesters International</p>
                                            <div class="text-center" style="text-align: center">
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                                <li class="cercile_one"><i class="fas fa-circle"></i></li>
                                            </div>                                                  
                                            <p class="text-justify recom_peragraph">   Niaz Ahmed is an excellent cv writer. He makes cv on the basis of achievement. We usually put some job responsibilities in our cv that has no value. What actually differentiates you, is your achievement. Summarizing the history of 10-15 years in 2 page is a great skill. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="viewer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 float-left" style="margin-top: 10%">
                <h1 class="text-center working_process">working process of professional cv</h1>
            </div>
            <div class="col-md-6 col-sm-12 float-left mt-5 mb-5">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/tz7wFvfDEQw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                {{-- <video src="{{asset('videos/CORPORATE ASK FINAL.mp4')}}" muted controls autoplay style="height: auto; width: 100%"></video> --}}
            </div>
        </div>
    </div>
</section>
<section class="payment"></section>
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
            <div class="col-md-8 col-sm-12 float-left mx-auto p-2 ml-5">
                <ul class="social-network social-circle">
                    <li><a href="https://www.facebook.com/CorporateAsk" target="_blank" class="icoFacebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/corporate-ask/" target="_blank" class="icoLinkedin" title="twitter"><i class="fab fa-linkedin-in "></i></a></li>
                    <li><a href="mailto:corporateask@gmail.com?subject = Feedback&body = Message" class="icogmail" title="Gmail"><i class="far fa-envelope"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCjm5cMnB7RSLmL-165bIZbA/featured" target="_blank" class="icoYoutube" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-12 float-left p-1">
                <p class="text-right mr-3 text-white footer-text ">This site is Copyright By &copy;<b> Corporate Ask</b></p>
            </div>
        </div>
    </div>
</section>
<!--end  footer-->
<button id="topBtn">
    <i class="fas fa-arrow-up"></i>
</button>
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

    $(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 10) {
                    $('.navbar .navbar-brand img').attr('src','../images/logo-dark.png');
                }
                if ($(this).scrollTop() < 10) {
                    $('.navbar .navbar-brand img').attr('src','../images/logo.png');
                }
            })
        });

</script>
<!--end script-->
</body>
</html>
