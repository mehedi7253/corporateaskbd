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
                        <div class="col-md-8">
                            <div class="input-group">
                                    <span class="input-group-addon">
                                       <img src="{{ asset('images/pdf.JPG')}}" style="height: 38px; width: 35px">
                                    </span>
                                <div class="form-line">
                                    <input value="{{$orders->pdf_version}}"  disabled class="ml-2 form-control">
                                </div>
                                <span class="input-group-addon">
                                      <a target="_blank" href="" class="btn btn-info ml-2"><i class="fa fa-download"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-8">
                            <div class="input-group">
                                    <span class="input-group-addon">
                                       <img src="{{ asset('images/doc.JPG')}}" style="height: 38px; width: 35px">
                                    </span>
                                <div class="form-line">
                                    <input value="{{$orders->doc_version}}"  disabled class="ml-2 form-control">
                                </div>
                                <span class="input-group-addon">
                                      <a target="_blank" href="" class="btn btn-info ml-2"><i class="fa fa-download"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-8">
                            <div class="input-group">
                                    <span class="input-group-addon">
                                       <img src="{{ asset('images/linkdin.JPG')}}" style="height: 38px; width: 35px">
                                    </span>
                                <div class="form-line">
                                    <input value="{{$orders->linkdin_jobs_link}}"  disabled class="ml-2 form-control">
                                </div>
                                <span class="input-group-addon">
                                      <a target="_blank" href="{{$orders->linkdin_jobs_link}}" class="btn btn-info ml-2"><i class="fa fa-arrow-alt-circle-right"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-8">
                            <div class="input-group">
                                    <span class="input-group-addon">
                                       <img src="{{ asset('images/bdjobs.JPG')}}" style="height: 38px; width: 35px">
                                    </span>
                                <div class="form-line">
                                    <input value="{{$orders->bd_jobs_link}}"  disabled class="ml-2 form-control">
                                </div>
                                <span class="input-group-addon">
                                      <a target="_blank" href="{{$orders->bd_jobs_link}}" class="btn btn-info ml-2"><i class="fa fa-arrow-alt-circle-right"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-8">
                            <div class="input-group">
                                    <span class="input-group-addon">
                                       <img src="{{ asset('images/profile.png')}}" style="height: 38px; width: 35px">
                                    </span>
                                <div class="form-line">
                                    <input value="{{$orders->portfolio_link}}"  disabled class="ml-2 form-control">
                                </div>
                                <span class="input-group-addon">
                                      <a target="_blank" href="{{$orders->portfolio_link}}" class="btn btn-info ml-2"><i class="fa fa-arrow-alt-circle-right"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
