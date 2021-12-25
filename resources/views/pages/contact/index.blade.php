@extends('pages.layouts.app')
@section('meta-content')
    <meta name="description" content="Get in touch with Corporate Ask to increase your career 
    opportunities. To get a resume, cover letter service or a 
    free consultation contact us now.">
    <meta property="og:type" content="Corporate Ask"/>
    <meta property="og:url" content="https://corporateaskbd.com"/>
    <meta property="og:image" content="https://corporateaskbd.com/images/fb-logo.png">
    <meta property="og:image:height" content="300px"/>
    <meta property="og:image:width" content="600px"/>
    <meta property="og:site_name" content="Corporate Ask"/>
    <link rel="canonical" href="https://corporateaskbd.com/"/>
    <title>Get in Touch with Us - Corporate Ask</title>
@endsection
@section('content')

    <div class="contact-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <h2 class="text-center text-white font-weight-bold p-5 text-capitalize" style="font-family: 'Barlow', sans-serif; font-weight: 700;">send  message to Corporate Ask !!</h2>
                </div>
                <div class="col-md-5 col-sm-12">
                    <h2 class="ml-5 text-white mt-5 font-weight-bold" style="font-family: 'Barlow', sans-serif; font-weight: 700;">Getting in touch is easy!</h2>
                    <p class="text-white ml-5 mt-3 font-weight-light text_contact">Address:  Section: 07, Plot: 22, Main Road, Mid Town Shopping Complex, Pallabi, Mirpur.</p>
                    <p class="text-white ml-5 mt-3 font-weight-light text_contact">Phone:  (+88)01975409545 </p>
                    <p class="text-white ml-5 mt-3 font-weight-light text_contact">Email:  contact@corporateaskbd.com</p>

                    <li class="nav-link float-left ml-4 mt-5"><a href="https://www.facebook.com/CorporateAsk" target="_blank" class="nav-item"><i class="fab fa-facebook fa-2x social-symbol2"></i></a></li>
                    <li class="nav-link float-left mt-5"><a href="#" class="nav-item"><i class="fab fa-twitter fa-2x social-symbol2"></i></a></li>
                    <li class="nav-link float-left mt-5"><a href="https://www.linkedin.com/company/corporate-ask/" target="_blank" class="nav-item"><i class="fab fa-linkedin fa-2x social-symbol2"></i></a></li>
                    <li class="nav-link float-left mt-5"> <a href="mailto:contact@corporateaskbd.com?subject = Feedback&body = Message" class="nav-item"><i class="fas fa-envelope fa-2x social-symbol2"></i></a></li>
                    <li class="nav-link float-left mt-5"><a href="https://wa.me/01975409545" target="_blank" class="nav-item"><i class="fab fa-whatsapp fa-2x social-symbol2"></i></a></li>
                    
                </div>
                <div class="col-sm-12 col-md-7">
                    <form action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon" id="sizing-addon1">
                                <i class="fas fa-user fa-2x p-4 social-symbol3"></i>
                            </span>
                            <input id="name" type="text" class="form-control mt-3 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Your Full Name" autocomplete="name" autofocus style="border: none; border-radius: 10px; font-family: 'Lato';">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon" id="sizing-addon2">
                                <i class="fas fa-envelope fa-2x p-4 social-symbol3"></i>
                            </span>
                            <input id="email" type="email" class="form-control mt-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Your Email" autocomplete="email" autofocus style="border: none; border-radius: 10px; font-family: 'Lato';">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon" id="sizing-addon3">
                                <i class="far fa-address-book fa-2x p-4 social-symbol3"></i>
                            </span>
                            <input id="phone" type="text" class="form-control mt-3 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Enter Your Phone Number" autocomplete="phone" autofocus style="border: none; border-radius: 10px; font-family: 'Lato';">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <textarea cols="40" rows="6" class="form-control mt-4 @error('phone') is-invalid @enderror"" name="message" placeholder="Type your Message" style="border: none; border-radius: 10px; font-family: 'Lato';"></textarea>
                            @error('message')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" name="btn" class="btn btn-success btn-lg mt-3 mb-5 contact-btn" style="border-radius: 10px">Send Your Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection