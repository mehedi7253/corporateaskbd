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
                    <h2>{{$page_name}} </h2>
                </div>
                <div class="body">
                   <form action="{{ route('metatag-edit.update', $metatag->id) }}" method="POST">
                       @csrf
                       @method('PUT')
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="service_name">Select Type :<sup class="text-danger">*</sup></label>
                                        <select class="form-control" name="type" disabled>
                                            <option value="default">{{ $metatag->type }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Select Key :<sup class="text-danger">*</sup></label>
                                        <select class="form-control" disabled>
                                            <option value="default">{{ $metatag->key }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label> Value :<sup class="text-danger">*</sup></label>
                                        <textarea id="ckeditor" name="value">{{ $metatag->value }}</textarea>
                                    </div>
                                    @error('value')
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
                                        <input type="submit" name="service" class="btn btn-success btn-block" value="Submit">
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
@section('script')
   
@endsection
