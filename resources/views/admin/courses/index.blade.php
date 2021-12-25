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
                        <a href="{{ route('categories.index') }}" class="btn btn-primary"><i class="fa fa-backward" style="color: white"></i></a>
                    </ul>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-md-6" >
                            <form action="{{ route('courses.update', $category->id) }}" method="POSt">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <div class="form-inline">
                                        <label>Enter Course Link <sup class="text-danger">*</sup></label>
                                        <input id="video_link" type="text" class="form-control @error('video_link') is-invalid @enderror" name="video_link" value="{{ old('video_link') }}" placeholder="Enter Course Link" autocomplete="video_link" autofocus>
                                    </div>
                                    @error('video_link')
                                    <span class="invalid-feedback" role="alert">
                                         <label style="color: red">{{ $message }}</label>
                                     </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="btn" class="btn btn-info" value="Submit">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6" style="border-left: 1px solid blue">
                            <h4>Course Link</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Link</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($courses as $i=>$course)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                <a target="_blank" href="{{ $course->video_link }}"> {{ $course->video_link }}</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('courses.destroy', $course->id) }}" method="post">
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
        </div>
    </div>
@endsection
