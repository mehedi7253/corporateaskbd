<!-- User Info -->
<div class="user-info">
    <div class="image">
        <img src="{{ asset('images/admin.jpg') }}" width="48" height="48" alt="User" />
    </div>
    <div class="info-container">
        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
        <div class="email">{{ Auth::user()->email }}</div>
        <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
                <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="javascript:void(0);"><i class="material-icons">group</i>Update Profile</a></li>
                <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Change Password</a></li>
                <li role="separator" class="divider"></li>

                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                        <i class="material-icons"></i>Sign Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- #User Info -->
<!-- Menu -->
@if(Auth::user()->email == 'sub@admin.com')
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{ url('/') }}">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons"></i>
                    <span>Service Orders</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('order-services.index') }}"> New Order</a>
                    </li>
                    <li>
                        <a href="{{ route('order-services.create') }}">Complete Order</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons"></i>
                    <span>Manual Orders
                    <sup class="font-weight-bold text-danger">
                         @php
                             $notification = DB::table('orders')->where('notify','=','0')->where('status','=','Processing')->where('type','=','Manual Payment')->count();
                             echo $notification;
                         @endphp
                    </sup>
                </span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('manual-orders.index') }}"> New Orders</a>
                    </li>
                    <li>
                        <a href="{{ route('manual-orders.create') }}">Complete Order</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">widgets</i>
                    <span>Manage Services</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('services.create') }}"> Add Service</a>
                    </li>
                    <li>
                        <a href="{{ route('services.index') }}">Manage Service</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons"></i>
                    <span>Manage Services Category</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('service-category.create') }}"> Add Category</a>
                    </li>
                    <li>
                        <a href="{{ route('service-category.index') }}">Manage Category</a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">widgets</i>
                    <span>Cv Checking Orders
                        <sup class="font-weight-bold text-danger">
                            @php
                                $notification = DB::table('orders')->where('notify','=','0')->where('status','=','Processing')->where('type','=','Cv Checking')->count();
                                echo $notification;
                            @endphp
                        </sup>
                    </span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('cvcheck-order.index') }}"> New Order</a>
                    </li>
                    <li>
                        <a href="{{ route('cvcheck-order.create') }}">Complete Order</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
@else

    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{ url('/') }}">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">widgets</i>
                    <span>Service Orders</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('order-services.index') }}"> New Order</a>
                    </li>
                    <li>
                        <a href="{{ route('order-services.create') }}">Complete Order</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">widgets</i>
                    <span>Manual Orders
                    <sup class="font-weight-bold text-danger">
                         @php
                             $notification = DB::table('orders')->where('notify','=','0')->where('status','=','Processing')->where('type','=','Manual Payment')->count();
                             echo $notification;
                         @endphp
                    </sup>
                </span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('manual-orders.index') }}"> New Orders</a>
                    </li>
                    <li>
                        <a href="{{ route('manual-orders.create') }}">Complete Order</a>
                    </li>
                </ul>
            </li>
          

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">widgets</i>
                    <span>Book Orders
                    <sup class="font-weight-bold text-danger">
                         @php
                             $notification = DB::table('orders')->where('notify','=','0')->where('status','=','Processing')->where('type','=','Book Payment')->count();
                             echo $notification;
                         @endphp
                    </sup>
                </span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('bookorders.index') }}"> New Orders</a>
                    </li>
                    <li>
                        <a href="{{ route('bookorders.create') }}">Complete Order</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">widgets</i>
                    <span>Cv Checking Orders
                        <sup class="font-weight-bold text-danger">
                            @php
                                $notification = DB::table('orders')->where('notify','=','0')->where('status','=','Processing')->where('type','=','Cv Checking')->count();
                                echo $notification;
                            @endphp
                        </sup>
                    </span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('cvcheck-order.index') }}"> New Order</a>
                    </li>
                    <li>
                        <a href="{{ route('cvcheck-order.create') }}">Complete Order</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">widgets</i>
                    <span>Manage Services Category</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('service-category.create') }}"> Add Category</a>
                    </li>
                    <li>
                        <a href="{{ route('service-category.index') }}">Manage Category</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">widgets</i>
                    <span>Manage Package</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('packages.create') }}"> Add Package</a>
                    </li>
                    <li>
                        <a href="{{ route('packages.index') }}">Manage Package</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">widgets</i>
                    <span>Manage Services</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('services.create') }}"> Add Service</a>
                    </li>
                    <li>
                        <a href="{{ route('services.index') }}">Manage Service</a>
                    </li>
                </ul>
            </li>
           
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">widgets</i>
                    <span>Offer Services</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('admin-offers.create') }}"> Add Offer</a>
                    </li>
                    <li>
                        <a href="{{ route('admin-offers.index') }}">Manage Offers</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">widgets</i>
                    <span>Fake Orders</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('fake-order.index') }}"> Fake Orders</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.users.userLists') }}">
                    <i class="material-icons">home</i>
                    <span>Manage users</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">widgets</i>
                    <span>Manage Blogs</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('admin-blogs.create') }}"> Add Blog</a>
                    </li>
                    <li>
                        <a href="{{ route('admin-blogs.index') }}">Manage Blogs</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">widgets</i>
                    <span>Manage Books</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('admin-books.create') }}"> Add Book</a>
                    </li>
                    <li>
                        <a href="{{ route('admin-books.index') }}">Manage Books</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">widgets</i>
                    <span>Manage Categories</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('categories.create') }}"> Add Category</a>
                    </li>
                    <li>
                        <a href="{{ route('categories.index') }}">Manage Categories</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">widgets</i>
                    <span>Manage Coupon Codes</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('coupon-codes.create') }}"> Add Coupon</a>
                    </li>
                    <li>
                        <a href="{{ route('coupon-codes.index') }}">Manage Coupons</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{ route('messages.index') }}">
                    <i class="material-icons">home</i>
                    <span>Public Mail</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">widgets</i>
                    <span>Manage Team Members</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('teams.create') }}"> Add Member</a>
                    </li>
                    <li>
                        <a href="{{ route('teams.index') }}">Manage Members</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
@endif
<!-- #Menu -->
