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
   <title>CV, Resume, Cover Letter : All services for career advancement | Corporate Ask</title>
@endsection
@section('content')
    <div class="" id="particles-js">
        <div class="heading">
            <h1 class="text-center text-white font-weight-bold package_name2">  Our Services  <br/>
                <span class="sub_panckage_name"> CV, Resume, Cover Letter &  Many More</span>
            </h1>
        </div>
    </div>
    <section class="mb-5 recomandation">
        <div class="container">
            <div class="row">
                @foreach($services as $service)
                    <div class="col-md-4 col-sm-12 float-left">
                        <div class="card mt-4" style="border: 2px solid red; border-radius: 10px">
                            <div class="card-header text-center">
                                <span class="text-center package_name">{{ $service->service_name }}</span>
                            </div>
                            <a href="{{ route('pages.show', ['name'=>$service->url]) }}"><img src="{{ asset('services/images/'.$service->service_image) }}" style="height: auto; width: 100%"  alt="image" title="{{ $service->service_name }}"></a>
                            <div class="card-body text-center">
                                <a href="{{ route('pages.show', ['name'=>$service->url]) }}" class="col-md-6 btn text-center" style="background-color: #B61924; border-radius: 10px; color: white">Buy Now</a>
                            </div>
                        </div>
                    </div>
               @endforeach
            </div>
        </div>
    </section>
@endsection
