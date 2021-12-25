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
                    <form action="{{ route('admin-blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="blog_name">Blog Name :<sup class="text-danger">*</sup></label>
                                        <input id="blog_name" type="text" class="form-control @error('blog_name') is-invalid @enderror" name="blog_name" value="{{ $blog->blog_name }}" placeholder="Enter Blog Name" autocomplete="blog_name" autofocus>
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
                                    <label>Publication Status :<sup class="text-danger">*</sup></label><br/>
                                    @if($blog->status == '0')
                                        <input type="radio" name="status" checked id="male" value="0" class="with-gap">
                                        <label for="male">Publish</label>

                                        <input type="radio" name="status" value="1" id="female" class="with-gap">
                                        <label for="female" class="m-l-20">Un-Publish</label>
                                    @else
                                        <input type="radio" name="status"  id="male" value="0" class="with-gap">
                                        <label for="male">Publish</label>

                                        <input type="radio" name="status" checked value="1" id="female" class="with-gap">
                                        <label for="female" class="m-l-20">Un-Publish</label>
                                    @endif
                                </div>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                     <strong style="color: red">{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Blog Image :<sup class="text-danger">*</sup></label><br/>
                                    <img src="{{ asset('blog/images/'.$blog->blog_image) }}" style="height: 120px; width: 120px"><br/>
                                    <input id="blog_image" type="file" class="form-control @error('blog_image') is-invalid @enderror" name="blog_image" value="{{ old('blog_image') }}">
                                </div>
                                @error('blog_image')
                                <span class="invalid-feedback" role="alert">
                                     <label style="color: red">{{ $message }}</label>
                                 </span>
                                @enderror
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="description">Blog Description :<sup class="text-danger">*</sup></label>
                                        <textarea id="ckeditor" name="description">{{ $blog->description }}</textarea>
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