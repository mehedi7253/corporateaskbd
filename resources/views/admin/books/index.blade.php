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
                        <a href="{{ route('admin-books.create') }}" class="btn btn-primary">Add New Book</a>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <th>Book Name</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Publisher</th>
                                    <th>URL</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($book as $i=>$books)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $books->book_name }}</td>
                                        <td>{{ number_format($books->discount_price,2) }}</td>
                                        <td>
                                            @if($books->status == '0')
                                                <span class="label bg-green">Published</span>
                                            @else
                                                <span class="label bg-red">Un-Published</span>
                                            @endif
                                        </td>
                                        <td>{{ $books->publisher_name }}</td>
                                        <td>{{ $books->url }}</td>
                                        <td>
                                            <img src="{{ asset('book/images/'.$books->main_image) }}" style="height: 50px; width: 50px" class="img-fluid">
                                        </td>
                                        <td>
                                            <form action="{{ route('admin-books.destroy', $books->id) }}" method="post">
                                                <a href="{{ route('admin-books.edit', $books->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a> |
                                                <a href="{{ route('admin-books.show', $books->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a> |
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