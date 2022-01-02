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
    @foreach ($meta as $metas)
        @if($metas->sku_type == 'package')
            @if($metas->key == 'description' && $metas->type == 'seo')
                <meta name="description" content="@php echo  $metas->value @endphp ">
            @endif
            <meta property="og:type" content="Corporate Ask"/>
            <meta property="og:url" content="https://corporateaskbd.com"/>
            <meta property="og:image" content="https://corporateaskbd.com/images/fb_icon.png">
            <meta property="og:image:height" content="300px"/>
            <meta property="og:image:width" content="600px"/>
            <meta property="og:site_name" content="Corporate Ask"/>
            <link rel="canonical" href="https://corporateaskbd.com/"/>  
            @if($metas->key == 'title' && $metas->type == 'seo')
                <title>@php echo $metas->value @endphp  </title>
            @endif

            @elseif($metas->sku_type == 'product')
                @if($metas->key == 'description' && $metas->type == 'seo')
                    <meta name="description" content="@php echo  $metas->value @endphp ">
                @endif
                <meta property="og:type" content="Corporate Ask"/>
                <meta property="og:url" content="https://corporateaskbd.com"/>
                <meta property="og:image" content="https://corporateaskbd.com/images/fb_icon.png">
                <meta property="og:image:height" content="300px"/>
                <meta property="og:image:width" content="600px"/>
                <meta property="og:site_name" content="Corporate Ask"/>
                <link rel="canonical" href="https://corporateaskbd.com/"/>  
                @if($metas->key == 'title' && $metas->type == 'seo')
                    <title>@php echo $metas->value @endphp  </title>
                @endif
        @endif
    @endforeach
   
  
@endsection
@section('content')
<div class="" id="particles-js">
    <div class="heading">
        @foreach ($package as $packages)
            <h1 class="text-center text-white package_name"> {{ $packages->name }} <br/>
                <span class="sub_panckage_name">CV-Resume, Cover Letter services</span>
            </h1>
        @endforeach
        
    </div>
</div>
<section class="recomandation">
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-md-3 col-sm-12 float-left">
                <div class="card mt-3 service_content" style="border: 2px solid red; border-radius: 10px">
                    <div class="card-header" style="background-color: red; height: 38px;">
                        <h1 class="text-center text-white servise_heading"> FAQs  & Working Process </h1>
                    </div>
                    <div class="card-body unselectable" style="font-family: 'Hind Siliguri'">
                        @foreach ($meta as $metas)
                            @if($metas->type == 'default' && $metas->key == 'faq')
                                @php echo $metas->value @endphp
                            @endif
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <a class="btn text-white btn-block" href="{{ url('/FAQs') }}" style="border-radius: 12px; background-color: red">Read More</a>
                    </div>
                </div>
            </div>

            @foreach ($package as $packages)
                <div class="col-md-5 col-sm-12 float-left mt-3">
                    <form action="{{ route('orders-cart.store') }}" method="POST">
                        @csrf
                        <div class="card service_content" style="border: 2px solid red; border-radius: 10px">
                            <div class="card-header" style="background-color: red; height: 38px;">
                                <h1 class="text-white servise_heading">Start From: <del> {{ number_format($packages->price,2) }} </del> {{ number_format($packages->default_discount,2) }} BDT (70% Discount).</h1>                   
                            </div>
                            <div class="card-body" style=""> 
                                
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
                                    
                                    @php
                                        $products = DB::table('product_packages')
                                            ->join('products', 'products.id', '=', 'product_packages.product_id')
                                            ->where('product_packages.package_id', '=', $packages->id)
                                            ->get();
                                    @endphp
                                    @foreach ($products as $product)
                                    
                                        <input value="{{ $packages->id }}" name="purchase_type" hidden>
                                        @if($product->is_required == '1')
                                            <i class="fas fa-circle" style="font-size: 13px; color: red"></i> {{ $product->name }}<br/>
                                        @elseif ($product->is_required == '0')
                                            <input value="{{ $product->category_id }}" name="category_id[]" hidden>
                                            <input type="checkbox" name="product_id[]"  value="{{ $product->id }}"> {{ $product->name }} <span class="text-danger"> {{ number_format($product->default_discount,2) }} T.K</span> <br/>
                                        @endif
                                    @endforeach
                                    <span class="text-danger">{{ $errors->first('cv_service_id') }}</span>
                                    
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('pages.show', ['name'=>'Professional-CV-Resume']) }}" class="text-decoration-none text-capitalize"><i class="fas fa-link text-danger"></i> Buy Standard Package (Only CV/ Resume)</a>
                                </div>
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
            @endforeach

            <div class="col-md-4 col-sm-12 float-left">
                <div class="card mt-3 service_content" style="border: 2px solid red; border-radius: 10px">
                    <div class="card-header" style="background-color: red; height: 38px;">
                        <h1 class="text-center text-white servise_heading"> Features & Benefits </h1>
                    </div>
                    <div class="card-body unselectable dummy fetures" style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; font-family: 'Lato'; font-size: 15px">
                        @foreach ($meta as $metas)
                            @if($metas->type == 'default' && $metas->key == 'features')
                                @php echo $metas->value @endphp
                            @endif
                        @endforeach
                  </div>
                </div>
            </div>
        </div>
    </div>
   
</section>
@endsection
@section('script')
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
            @foreach ($package as $packages)
             {{ $packages->default_discount }})
            @endforeach;
        }
    });
</script>

@endsection