@extends('pages.layouts.app')
@section('meta-content')
    <meta name="description" content="Corporate Ask is offering various services for your career success including CV, Resume Writing, LinkedIn, BD Jobs Profile Update. Check out our all services and packages.">
    <meta property="og:type" content="Corporate Ask"/>
    <meta property="og:url" content="https://corporateaskbd.com"/>
    <meta property="og:image" content="https://corporateaskbd.com/images/fb-logo.png">
    <meta property="og:image:height" content="300px"/>
    <meta property="og:image:width" content="600px"/>
    <meta property="og:site_name" content="Corporate Ask"/>
    <link rel="canonical" href="https://corporateaskbd.com/"/>
    <title>CV, Resume, Cover Letter : All services for career advancement | Corporate Ask</title>
@endsection
    @section('content')
    <div class="" id="particles-js">
        <div class="heading">
            <h1 class="text-center text-white font-weight-bold" style="font-size: 70px; line-height: 45px">  Our Offers  <br/>
                <span style="font-size: 18px"> </span>
            </h1>
        </div>
    </div>
    
    <section class="mb-5" style="background-color: white">
        <div class="container">
            <div class="row">
                @foreach($offer as $service)
                    <div class="col-md-4 col-sm-12 float-left">
                        <div class="card mt-4" style="border: 2px solid red; border-radius: 10px">
                            <div class="card-header text-center">
                                <span class="text-center" style="font-size: 17px; font-weight: bold; font-family: Raleway;">{{ $service->service_name }}</span>
                            </div>
                            <a href=""><img src="" style="height: auto; width: 100%"  alt="image" title="{{ $service->service_name }}"></a>
                            <div class="card-body text-center">
                                <a href="" class="col-md-6 btn text-center" style="background-color: #B61924; border-radius: 10px; color: white">View More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endsection
