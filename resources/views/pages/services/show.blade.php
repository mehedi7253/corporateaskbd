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
  @foreach ($services as $meta_service) 
  @if ($meta_service->id == '1')
          <meta name="description" content="Get our premium package to take your job career one step further. In this package, you will get all the necessary services to prepared for career opportunities.">
          <meta property="og:type" content="Corporate Ask"/>
          <meta property="og:url" content="https://corporateaskbd.com"/>
          <meta property="og:image" content="https://corporateaskbd.com/images/fb_icon.png">
          <meta property="og:image:height" content="300px"/>
          <meta property="og:image:width" content="600px"/>
          <meta property="og:site_name" content="Corporate Ask"/>
          <link rel="canonical" href="https://corporateaskbd.com/"/>
          <title>CV-Resume, Cover Letter & LinkedIn-BD jobs: All in one package | Corporate Ask</title>

      @elseif ($meta_service->id == '2')
          <meta name="description" content="Increase your chances of getting a job interview call by getting a professional CV/Resume from Corporate Ask. Check out the CV/Resume writing package.">
          <meta property="og:type" content="Corporate Ask"/>
          <meta property="og:url" content="https://corporateaskbd.com"/>
          <meta property="og:image" content="https://corporateaskbd.com/images/fb_icon.png">
          <meta property="og:image:height" content="300px"/>
          <meta property="og:image:width" content="600px"/>
          <meta property="og:site_name" content="Corporate Ask"/>
          <link rel="canonical" href="https://corporateaskbd.com/"/>
          <title>Professional CV & Resume writing service package | Corporate Ask</title>
      @elseif ($meta_service->id == '3')
          <meta name="description" content="To increase the chances of a better career from BD Jobs, make your profile more standard with our BD Jobs Profile Update Service at the lowest cost.">
          <meta property="og:type" content="Corporate Ask"/>
          <meta property="og:url" content="https://corporateaskbd.com"/>
          <meta property="og:image" content="https://corporateaskbd.com/images/fb_icon.png">
          <meta property="og:image:height" content="300px"/>
          <meta property="og:image:width" content="600px"/>
          <meta property="og:site_name" content="Corporate Ask"/>
          <link rel="canonical" href="https://corporateaskbd.com/"/>
          <title>BD Jobs Profile Update Service Package | Corporate Ask</title>
      @elseif ($meta_service->id == '4')
          <meta name="description" content="LinkedIn is a platform where you have a lot of chances to build your career. To increase more opportunities, get our Professional LinkedIn profile update service.">
          <meta property="og:type" content="Corporate Ask"/>
          <meta property="og:url" content="https://corporateaskbd.com"/>
          <meta property="og:image" content="https://corporateaskbd.com/images/fb_icon.png">
          <meta property="og:image:height" content="300px"/>
          <meta property="og:image:width" content="600px"/>
          <meta property="og:site_name" content="Corporate Ask"/>
          <link rel="canonical" href="https://corporateaskbd.com/"/>
          <title>Professional Linkedin Profile Update Service Package | Corporate Ask</title>
      @elseif ($meta_service->id == '5')
          <meta name="description" content="A professional cover letter will help you better present yourself and get more job interview opportunities. Check out our Cover Letter service package.">
          <meta property="og:type" content="Corporate Ask"/>
          <meta property="og:url" content="https://corporateaskbd.com"/>
          <meta property="og:image" content="https://corporateaskbd.com/images/fb_icon.png">
          <meta property="og:image:height" content="300px"/>
          <meta property="og:image:width" content="600px"/>
          <meta property="og:site_name" content="Corporate Ask"/>
          <link rel="canonical" href="https://corporateaskbd.com/"/>
          <title>Professional Cover Letter writing service package | Corporate Ask</title>
      @elseif ($meta_service->id == '6')

      @elseif ($meta_service->id == '7')

      @elseif ($meta_service->id == '8')
          <meta name="description" content="A professional cover letter will help you better present yourself and get more job interview opportunities. Check out our Cover Letter service package.">
          <meta property="og:type" content="Corporate Ask"/>
          <meta property="og:url" content="https://corporateaskbd.com"/>
          <meta property="og:image" content="https://corporateaskbd.com/images/fb_icon.png">
          <meta property="og:image:height" content="300px"/>
          <meta property="og:image:width" content="600px"/>
          <meta property="og:site_name" content="Corporate Ask"/>
          <link rel="canonical" href="https://corporateaskbd.com/"/>
          <title> Marriage CV Bio Data Writing service in Bangladesh | Corporate Ask  </title>
      @elseif ($meta_service->id == '9')
      
  @endif
@endforeach
@endsection
@section('content')
<div class="" id="particles-js">
    <div class="heading">
        @foreach ($services as $page_package) 
            @if ($meta_service->id == '1')
            <h1 class="text-center text-white package_name">  {{ $page_package->service_name }} <br/>
                <span class="sub_panckage_name">CV-Resume, Cover Letter services</span>
            </h1>
            @elseif ($meta_service->id == '2')
            <h1 class="text-center text-white package_name">  {{ $page_package->service_name }} <br/>
                <span class="sub_panckage_name">CV & Resume writing package</span>
            </h1>
            @elseif ($meta_service->id == '3')
            <h1 class="text-center text-white package_name"> {{ $page_package->service_name }} <br/>
                
            </h1>
            @elseif ($meta_service->id == '4')
            <h1 class="text-center text-white package_name">  {{ $page_package->service_name }} <br/>
                
            </h1>
            @elseif ($meta_service->id == '5')
            <h1 class="text-center text-white package_name">  {{ $page_package->service_name }} <br/>
                <span class="sub_panckage_name">Cover Letter Writing </span>
            </h1>
            
            @elseif ($meta_service->id == '6')

            @elseif ($meta_service->id == '7')

            @elseif ($meta_service->id == '8')
            <h1 class="text-center text-white" style="font-size: 3rem;">  {{ $page_package->service_name }} <br/>
                <span class="sub_panckage_name">Marriage CV Writing </span>
            </h1>
        
            @elseif ($meta_service->id == '9')

            @endif
        @endforeach
    </div>
</div>


