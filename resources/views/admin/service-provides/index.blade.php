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
                        <a href="{{ route('service-orders.index') }}" class="btn btn-primary"><i class="fa fa-backward" style="color: white"></i> Back</a>
                    </ul>
                </div>
                <div class="body">
                    <form action="{{ route('service-provides.update', $orders->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="form-line">
                                <label> PDF Version:<sup class="text-danger">*</sup></label>
                                <input id="pdf_version" type="file" class="form-control @error('pdf_version') is-invalid @enderror" name="pdf_version" value="{{ old('pdf_version') }}" autocomplete="pdf_version" autofocus>
                            </div>
                            @error('pdf_version')
                            <span class="invalid-feedback" role="alert">
                                 <strong style="color: red">{{ $message }}</strong>
                             </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <label> DOC Version:<sup class="text-danger">*</sup></label>
                                <input id="doc_version" type="file" class="form-control @error('doc_version') is-invalid @enderror" name="doc_version" value="{{ old('doc_version') }}" autocomplete="doc_version" autofocus>
                            </div>
                            @error('doc_version')
                            <span class="invalid-feedback" role="alert">
                                 <strong style="color: red">{{ $message }}</strong>
                             </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <label> BD Jobs Link:<sup class="text-danger">*</sup></label>
                                <input id="bd_jobs_link" type="text" class="form-control @error('bd_jobs_link') is-invalid @enderror" name="bd_jobs_link" value="{{ old('bd_jobs_link') }}" placeholder="Enter BD Jobs Link" autocomplete="bd_jobs_link" autofocus>
                            </div>
                            @error('bd_jobs_link')
                            <span class="invalid-feedback" role="alert">
                                 <strong style="color: red">{{ $message }}</strong>
                             </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <label> Linkdin Link:<sup class="text-danger">*</sup></label>
                                <input id="linkdin_jobs_link" type="text" class="form-control @error('linkdin_jobs_link') is-invalid @enderror" name="linkdin_jobs_link" value="{{ old('linkdin_jobs_link') }}" placeholder="Enter Linkdin Link" autocomplete="linkdin_jobs_link" autofocus>
                            </div>
                            @error('linkdin_jobs_link')
                            <span class="invalid-feedback" role="alert">
                                 <strong style="color: red">{{ $message }}</strong>
                             </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-line">
                                <label> Portfolio Link:<sup class="text-danger">*</sup></label>
                                <input id="portfolio_link" type="text" class="form-control @error('portfolio_link') is-invalid @enderror" name="portfolio_link" value="{{ old('portfolio_link') }}" placeholder="Enter Portfolio Link" autocomplete="portfolio_link" autofocus>
                            </div>
                            @error('portfolio_link')
                            <span class="invalid-feedback" role="alert">
                                 <strong style="color: red">{{ $message }}</strong>
                             </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-info" name="btn" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection