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
                        <a href="{{ route('categories.create') }}" class="btn btn-primary">Add New Category</a>
                    </ul>
                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Url</th>
                            <th>Action</th>
                            <th>Add Video</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $i=>$category)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if($category->status == '0')
                                        <span class="label bg-teal">Published</span>
                                    @else
                                        <span class="label bg-red">Un-Published</span>
                                    @endif
                                </td>
                                <td>
                                    <img src="{{ asset('categories/images/'.$category->image) }}" style="height: 50px; width: 50px">
                                </td>
                                <td>
                                    {{ $category->url }}
                                </td>
                                <td>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a> |
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete !!');"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('categories.show',$category->id) }}" class="btn btn-primary"><i class="fa fa-plus"></i></a> |
                                    <a href="{{ route('categories.show',$category->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i> {{ $category->courses->count() }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
