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
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-md-4 col-sm-12 float-left">
                            <img src="{{ asset('user/images/'.$user->image) }}" style="height: 300px; width: 100%">
                        </div>
                        <div class="col-md-8 col-sm-12 float-left">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th> Name  </th>
                                        <td class="font-weight-bold"> {{ $user->first_name }} {{ $user->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th> Email  </th>
                                        <td class="font-weight-bold"> {{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th> Phone  </th>
                                        <td class="font-weight-bold"> {{ $user->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th> Gender  </th>
                                        <td class="font-weight-bold"> {{ $user->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th> Address  </th>
                                        <td class="font-weight-bold"> {{ $user->address }}</td>
                                    </tr>
                                    <tr>
                                        <th> Birth Date  </th>
                                        <td class="font-weight-bold"> {{ date('d-M-Y', strtotime($user->birth_date))  }}</td>
                                    </tr>
                                    <tr>
                                        <th> Organization  </th>
                                        <td class="font-weight-bold"> {{ $user->organization }}</td>
                                    </tr>
                                    <tr>
                                        <th> Designation  </th>
                                        <td class="font-weight-bold"> {{ $user->designation }}</td>
                                    </tr>
                                    <tr>
                                        <th> Join Date  </th>
                                        <td class="font-weight-bold"> {{ date('d-M-Y', strtotime($user->created_at ))}}</td>
                                    </tr>
                                    <tr>
                                        <th> Status  </th>
                                        <td class="font-weight-bold">
                                            @if($user->status == '0')
                                                <span class="label bg-teal">Active</span>
                                            @else
                                                <span class="label bg-red">In-Active</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Change Status  </th>
                                        <td class="font-weight-bold">
                                            <form action="{{ route('admin.users.status', $user->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group input-group">
                                                   <select name="status">
                                                       <option value="0">Active</option>
                                                       <option value="1">In-Active</option>
                                                   </select>
                                                    <input type="submit" style="margin-left: 10px">
                                                </div>
                                            </form>
                                        </td>
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
