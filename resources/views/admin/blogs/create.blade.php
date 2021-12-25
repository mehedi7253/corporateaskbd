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
                        <a href="{{ route('admin-blogs.index') }}" class="btn btn-primary">Manage Blogs</a>
                    </ul>
                </div>
                <div class="body">
                    <form action="{{ route('admin-blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="blog_name">Blog Name :<sup class="text-danger">*</sup></label>
                                        <input id="blog_name" type="text" class="form-control @error('blog_name') is-invalid @enderror" name="blog_name" value="{{ old('blog_name') }}" placeholder="Enter Blog Name" autocomplete="blog_name" autofocus>
                                    </div>
                                    @error('blog_name')
                                    <span class="invalid-feedback" role="alert">
                                         <label style="color: red">{{ $message }}</label>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="blog_image">Blog Image :<sup class="text-danger">*</sup></label>
                                        <input id="blog_image" type="file" class="form-control @error('blog_image') is-invalid @enderror" name="blog_image" value="{{ old('blog_image') }}">
                                    </div>
                                    @error('blog_image')
                                    <span class="invalid-feedback" role="alert">
                                         <label style="color: red">{{ $message }}</label>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="url">Blog URL :<sup class="text-danger">*</sup></label>
                                        <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" placeholder="Enter Blog URL" autocomplete="url" autofocus>
                                    </div>
                                    @error('url')
                                    <span class="invalid-feedback" role="alert">
                                         <label style="color: red">{{ $message }}</label>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="url">Blog Type :<sup class="text-danger">*</sup></label>
                                        <select name="type" class="form-control">
                                            <option value="bangla">Bangla</option>
                                            <option value="english">English</option>
                                        </select>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="description">Blog Description :<sup class="text-danger">*</sup></label>
                                        <textarea id="ckeditor" name="description"></textarea>
                                    </div>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                         <label style="color: red">{{ $message }}</label>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="submit" name="btn" class="btn btn-info btn-block" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection