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
                        <a href="{{ route('admin-blogs.create') }}" class="btn btn-primary">Add New Blog</a>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable text-center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center" style="width: 50%">Blog Name</th>
                                <th class="text-center">Blog Image</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $i=>$blog)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $blog->blog_name }}</td>
                                        <td>
                                            <img src="{{ asset('blog/images/'.$blog->blog_image) }}" style="height: 50px; width: 50px">
                                        </td>
                                        <td>
                                            @if($blog->status == '0')
                                                <span class="label bg-green">Published</span>
                                            @else
                                                <span class="label bg-red">Un-Published</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('admin-blogs.destroy', $blog->id) }}" method="post">
                                                <a href="{{ route('admin-blogs.edit', $blog->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a> |
                                                <a href="{{ route('admin-blogs.show', $blog->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a> |
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete !!');"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
