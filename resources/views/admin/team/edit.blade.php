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
                        <a href="{{ route('teams.index') }}" class="btn btn-primary">manage Members</a>
                    </ul>
                </div>
                <div class="body">
                    <form action="{{ route('teams.update',$member->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="first_name">First Name :<sup class="text-danger">*</sup></label>
                                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $member->first_name }}" placeholder="Enter First Name" autocomplete="first_name" autofocus>
                                    </div>
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                         <label style="color: red">{{ $message }}</label>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="last_name">Last Name :<sup class="text-danger">*</sup></label>
                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{$member->last_name }}" placeholder="Enter Last Name" autocomplete="last_name" autofocus>
                                    </div>
                                    @error('last_name')
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
                                        <label for="designation">Designation :<sup class="text-danger">*</sup></label>
                                        <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ $member->designation }}" placeholder="Enter Designation" autocomplete="designation" autofocus>
                                    </div>
                                    @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                         <label style="color: red">{{ $message }}</label>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Status :<sup class="text-danger">*</sup></label><br/>
                                    @if($member->status == '0')
                                        <input type="radio" name="status" checked id="male" value="0" class="with-gap">
                                        <label for="male">Active</label>

                                        <input type="radio" name="status" value="1" id="female" class="with-gap">
                                        <label for="female" class="m-l-20">In-Active</label>
                                    @else
                                        <input type="radio" name="status"  id="male" value="0" class="with-gap">
                                        <label for="male">Active</label>

                                        <input type="radio" name="status" checked value="1" id="female" class="with-gap">
                                        <label for="female" class="m-l-20">In-Active</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                              <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="image">Image :<sup class="text-danger">*</sup></label><br/>
                                        <img src="{{ asset('team/images/'.$member->image) }}" style="height: 120px; width: 120px"><br/>
                                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" autofocus>
                                    </div>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                         <label style="color: red">{{ $message }}</label>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    <div class="row clearfix">
                            <div class="col-md-3">
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