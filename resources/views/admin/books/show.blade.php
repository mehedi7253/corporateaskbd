@extends('admin.layouts.app')
@section('content')
    <ol class="breadcrumb" style="background-color: aliceblue; font-size: 15px; border-radius: 15px">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">{{$page_name}}</li>
    </ol>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>{{$page_name}}</h2>
                    <ul class="header-dropdown m-r--5">
                        <a href="{{ route('admin-books.create') }}" class="btn btn-primary">Add New Books</a>
                    </ul>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div>
                                <img src="{{asset('book/images/'.$book->main_image)}}" alt="imags" id="mainImage" class="main-Image" style="height: auto; width: 100%">
                               
                            </div>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Book Name</th>
                                    <td>{{ $book->book_name }}</td>
                                </tr>
                                <tr>
                                    <th>Writer Name</th>
                                    <td>{{ $book->writer_name }}</td>
                                </tr>
                                <tr>
                                    <th>Publisher Name</th>
                                    <td>{{ $book->publisher_name }}</td>
                                </tr>
                                <tr>
                                    <th>URl</th>
                                    <td>{{ $book->url }}</td>
                                </tr>
                                <tr>
                                    <th>Country Name</th>
                                    <td>{{ $book->country }}</td>
                                </tr>
                                <tr>
                                    <th>Language</th>
                                    <td>{{ $book->language }}</td>
                                </tr>
                                <tr>
                                    <th>Old Price</th>
                                    <td>{{ number_format($book->old_price,2) }} BDT.</td>
                                </tr>
                                <tr>
                                    <th>Discount Price</th>
                                    <td>{{ number_format($book->discount_price,2) }} BDT.</td>
                                </tr>
                            </table>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <p class="text-justify p-5">
                                    @php
                                        echo $book->description;
                                    @endphp
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var img1Element  = document.getElementById('img1');
        img1Element.onclick = function () {
            var imgUrl = img1Element.getAttribute('src');
            var mainImage = document.getElementById('mainImage');
            mainImage.setAttribute('src', imgUrl);
        };


        var img2Eement  = document.getElementById('img2');
        img2Eement.onclick = function () {
            var imgUrl = img2Eement.getAttribute('src');
            var mainImage = document.getElementById('mainImage');
            mainImage.setAttribute('src', imgUrl);
        };

        var img3Element  = document.getElementById('img3');
        img3Element.onclick = function () {
            var imgUrl = img3Element.getAttribute('src');
            var mainImage = document.getElementById('mainImage');
            mainImage.setAttribute('src', imgUrl);
        };
    </script>
@endsection