<section class="recomandation">
    <div class="container">
        <div class="row mt-5 mb-5">
            @foreach ($services as $service) 
                <div class="col-md-3 col-sm-12 float-left">
                    <div class="card mt-3 service_content" style="border: 2px solid red; border-radius: 10px">
                        <div class="card-header" style="background-color: red; height: 38px;">
                            <h1 class="text-center text-white servise_heading"> FAQs  & Working Process </h1>
                        </div>
                        <div class="card-body unselectable" style="font-family: 'Hind Siliguri'">
                             @php echo $service->description @endphp
                        </div>
                        <div class="card-footer">
                            <a class="btn text-white btn-block" href="{{ url('/FAQs') }}" style="border-radius: 12px; background-color: red">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 float-left mt-3">
                    <form  action="{{ route('services-packages.update', $service->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card service_content" style="border: 2px solid red; border-radius: 10px">
                            <div class="card-header" style="background-color: red; height: 38px;">
                                @if($service->service_name == 'Premium Package (All In One)')
                                    <h1 class="text-white servise_heading">Start From: <del> {{ number_format($service->start_price,2) }}</del> {{ number_format($service->discount_price,2) }} BDT (70% Discount).</h1>
                                @else 
                                    <h1 class="text-white servise_heading" style="font-size: 19px">Start From: <del> {{ number_format($service->start_price,2) }}</del> {{ number_format($service->discount_price,2) }} BDT.</h1>
                                @endif                              
                            </div>
                            <div class="card-body" style=""> 
                                @if($service->service_name == 'Premium Package (All In One)')
                                    <div class="form-group">
                                        <label>Do You Have Any Experience? </label><br/>
                                        <label for="chkPassport">
                                            <input type="checkbox"  class="experience"  id="chkPassport" name="experience_check"/> Yes
                                            <span class="ml-3">  <input type="checkbox" checked class="experience" id="chkPassport2" name="experience_check" /> No </span>
                                        </label>
                                        <label style="color:red" id="error"></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Job Experience </label><br/>
                                        <input type="text" name="hour_rate" hidden id="hour_rate"  class="form-control text-dark" value="100">
                                        <input type="number" min="1" id="txtPassportNumber" required placeholder="Number of Experience" name="experience" class="form-control col-md-8 float-left p-2" disabled />
                                        <input type="number" disabled id="total" class="p-2 ml-1 form-control float-left col-md-3"><br/>
                                    </div>
                                    <div class="form-group">
                                        <label>You Will Get </label><br/>
                                        <i class="fas fa-circle" style="font-size: 13px; color: red"></i> Professional Cv / Resume<br/>
                                        @foreach($cvservices as $cv)
                                        <i class="fas fa-circle" style="font-size: 13px; color: red"></i> {{ $cv->name }} <br/>
                                        @endforeach
                                        <i class="fas fa-circle" style="font-size: 13px; color: red"></i> One to one Session
                                        @if($errors->has('cv_service_id'))
                                            <span class="text-danger">{{ $errors->first('cv_service_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <a href="{{ route('pages.show', ['name'=>'Professional-CV-Resume']) }}" class="text-decoration-none text-capitalize"><i class="fas fa-link text-danger"></i> Buy Standard Package (Only CV/ Resume)</a>
                                    </div>
                                @elseif($service->service_name == 'Standard Package (Only CV/ Resume)')
                                    <div class="form-group">
                                        <label>Do You Have Any Experience? </label><br/>
                                        <label for="chkPassport">
                                            <input type="checkbox"  class="experience"  id="chkPassport" name="experience_check"/> Yes
                                            <span class="ml-2">  <input type="checkbox" checked class="experience" id="chkPassport2" name="experience_check" /> No </span>
                                        </label>
                                        <label style="color:red" id="error"></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Job Experience </label><br/>
                                        <input type="text" name="hour_rate" hidden id="hour_rate"  class="form-control text-dark" value="100">
                                        <input type="number" min="1" id="txtPassportNumber" required placeholder="Number of Experience" name="experience" class="form-control col-md-8 float-left p-2" disabled />
                                        <input type="number" disabled id="total" class="p-2 ml-1 form-control float-left col-md-3"><br/>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label>Add More Services </label><br/>
                                        @foreach($cvservices as $cv)
                                            <input type="checkbox" name="cv_service_id[]"  value="{{ $cv->id }}"> {{ $cv->name }} <span class="text-danger"> {{ number_format($cv->price,2) }} T.K</span> <br/>
                                        @endforeach
                                        @if($errors->has('cv_service_id'))
                                            <span class="text-danger ">{{ $errors->first('cv_service_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <a href="{{ route('pages.show', ['name'=>'Premium-Package']) }}" class="text-decoration-none text-capitalize"><i class="fas fa-link text-danger"></i> Buy premium package & save 5000.00  off</a>
                                    </div>
                                @elseif($service->service_name == 'BD Jobs Profile Update')
                                    <div class="form-group">
                                        <label>Do You Have Any Experience? </label><br/>
                                        <label for="chkPassport">
                                            <input type="checkbox"  class="experience"  id="chkPassport" name="experience_check"/> Yes
                                            <span class="ml-3">  <input type="checkbox" checked class="experience" id="chkPassport2" name="experience_check" /> No </span>
                                        </label>
                                        <label style="color:red" id="error"></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Job Experience </label><br/>
                                        <input type="text" name="hour_rate" hidden id="hour_rate"  class="form-control text-dark" value="100">
                                        <input type="number" min="1" id="txtPassportNumber" required placeholder="Number of Experience" name="experience" class="form-control col-md-8 float-left p-2" disabled />
                                        <input type="number" disabled id="total" class="p-2 ml-1 form-control float-left col-md-3"><br/>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label>Add More Services </label><br/>
                                        <input type="checkbox" name="cv_service_id[]"  value="1"> Premium Cover Letter <span class="text-danger"> 1000.00 T.K</span> <br/>
                                        <input type="checkbox" name="cv_service_id[]"  value="2"> Linkedin Profile Build Up <span class="text-danger"> 2000.00 T.K </span>  <br/>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{ route('pages.show', ['name'=>'Premium-Package']) }}" class="text-decoration-none text-capitalize"><i class="fas fa-link text-danger"></i> Buy premium package & save 5000.00  off</a>
                                        <br/><a href="{{ route('pages.show', ['name'=>'Professional-CV-Resume']) }}" class="text-decoration-none text-capitalize"><i class="fas fa-link text-danger"></i> Buy Standard Package (Only CV/ Resume)</a>
                                    </div>
                                @elseif($service->service_name == 'Linkedin Profile Update')
                                    <div class="form-group">
                                        <label>Do You Have Any Experience? </label><br/>
                                        <label for="chkPassport">
                                            <input type="checkbox"  class="experience"  id="chkPassport" name="experience_check"/> Yes
                                            <span class="ml-3">  <input type="checkbox" checked class="experience" id="chkPassport2" name="experience_check" /> No </span>
                                        </label>
                                        <label style="color:red" id="error"></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Job Experience </label><br/>
                                        <input type="text" name="hour_rate" hidden id="hour_rate"  class="form-control text-dark" value="100">
                                        <input type="number" min="1" id="txtPassportNumber" required placeholder="Number of Experience" name="experience" class="form-control col-md-8 float-left p-2" disabled />
                                        <input type="number" disabled id="total" class="p-2 form-control float-left col-md-3"><br/>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label>Add More Services </label><br/>
                                        <input type="checkbox" name="cv_service_id[]"  value="1"> Premium Cover Letter <span class="text-danger"> 1000.00 T.K</span>  <br/>
                                        <input type="checkbox" name="cv_service_id[]"  value="3"> BdJobs Profile Update <span class="text-danger"> 2000.00 T.K</span> <br/>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{ route('pages.show', ['name'=>'Premium-Package']) }}" class="text-decoration-none text-capitalize"><i class="fas fa-link text-danger"></i> Buy premium package & save 5000.00  off</a>
                                        <br/><a href="{{ route('pages.show', ['name'=>'Professional-CV-Resume']) }}" class="text-decoration-none text-capitalize"><i class="fas fa-link text-danger"></i> Buy Standard Package (Only CV/ Resume)</a>
                                    </div>
                                @elseif($service->service_name == 'Cover Letter')
                                    <div class="form-group">
                                        <label>Do You Have Any Experience? </label><br/>
                                        <label for="chkPassport">
                                            <input type="checkbox"  class="experience"  id="chkPassport" name="experience_check"/> Yes
                                            <span class="ml-3">  <input type="checkbox" checked class="experience" id="chkPassport2" name="experience_check" /> No </span>
                                        </label>
                                        <label style="color:red" id="error"></label>
                                    </div>
                                    <div class="form-group">
                                        <label>Job Experience </label><br/>
                                        <input type="text" name="hour_rate" hidden id="hour_rate"  class="form-control text-dark" value="100">
                                        <input type="number" min="1" id="txtPassportNumber" required placeholder="Number of Experience" name="experience" class="form-control col-md-8 float-left p-2" disabled />
                                        <input type="number" disabled id="total" class="p-2 form-control float-left col-md-3"><br/>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label>Add More Services </label><br/>
                                        <input type="checkbox" name="cv_service_id[]"  value="2"> Linkedin Profile Build Up <span class="text-danger"> 2000.00 T.K</span> <br/>
                                        <input type="checkbox" name="cv_service_id[]"  value="3"> BdJobs Profile Update <span class="text-danger"> 2000.00 T.K</span>  <br/>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{ route('pages.show', ['name'=>'Premium-Package']) }}" class="text-decoration-none text-capitalize"><i class="fas fa-link text-danger"></i> Buy premium package & save 5000.00  off</a>
                                        <br/><a href="{{ route('pages.show', ['name'=>'Professional-CV-Resume']) }}" class="text-decoration-none text-capitalize"><i class="fas fa-link text-danger"></i> Buy Standard Package (Only CV/ Resume)</a>
                                    </div>
                                    @elseif($service->service_name == 'SOP/ Motivational Letter Writing')

                                    @elseif($service->service_name == 'Personal Website/ Portfolio')


                                    @elseif($service->service_name == 'Marriage Cv/ bio Data')

                                    @elseif($service->service_name == 'Cv Update')
                                    <div class="form-group">
                                        <label>Last Update Year</label>
                                        <input required type="number" name="update_year" placeholder="Enter CV Update Year" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <a href="{{ route('pages.show', ['name'=>'Premium-Package']) }}" class="text-decoration-none text-capitalize"><i class="fas fa-link text-danger"></i> Buy premium package & save 5000.00  off</a>
                                        <br/><a href="{{ route('pages.show', ['name'=>'Professional-CV-Resume']) }}" class="text-decoration-none text-capitalize"><i class="fas fa-link text-danger"></i> Buy Standard Package (Only CV/ Resume)</a>
                                    </div>

                                @endif
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
                    <div class="card mt-3 service_content" style="border: 2px solid red; border-radius: 10px">
                        <div class="card-header" style="background-color: red; height: 38px;">
                            <h1 class="text-center text-white servise_heading"> Features & Benefits </h1>
                        </div>
                        <div class="card-body unselectable dummy fetures" style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; font-family: 'Lato'; font-size: 15px">
                             @php echo $service->features @endphp
                      </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
   
</section>
@endsection
@section('script')
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

<script>
    $('.experience').on('change', function() {
        $('.experience').not(this).prop('checked', false);
    });

    $(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#txtPassportNumber").removeAttr("disabled");
                $("#txtPassportNumber").focus();
            } else {
                $("#txtPassportNumber").attr("disabled", "disabled");
            }
        });
    });

    $(function () {
        $("#chkPassport2").change(function () {
            var st = this.checked;

            if (st){
                $("#txtPassportNumber").prop("disabled", true);
            }else {
                $("#txtPassportNumber").prop("disabled", true);
            }
        });
    });

    function checkCheckbox() {
        var yes = document.getElementById("chkPassport");
        var no = document.getElementById("chkPassport2");
        if (yes.checked == true && no.checked == true){
            return document.getElementById("error").innerHTML = "Please mark only one checkbox either Yes or No";
        }
        else if (yes.checked == true){
            var y = document.getElementById("chkPassport").value;
            return document.getElementById("result").innerHTML = y;
        }
        else if (no.checked == true){
            var n = document.getElementById("chkPassport2").value;
            return document.getElementById("result").innerHTML = n;
        }
        else {
            return document.getElementById("error").innerHTML = "*Please mark any of checkbox";
        }
    }
</script>

<script>
    $(function() {
        $("#hour_rate, #txtPassportNumber").on("keydown keyup", total);
        function total() {
            $("#total").val(Number($("#hour_rate").val()) * Number($("#txtPassportNumber").val()) 
            + 
            @foreach ($services as $service_price)
             {{ $service_price->discount_price }})
            @endforeach;
        }
    });
</script>
@endsection