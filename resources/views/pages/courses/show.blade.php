@extends('pages.layouts.app')
@section('meta-content')
@foreach ($category as $category_name)
    @if ($category_name->url == 'Interview-Hacks')
        <meta name="description" content="Get prepared for your next job interview. Watch now Corporate Ask Job interview hacks & tips that you need to know.">
        <meta property="og:type" content="Corporate Ask"/>
        <meta property="og:url" content="https://corporateaskbd.com"/>
        <meta property="og:image" content="https://corporateaskbd.com/images/fb-logo.png">
        <meta property="og:image:height" content="300px"/>
        <meta property="og:image:width" content="600px"/>
        <meta property="og:site_name" content="Corporate Ask"/>
        <link rel="canonical" href="https://corporateaskbd.com/"/>
        <title>  Bangla Job Interview Hacks:  Videos & Tutorials | Corporate Ask </title>

        @elseif ($category_name->url == 'resume-writing-tips')
        <meta name="description" content="Know the tips and tricks of resume writing and correct the mistakes of your resume or CV. Learn how to write a professional resume by watching Corporate Asks videos and tutorials.">
        <meta property="og:type" content="Corporate Ask"/>
        <meta property="og:url" content="https://corporateaskbd.com"/>
        <meta property="og:image" content="https://corporateaskbd.com/images/fb-logo.png">
        <meta property="og:image:height" content="300px"/>
        <meta property="og:image:width" content="600px"/>
        <meta property="og:site_name" content="Corporate Ask"/>
        <link rel="canonical" href="https://corporateaskbd.com/"/>
        <title>  Resume writing tips & tricks: Videos & tutorials by Corporate Ask</title>

        @elseif ($category_name->url == 'job-secrets')
        <meta name="description" content="Learn about job secrets and better prepare for your next job. Watch now Corporate Ask's Job Secret in Bangla, and grow up your job opportunity.">
        <meta property="og:type" content="Corporate Ask"/>
        <meta property="og:url" content="https://corporateaskbd.com"/>
        <meta property="og:image" content="https://corporateaskbd.com/images/fb-logo.png">
        <meta property="og:image:height" content="300px"/>
        <meta property="og:image:width" content="600px"/>
        <meta property="og:site_name" content="Corporate Ask"/>
        <link rel="canonical" href="https://corporateaskbd.com/"/>
        <title>  Job secrets in Bangla: That you need to know | Corporate Ask </title>
    @endif
    
@endforeach
@endsection
@section('content')

@foreach ($category as $category_image)  
  <section>
         <img src="{{ asset('categories/images/'.$category_image->image) }}" style="height: auto; width: 100%">
    </section>
@endforeach
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                @foreach ($category as $categorys) 
                    <div class="mt-4">
                        <h1 class="text-center"> {{ $categorys->name }}</h1>
                        <p class="text-justify"><?php echo $categorys->description ?></p>
                    </div>
                @endforeach
                @foreach($courses as $course)
                    <div class="col-md-4 col-sm-12 float-left mt-5 mb-5">
                        <div class="card card_browse">
                            <iframe width="100%" height="200px" src="https://www.youtube.com/embed/<?php echo $course->video_link ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
