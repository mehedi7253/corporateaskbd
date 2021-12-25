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
                    <div class="row clearfix">
                        <div class="col-md-12 col-sm-12">
                            <img src="{{ asset('blog/images/'.$blog->blog_image) }}" style="height: 300px; width: 100%">
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <h3>{{ $blog->blog_name }}</h3>
                            <p class="text-justify">@php echo $blog->description @endphp</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection