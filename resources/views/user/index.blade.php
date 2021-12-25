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
                    <ul class="header-dropdown m-r--5">
                        <a href="{{ route('user.profile.edit') }}" class="btn btn-info">Edit Profile</a>
                    </ul>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-md-4 col-sm-12 float-left">
                            <img src="{{ asset('user/images/'.Auth::user()->image) }}" style="height: 300px; width: 100%">
                        </div>
                        <div class="col-md-8 col-sm-12 float-left">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th> Name  </th>
                                        <td class="font-weight-bold"> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th> Email  </th>
                                        <td class="font-weight-bold"> {{ Auth::user()->email }}</td>
                                    </tr>
                                    <tr>
                                        <th> Phone  </th>
                                        <td class="font-weight-bold"> {{ Auth::user()->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th> Gender  </th>
                                        <td class="font-weight-bold"> {{ Auth::user()->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th> Address  </th>
                                        <td class="font-weight-bold"> {{ Auth::user()->address }}</td>
                                    </tr>
                                    <tr>
                                        <th> Birth Date  </th>
                                        <td class="font-weight-bold"> {{ date('d-M-Y', strtotime(Auth::user()->birth_date))  }}</td>
                                    </tr>
                                    <tr>
                                        <th> Organization  </th>
                                        <td class="font-weight-bold"> {{ Auth::user()->organization }}</td>
                                    </tr>
                                    <tr>
                                        <th> Designation  </th>
                                        <td class="font-weight-bold"> {{ Auth::user()->designation }}</td>
                                    </tr> <tr>
                                        <th> Join Date  </th>
                                        <td class="font-weight-bold"> {{ date('d-M-Y', strtotime(Auth::user()->created_at ))}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection