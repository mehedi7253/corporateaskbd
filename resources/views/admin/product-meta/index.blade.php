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
                    <h2>  {{ $product->name }}  {{$page_name}}</h2> 
                </div>
                <div class="body">
                   <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Type</th>
                                    <th>Key</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($metatags as $i=>$metatag)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $metatag->type }}</td>
                                        <td>{{ $metatag->key }}</td>
                                        <td>
                                            <form action="{{route('metatag-edit.destroy', $metatag->id)}}" method="post">
                                                <a class="btn btn-info" href="{{ route('metatag-edit.edit', $metatag->id) }}"><i class="fa fa-edit"></i></a> |
                                                <a class="btn btn-info" href="{{ route('metatag-edit.edit', $metatag->id) }}"><i class="fa fa-eye"></i></a> |
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
@section('script')
   
@endsection
