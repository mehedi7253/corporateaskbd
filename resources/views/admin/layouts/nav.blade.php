<div class="container-fluid">
    <div class="navbar-header">
        <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
        <a href="javascript:void(0);" class="bars"></a>
        <a class="navbar-brand" href="../../index.html">Admin Pannel-CorporateaskBD</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                    <i class="material-icons">notifications</i>
                    <span class="label-count">
                        @php
                            $notification = DB::table('orders')->where('notify','=','0')->where('status','=','Processing')->where('invoice_number','!=','0')->where('type','=','')->count();
                            echo $notification;
                        @endphp
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">NOTIFICATIONS</li>
                    <li class="body">
                        <ul class="menu">
                            @php($order_details = DB::table('orders')->where('notify','=','0')->where('status','=','Processing')->where('invoice_number','!=','0')->limit('10')->orderBy('id','DESC')->get())

                            @foreach($order_details as $order)
                                <li style="list-style: none">
                                    <a href="{{ route('order-services.index') }}">
                                        <div class="icon-circle bg-light-green">
                                            <i class="fa fa-file-invoice"></i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>{{ $order->invoice_number }}</h4>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="footer">
                        <a href="{{ route('order-services.index') }}">View All Notifications</a>
                    </li>
                </ul>
            </li>
            <!-- #END# Notifications -->

        </ul>
    </div>
</div>
