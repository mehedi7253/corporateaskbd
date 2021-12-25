@extends('pages.layouts.app')
@section('meta-content')
    <meta name="description" content="Who is Niaz Ahmed? He is a professional resume writer, author, 
    and career consultant in Bangladesh. He has been successfully 
    working on the career development of the youth.">
    <meta property="og:type" content="Corporate Ask"/>
    <meta property="og:url" content="https://corporateaskbd.com"/>
    <meta property="og:image" content="https://corporateaskbd.com/images/fb-logo.png">
    <meta property="og:image:height" content="300px"/>
    <meta property="og:image:width" content="600px"/>
    <meta property="og:site_name" content="Corporate Ask"/>
    <link rel="canonical" href="https://corporateaskbd.com/"/>
    <title>Resume writing - Job Interview: Free Courses and Tutorials | Corporate Ask</title>
@endsection
@section('content')
    <section class="recomandation">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    @foreach($categorys as $category)
                        <div class="col-md-4 col-sm-12 mt-5 mb-5 float-left">
                            <div class="card" style="border: 2px solid red; border-radius: 10px">
                                <div class="card-header" style="background-color: #FFEFCD; border-top-right-radius: 10px; border-top-left-radius: 10px;">
                                    <h1 class="text-center" style="font-size: 27px; font-family: 'Barlow', sans-serif;font-weight: bold; color: red;">{{$category->name}}</h1>
                                </div>
                                <img src="{{ asset('categories/images/'.$category->image) }}" class="card-img-top" style="height: auto; width: 100%" alt="{{ $category->name }}}">
                                <div class="card-body">
                                    <p class="text-center" style="font-family: 'Raleway';">Total
                                        @php
                                             $count = DB::table('categories')
                                                ->join('courses','courses.category_id', '=', 'categories.id')
                                                ->where('categories.name', '=', $category->name)
                                                ->count();
                                        @endphp
                                        {{ $count }}
                                         <span class="font-weight-bold"></span> Videos Have This Category</p>                             
                                </div>
                                <div class="card-footer" style="background-color: #FFEFCD; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;">
                                    <a class="btn col-6 float-right" href="{{ route('courses-and-tutorials.show', ['tutorials'=>$category->url]) }}" style="border-radius: 10px; background-color: red; color: white">View More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-12 col-sm-12 float-left">
                        {{ $categorys->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
