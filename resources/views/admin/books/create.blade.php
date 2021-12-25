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
                        <a href="{{ route('admin-books.index') }}" class="btn btn-primary">Manage Books</a>
                    </ul>
                </div>
                <div class="body">

                    <form action="{{ route('admin-books.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="book_name">Book Name :<sup class="text-danger">*</sup></label>
                                        <input id="book_name" type="text" class="form-control @error('book_name') is-invalid @enderror" name="book_name" value="{{ old('book_name') }}" placeholder="Enter Book Name" autocomplete="book_name" autofocus>
                                    </div>
                                    @error('book_name')
                                    <span class="invalid-feedback" role="alert">
                                         <label style="color: red">{{ $message }}</label>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Writer Name :<sup class="text-danger">*</sup></label>
                                        <input id="writer_name" type="text"  class="form-control @error('writer_name') is-invalid @enderror" name="writer_name" value="Niaz Ahmed" placeholder="Enter Writer Name" autocomplete="writer_name" autofocus>
                                    </div>
                                    @error('writer_name')
                                    <span class="invalid-feedback" role="alert">
                                         <strong style="color: red">{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="publisher_name">Publisher Name :<sup class="text-danger">*</sup></label>
                                        <input id="publisher_name" type="text" class="form-control @error('publisher_name') is-invalid @enderror" name="publisher_name" value="Corporate Ask" placeholder="Enter Publisher Name" autocomplete="publisher_name" autofocus>
                                    </div>
                                    @error('publisher_name')
                                    <span class="invalid-feedback" role="alert">
                                     <label style="color: red">{{ $message }}</label>
                                 </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>URl :<sup class="text-danger">*</sup></label>
                                        <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" placeholder="Enter url" autocomplete="url" autofocus>
                                    </div>
                                    @error('url')
                                    <span class="invalid-feedback" role="alert">
                                     <strong style="color: red">{{ $message }}</strong>
                                 </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="country">Country Name :<sup class="text-danger">*</sup></label>
                                        <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="Bangladesh" placeholder="Enter Country Name" autocomplete="country" autofocus>
                                    </div>
                                    @error('country')
                                    <span class="invalid-feedback" role="alert">
                                     <label style="color: red">{{ $message }}</label>
                                 </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Language :<sup class="text-danger">*</sup></label>
                                        <input id="language" type="text" class="form-control @error('language') is-invalid @enderror" name="language" value="{{ old('language') }}" placeholder="Enter Language" autocomplete="language" autofocus>
                                    </div>
                                    @error('language')
                                    <span class="invalid-feedback" role="alert">
                                         <strong style="color: red">{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="main_image">Book Image:<sup class="text-danger">*</sup></label>
                                        <input id="main_image" type="file" class="form-control @error('main_image') is-invalid @enderror" name="main_image">
                                    </div>
                                    @error('main_image')
                                    <span class="invalid-feedback" role="alert">
                                     <label style="color: red">{{ $message }}</label>
                                 </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Publication Status :<sup class="text-danger">*</sup></label><br/>
                                    <input type="radio" name="status" id="male" value="0" class="with-gap">
                                    <label for="male">Publish</label>

                                    <input type="radio" name="status" value="1" id="female" class="with-gap">
                                    <label for="female" class="m-l-20">Un-Publish</label>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                         <strong style="color: red">{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="old_price">Old Price :<sup class="text-danger">*</sup></label>
                                        <input id="old_price" type="number" min="1" class="form-control @error('old_price') is-invalid @enderror" name="old_price" value="{{ old('old_price') }}" placeholder="Enter Old Price" autocomplete="old_price" autofocus>
                                    </div>
                                    @error('old_price')
                                    <span class="invalid-feedback" role="alert">
                                         <label style="color: red">{{ $message }}</label>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Discount Price :<sup class="text-danger">*</sup></label>
                                        <input id="discount_price" type="number" min="1" class="form-control @error('discount_price') is-invalid @enderror" name="discount_price" value="{{ old('discount_price') }}" placeholder="Enter Dicount Price" autocomplete="discount_price" autofocus>
                                    </div>
                                    @error('discount_price')
                                    <span class="invalid-feedback" role="alert">
                                     <strong style="color: red">{{ $message }}</strong>
                                 </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                      
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="submit" name="btn" class="btn btn-info" value="Submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
