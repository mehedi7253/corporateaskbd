@extends('pages.layouts.app')
@section('meta-content')
    <meta name="description" content="Get to know our team, who are working with Corporate Ask to serve you.">
    <meta property="og:type" content="Corporate Ask"/>
    <meta property="og:url" content="https://corporateaskbd.com"/>
    <meta property="og:image" content="https://corporateaskbd.com/images/fb-logo.png">
    <meta property="og:image:height" content="300px"/>
    <meta property="og:image:width" content="600px"/>
    <meta property="og:site_name" content="Corporate Ask"/>
    <link rel="canonical" href="https://corporateaskbd.com/"/>
    <title>Meet The Team - Corporate Ask</title>
@endsection

@section('content')
    <section>
        <div class="py-5 team4">
            <div class="container">
                <div class="row justify-content-center mb-4">
                    <div class="col-md-7 text-center">
                        <h1 class="mb-3">Corporate Ask Team</h1>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 mx-auto mt-4 mb-5">
                    <div class="card" style="height: 360px; border: 2px solid red; border-radius: 10px">
                        <div class="card-body">
                            <p class="text-center"><img class="img-fluid cardImage" title="Niaz Ahmed" src="{{ asset('team/images/niaz.jpg') }}" alt="card image" style="width: 200px; height: auto; background-position: 50% 50%; margin: 0 auto; border-radius: 50%"></p>
                            <hr/>
                            <h3 class="text-capitalize text-center"><span style="font-size: 30px">Niaz Ahmed</span></h3>
                            <p class="text-center" style="color: red; font-weight: 300; font-family: 'Lato'"> Founder & CEO </p>
                        </div>
                    </div>
                </div>

                <hr/>
                <div class="row">
                    @foreach($members as $member)
                        <div class="col-md-4 col-sm-12 float-left">
                            <div class="card" style="height: 300px; border: 2px solid red; border-radius: 10px">
                                <div class="card-body">
                                    <p class="text-center"><img class="img-fluid cardImage" title="{{$member->first_name}}" src="{{ asset('team/images/'.$member->image) }}" alt="card image" style="width: 150px; height: 150px; background-position: 50% 50%; margin: 0 auto; border-radius: 50%"></p>
                                    <h3 class="text-capitalize text-center"><span style="font-size: 30px">{{$member->first_name}} {{ $member->last_name }}</span></h3>
                                    <p class="text-center" style="color: red; font-weight: 300; font-family: 'Lato'"> {{ $member->designation }} </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection