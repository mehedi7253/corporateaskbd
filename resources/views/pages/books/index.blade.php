@extends('pages.layouts.app')
@section('meta-content')
    <meta name="description" content="Collect communication skills & personal development books to increase your career opportunities. Check our Books collection written by Niaz Ahmed & other popular writers.">
    <meta property="og:type" content="Corporate Ask"/>
    <meta property="og:url" content="https://corporateaskbd.com"/>
    <meta property="og:image" content="https://corporateaskbd.com/images/fb-logo.png">
    <meta property="og:image:height" content="300px"/>
    <meta property="og:image:width" content="600px"/>
    <meta property="og:site_name" content="Corporate Ask"/>
    <link rel="canonical" href="https://corporateaskbd.com/"/>
    <title>Communication skills & Personal development books collection - Corporate Ask</title>
@endsection
@section('content')

    <section class="recomandation">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 mt-5 mb-5"> 
                    @foreach($books as $book)
                        <div class="col-md-4 col-sm-12 float-left mt-3">
                            <div class="card" style="border: 2px solid red; border-radius: 10px">
                                <img src="{{ asset('book/images/'.$book->main_image) }}" class="card-img-top" style="height: 200px; width: 100%; border-top-right-radius: 8px; border-top-left-radius: 8px;">
                                <div class="card-body">
                                    <div class="col-md-6 float-left text-danger font-weight-bold"><del>{{ number_format($book->old_price,2)}} T.K </del></div>
                                    <div class="col-md-6 float-left text-right text-dark font-weight-bold">{{ number_format($book->discount_price,2)}} T.K</div>
                                </div>
                                <div class="card-footer">
                                    <div class="col-6 float-left">
                                        <a href="{{ route('books.book_details', ['books_url'=>$book->url]) }}" class="btn btn-danger"> <i class="fas fa-cart-plus"></i></a> 
                                    </div>
                                    <div class="col-6 float-left">
                                        <a href="{{ route('books.book_details', ['books_url'=>$book->url]) }}" class="float-right btn btn-info"><i class="fas fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                     @endforeach
                </div>
            </div>
        </div>
    </section>
    
@endsection