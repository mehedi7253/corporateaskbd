<!-- User Info -->
<div class="user-info">
    <div class="image">
        <img src="{{ asset('user/images/'.Auth::user()->image) }}" width="48" height="48" alt="User" />
    </div>
    <div class="info-container">
        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->first_name }} {{Auth::user()->last_name}}</div>
        <div class="email">{{Auth::user()->email}}</div>
        <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
                <li><a href="{{ route('user.index') }}"><i class="material-icons"></i>Profile</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ route('user.profile.edit') }}"><i class="material-icons"></i>Update Profile</a></li>
                <li><a href="{{route('user.profile.changePass')}}"><i class="material-icons"></i>Change Password</a></li>
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
            <a href="{{route('service-orders.index')}}">
                <i class="material-icons"></i>
                <span>Service Order</span>
            </a>
        </li>
        <li>
            <a href="{{route('userbook-orders.index')}}">
                <i class="material-icons"></i>
                <span>Book Order</span>
            </a>
        </li>
    </ul>
</div>
<!-- #Menu -->
