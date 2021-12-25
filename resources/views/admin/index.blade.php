@extends('admin.layouts.app')
    @section('content')
        <!-- Widgets -->
        <div class="row clearfix">

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon bg-indigo">
                        <i class="material-icons">face</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL MEMBERS</div>
                        <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">{{ $members }}</div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="icon bg-red">
                        <i class="material-icons">shopping_cart</i>
                    </div>
                    <div class="content">
                        <div class="text">NEW ORDERS</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">{{ $new_work }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="icon bg-teal">
                        <i class="material-icons">equalizer</i>
                    </div>
                    <div class="content">
                        <div class="text">DAILY SALES</div>
                        <div class="number">@php echo number_format($today_earn,2) @endphp</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="icon bg-blue-grey">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="content">
                        <div class="text text-uppercase">EARNS IN @php echo $mnth = @date('M') @endphp</div>
                        <div class="number">@php echo number_format($monthly_earn,2) @endphp</div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="body">
                        <div id="barchart_material" style="width: 100%; height: 500px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Widgets -->
    @endsection
    @section('script')
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">

            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['id', 'amount'],

                    @php
                        foreach($orders as $order) {
                            echo "['".$order->day."', ".$order->Total."],";
                        }
                    @endphp
                ]);

                var options = {
                    chart: {
                        title: 'Month | @php echo $today = @date('M') @endphp',
                    },
                    bars: 'vertical'
                };
                var chart = new google.charts.Bar(document.getElementById('barchart_material'));
                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>
    @endsection
