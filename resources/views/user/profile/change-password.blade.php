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
                    <form method="POST" action="{{ route('user.profile.store') }}">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="password">Current Password</label>
                                        <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                                    </div>
                                    @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                         <label style="color: red">{{ $message }}</label>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="password">New Password</label>
                                        <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                                    </div>
                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                           <strong style="color: red">{{ 'Your password must be more than 7 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.' }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="password">New Confirm Password</label>
                                        <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                                    </div>
                                    @error('new_confirm_password')
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
@section('script')
    <script>
        $('#showhide').click(function () {
            var typevalue = $('#password').attr('type');
            if (typevalue == 'password'){
                $('#password').attr('type', 'text');
            }
            else
            {
                $('#password').attr('type', 'password');
            }
        });
    </script>
@endsection
