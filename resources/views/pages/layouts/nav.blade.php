
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container"><a href="{{ url('/') }}" class="navbar-brand text-uppercase font-weight-bold">
            <img src="{{asset('images/logo-dark.png')}}" style="width: 150px; height: auto" alt="corporate_logo">
        </a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
            
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase" href="{{ route('pages.service.package') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Services
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @php
                                $nav = DB::table('packeges')->limit('4')->get();
                            @endphp
                            @foreach ($nav as $nav_bar)
                                 <a class="dropdown-item text-capitalize" href="{{ route('pages.show', ['name'=>$nav_bar->slug]) }}">{{ $nav_bar->name }}</a>
                            @endforeach
                          <a class="dropdown-item text-capitalize" href="{{ route('pages.service.package') }}">More</a>
                        </div>
                    </li>
                    {{-- <li class="nav-item dropdown">
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
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{ route('books.index') }}">Books</a>
                    </li>
                   <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Blogs
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-capitalize" href="{{ route('blogsbn.index') }}">Bangla</a>
                            <a class="dropdown-item text-capitalize" href="{{ route('blog.englishblog') }}">English</a>
                        </div>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{ route('courses-and-tutorials.index') }}">Courses</a>
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
