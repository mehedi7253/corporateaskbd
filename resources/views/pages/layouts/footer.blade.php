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
            <div class="col-md-6 col-sm-12 float-left mx-auto p-2 ml-5">
                <ul class="social-network social-circle">
                    <li><a href="https://www.facebook.com/CorporateAsk" target="_blank" class="icoFacebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/corporate-ask/" target="_blank" class="icoLinkedin" title="twitter"><i class="fab fa-linkedin-in "></i></a></li>
                    <li><a href="mailto:corporateask@gmail.com?subject = Feedback&body = Message" class="icogmail" title="Gmail"><i class="far fa-envelope "></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCjm5cMnB7RSLmL-165bIZbA/featured" target="_blank" class="icoYoutube" title="Youtube"><i class="fab fa-youtube youtube"></i></a></li>
                </ul>
            </div>
            <div class="col-md-6 col-sm-12 float-left">
                <p class="text-right mr-3 text-white pt-1" style="font-size: 14px; margin: 6px;">This site is Copyright By &copy;<b> Corporate Ask.Com</b></p>
            </div>
        </div>
    </div>
</section>
<!--end  footer-->
<button id="topBtn"><i class="fas fa-arrow-up"></i></button>
<div id="fb-root"></div>


<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution="page_inbox"
     page_id="1465613063755348">
</div>
