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
                        <a href="{{ route('teams.create') }}" class="btn btn-primary">Add New Member</a>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Name</td>
                                    <td>Designation</td>
                                    <td>Status</td>
                                    <td>Image</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($members as $i=>$member)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td class="text-capitalize">{{ $member->first_name }} {{ $member->last_name }}</td>
                                        <td>{{ $member->designation }}</td>
                                        <td>
                                            @if($member->status == '0')
                                                <label class="label bg-green">Active</label>
                                            @else
                                                <label class="label bg-red">In-Active</label>
                                            @endif
                                        </td>
                                        <td>
                                            <img src="{{ asset('team/images/'.$member->image) }}" style="height: 50px; width: 50px" class="img-thumbnail">
                                        </td>
                                        <td>
                                            <form action="{{ route('teams.destroy', $member->id) }}" method="post">
                                                <a href="{{ route('teams.edit', $member->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a> |
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