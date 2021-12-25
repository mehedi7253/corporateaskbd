@extends('pages.layouts.app')
@section('content')

<section class="recomandation">
    <div class="container">
        @foreach ($books as $book)
            
        
        <div class="row">
            <div class="col-md-12 col-sm-12">
             
                <div class="card mt-5" style="border: 2px solid red; border-radius: 10px">
                    <div class="card-header" style="background-color: #FF0000">
                        @if (Route::has('login'))
                            @auth
                            <p class="text-left text-white"> <span style="font-size: 30px; margin-top: -3px; position: absolute;">{{ $book->book_name }} </span><a href="{{ route('carts.index') }}" class="float-right btn btn-dark"> <i class="fa fa-cart-plus"></i>  {{ $cart_count }} Item</a> </p>
                            @else
                            <p class="text-left text-white"> <span style="font-size: 30px; margin-top: -3px; position: absolute;">{{ $book->book_name }} </span><a href="" class="float-right btn btn-dark"> <i class="fa fa-cart-plus"></i>  {{ $cart_count }} Item</a> </p>
                            @endauth
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="col-md-6 col-sm-12 float-left" style="border-right: 2px solid red">
                            <div>
                                <img src="{{asset('book/images/'.$book->main_image)}}" alt="imags" id="mainImage" class="main-Image" style="height: auto; width: 100%">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 float-left">
                            <div class="p-3">
                                <h1 class="font-weight-bold" style="font-family: 'Hind Siliguri';">{{ $book->book_name }}</h1>
                                <h3 style="font-family: 'Raleway';">{{ $book->writer_name }}</h3>
                                <p class="font-weight-bold text-danger"><del > {{ number_format($book->old_price,2) }} Taka</del> <span class="float-right"> {{ number_format($book->discount_price, 2) }} Taka</span></p>
                                <form action="{{ route('books.addtocart') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input name="book_id" value="{{ $book->id }}" hidden>
                                        <input id="quantity" type="number" min="1" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" placeholder="Enter Number Of Quantity" autocomplete="quantity" autofocus>                                       
                                        @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                             <label style="color: red">{{ $message }}</label>
                                         </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-12 float-left mt-3 mb-5">
                                        <input type="submit" class="btn-block text-decoration-none add_to_cart" name="btn" value="Add To Cart">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="col-md-12 col-sm-12 mt-5 mb-5">
                <div class="card" style="border: 2px solid red; border-radius: 10px">
                    <div class="card-header" style="background-color: red">
                        <h3 class="text-white" style="font-family: 'Raleway'; font-weight: bold">Book Specification</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th style="background-color: #F1F2F4;">Title</th>
                                    <td>{{ $book->book_name }}</td>
                                </tr>
                                <tr>
                                    <th style="background-color: #F1F2F4;">Author	</th>
                                    <td>{{ $book->writer_name }}</td>
                                </tr>
                                <tr>
                                    <th style="background-color: #F1F2F4;">Publisher</th>
                                    <td>{{ $book->publisher_name }}</td>
                                </tr>
                           
                                <tr>
                                    <th style="background-color: #F1F2F4;">Country</th>
                                    <td>{{ $book->country }}</td>
                                </tr>
                                <tr>
                                    <th style="background-color: #F1F2F4;">Language</th>
                                    <td>{{ $book->language }}</td>
                                </tr>
                               
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
    
@endsection

