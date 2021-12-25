@extends('user.layouts.app')
@section('content')
    <ol class="breadcrumb" style="background-color: aliceblue; font-size: 15px; border-radius: 15px">
        <li class="breadcrumb-item">
            <a href="{{ route('user.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">{{$page_name}}</li>
    </ol>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>{{$page_name}}</h2>
                </div>
                <div class="body">
                    <form action="{{ route('user.profile.update', $user_data->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                        @method('PUT')
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="first_name">First Name :<sup class="text-danger">*</sup></label>
                                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $user_data->first_name }}" placeholder="Enter First Name" autocomplete="first_name" autofocus>
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
                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user_data->last_name }}" autocomplete="last_name" autofocus>
                                    </div>
                                    @error('last_name')
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
                                        <label for="email">Email :<sup class="text-danger">*</sup></label>
                                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user_data->email }}" disabled title="Email Address Not Changeable" autocomplete="email" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="phone">Phone Number :<sup class="text-danger">*</sup></label>
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user_data->phone }}" autocomplete="phone" autofocus>
                                    </div>
                                    @error('phone')
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
                                        <label for="birth_date">Date Of Birth :<sup class="text-danger">*</sup></label>
                                        <input type="date" name="birth_date" value="{{ $user_data->birth_date }}" class="form-control">
{{--                                        <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ $user_data->birth_date }}" >--}}
                                    </div>
                                    @error('birth_date')
                                    <span class="invalid-feedback" role="alert">
                                         <label style="color: red">{{ $message }}</label>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="organization">Organization :<sup class="text-danger">*</sup></label>
                                        <input id="organization" type="text" class="form-control @error('organization') is-invalid @enderror" name="organization" value="{{ $user_data->organization }}" autocomplete="organization" autofocus>
                                    </div>
                                    @error('organization')
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
                                        <label for="designation">Designation :<sup class="text-danger">*</sup></label>
                                        <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ $user_data->designation }}"  autocomplete="designation" autofocus>
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
                                    <label>Gender :<sup class="text-danger">*</sup></label><br/>
                                    @if($user_data->gender == 'Male')
                                        <input type="radio" name="gender" checked id="male" value="Male" class="with-gap">
                                        <label for="male">Male</label>

                                        <input type="radio" name="gender" value="Fe-Male" id="female" class="with-gap">
                                        <label for="female" class="m-l-20">Fe-Male</label>
                                    @else
                                        <input type="radio" name="gender"  id="male" value="Male" class="with-gap">
                                        <label for="male">Male</label>

                                        <input type="radio" name="gender" checked value="Fe-Male" id="female" class="with-gap">
                                        <label for="female" class="m-l-20">Fe-Male</label>
                                    @endif
                                </div>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                     <strong style="color: red">{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="designation">Address :<sup class="text-danger">*</sup></label>
                                        <textarea name="address" cols="30" rows="5" class="form-control no-resize">{{ $user_data->address }}</textarea>
                                    </div>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                         <label style="color: red">{{ $message }}</label>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Profile Picture :<sup class="text-danger">*</sup></label><br/>
                                        <img src="{{ asset('user/images/'.$user_data->image) }}" style="height: 80px; width: 120px"><br/>
                                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autofocus>
                                    </div>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                         <strong style="color: red">{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                     <strong style="color: red">{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="submit" name="update" class="btn btn-info btn-block" value="Update">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
