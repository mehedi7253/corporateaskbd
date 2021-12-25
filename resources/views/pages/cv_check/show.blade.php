@extends('pages.layouts.app')
@section('meta-content')
    <meta name="description" content="Who is Niaz Ahmed? He is a professional resume writer, author, 
    and career consultant in Bangladesh. He has been successfully 
    working on the career development of the youth.">
    <meta property="og:type" content="Corporate Ask"/>
    <meta property="og:url" content="https://corporateaskbd.com"/>
    <meta property="og:image" content="https://corporateaskbd.com/images/fb-logo.png">
    <meta property="og:image:height" content="300px"/>
    <meta property="og:image:width" content="600px"/>
    <meta property="og:site_name" content="Corporate Ask"/>
    <link rel="canonical" href="https://corporateaskbd.com/"/>
    <title>CV/Resume Checking| Corporate Ask</title>
@endsection
@section('content')
<div class="" id="particles-js">
    <div class="heading">
        @foreach ($cvcheck as $services)
            <h1 class="text-center text-white package_name" style="margin-top: 5%">{{ $services->service_name }}</h1>
        @endforeach
    </div>
</div>


<section class="recomandation">
    <div class="container">
        <div class="row mt-5 mb-5">
                <div class="col-md-4 col-sm-12 float-left">
                    <div class="card mt-3 cv_check" style="border: 2px solid red; border-radius: 10px">
                        <div class="card-header" style="background-color: red; height: 38px;">
                            <h1 class="text-center text-white servise_heading"> FAQs  & Working Process </h1>
                        </div>
                        <div class="card-body unselectable" style="font-family: 'Barlow', sans-serif; margin: 5px; padding: 5px; height: 700px; overflow: auto;">
                           <p  class="font-weight-bold text-justify"> Question: What Specific things would you check? </p>
                           <p class="text-justify" style="letter-spacing: -1px; font-size: 15px; color: black; margin-top: -16px"> <span class="text-danger font-weight-bold">Answer:</span> We would check the page set up, format, powerful words, career development ladder, major accomplishments, dull phrases, killer phrases, idiotic phrases & boring phrases of resume. </p>
                            
                           <p  class="font-weight-bold text-justify"> Question: Do I need to come to your office?  </p>
                           <p class="text-justify" style="letter-spacing: -1px; font-size: 15px; color: black; margin-top: -16px"> <span class="text-danger font-weight-bold">Answer:</span> No, You don’t need to come to office. This is completely an online service  </p>
                            
                           <p  class="font-weight-bold text-justify"> Question: Will you make correction in my cv?   </p>
                           <p class="text-justify" style="letter-spacing: -1px; font-size: 15px; color: black;margin-top: -16px"> <span class="text-danger font-weight-bold">Answer:</span> We will tell you the corrections, you have to make the necessary corrections by yourself  </p>

                           <p  class="font-weight-bold text-justify"> Question: How long it would take to give me the report?   </p>
                           <p class="text-justify" style="letter-spacing: -1px; font-size: 15px; color: black;margin-top: -16px"> <span class="text-danger font-weight-bold">Answer:</span> You will get instantly  </p>

                           <p  class="font-weight-bold text-justify"> Question: How can I send you my cv?  </p>
                           <p class="text-justify" style="letter-spacing: -1px; font-size: 15px; color: black; margin-top: -16px"> <span class="text-danger font-weight-bold">Answer:</span> You can just upload the cv in our website  </p>

                        </div>             
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 float-left mt-3">
                    <form action="{{ route('cvchecks.store') }}" method="POST">
                        @csrf
                        <div class="card cv_check" style="border: 2px solid red; border-radius: 10px">
                            <div class="card-header text-center" style="background-color: red; height: 38px;">
                                <h1 class="text-white servise_heading"><del> 1000.00 </del>  500.00 BDT.</h1>
                            </div>
                            <img src="{{ asset('images/CA-10fff.jpg') }}" style="height: auto; width: 100%"  alt="image">
                            <div class="card-body text-center">
                                @foreach ($cvcheck as $service)
                                     <input name="service_id" hidden value="{{ $service->id }}">
                                     <input name="price" hidden value="{{ $service->discount_price }}">
                                @endforeach
                                

                                <div class="form-group">
                                    <input type="checkbox" required><a target="_blank" href="{{ url('/policy') }}"> Accept Terms & Condition</a>                                            
                                </div>
                            </div>
                            <div class="card-footer" style="text-align: center">
                                <input type="submit" value="Submit" name="btn_cv" class="btn btn-success col-5 mx-auto" onclick="checkCheckbox()" style="border-radius: 12px">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 col-sm-12 float-left">
                    <div class="card mt-3 cv_check" style="border: 2px solid red; border-radius: 10px">
                        <div class="card-header" style="background-color: red; height: 38px;">
                            <h1 class="text-center text-white servise_heading"> Features & Benefits </h1>
                        </div>
                        <div class="card-body unselectable dummy fetures" style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; font-family: 'Lato'; font-size: 15px">
                            <li>Your cv will be thoroughly checked.</li>
                            <li>You will get a comprehensive report.</li>
                            <li>Mistakes of your cv would be described in the cv.</li>
                            <li>Corrections will be mentioned.</li>
                            <li>You can make your own cv if you want.</li>
                            <li>You would be able to know about the contents of professional cv. </li>
                            <li>You can re-write the cv after learning about the mistakes.</li>
                        </div>
                    </div>
                </div>
           
        </div>
    </div>
   
</section>

@endsection
