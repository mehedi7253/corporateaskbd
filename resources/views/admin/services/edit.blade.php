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
                        <a href="{{ route('services.index') }}" class="btn btn-primary">Manage Services</a>
                    </ul>
                </div>
                <div class="body">
                    <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label for="service_name">Service Name :<sup class="text-danger">*</sup></label>
                                        <input id="service_name" type="text" class="form-control @error('service_name') is-invalid @enderror" name="service_name" value="{{ $service->service_name }}" placeholder="Enter Service Name" autocomplete="service_name" autofocus>
                                    </div>
                                    @error('service_name')
                                    <span class="invalid-feedback" role="alert">
                                         <label style="color: red">{{ $message }}</label>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Service Price :<sup class="text-danger">*</sup></label>
                                        <input id="start_price" type="number" min="1" class="form-control @error('start_price') is-invalid @enderror" name="start_price" value="{{  $service->start_price }}" placeholder="Enter Service Price" autocomplete="start_price" autofocus>
                                    </div>
                                    @error('start_price')
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
                                        <label> Discount Percent:<sup class="text-danger">*</sup></label>
                                        <input id="discount_price" type="number" min="0" class="form-control @error('discount_price') is-invalid @enderror" name="discount_price" value="{{  $service->discount_price }}" placeholder="Enter Discount Price" autocomplete="discount_price" autofocus>
                                    </div>
                                    @error('discount_price')
                                    <span class="invalid-feedback" role="alert">
                                         <strong style="color: red">{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Publication Status :<sup class="text-danger">*</sup></label><br/>
                                    @if($service->status == '0')
                                        <input type="radio" name="status" checked id="male" value="0" class="with-gap">
                                        <label for="male">Publish</label>

                                        <input type="radio" name="status" value="1" id="female" class="with-gap">
                                        <label for="female" class="m-l-20">Un-Publish</label>
                                    @else
                                        <input type="radio" name="status"  id="male" value="0" class="with-gap">
                                        <label for="male">Publish</label>

                                        <input type="radio" name="status" checked value="1" id="female" class="with-gap">
                                        <label for="female" class="m-l-20">Un-Publish</label>
                                    @endif
                                </div>
                                @error('status')
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
                                        <label>Service Image :<sup class="text-danger">*</sup></label><br/>
                                        <img src="{{ asset('services/images/'.$service->service_image) }}" style="height: 120px; width: 120px"><br/>
                                        <input id="service_image" type="file" class="form-control @error('service_image') is-invalid @enderror" name="service_image" value="{{ old('service_image') }}" placeholder="Enter Discount Price" autocomplete="discount" autofocus>
                                    </div>
                                    @error('service_image')
                                    <span class="invalid-feedback" role="alert">
                                         <strong style="color: red">{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Url:<sup class="text-danger">*</sup></label>
                                        <input id="url" disabled type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ $service->url }}" placeholder="Enter Url" autocomplete="url" autofocus>
                                    </div>
                                    @error('url')
                                    <span class="invalid-feedback" role="alert">
                                         <strong style="color: red">{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Features :<sup class="text-danger">*</sup></label>
                                        <textarea class="form-control" name="features" id="application2">{{ $service->features }}</textarea>
                                    </div>
                                    @error('features')
                                    <span class="invalid-feedback" role="alert">
                                         <strong style="color: red">{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Working Process :<sup class="text-danger">*</sup></label>
                                    <textarea class="form-control" name="benefits" id="application">{{ $service->benefits }}</textarea>
                                </div>
                                @error('benefits')
                                <span class="invalid-feedback" role="alert">
                                     <strong style="color: red">{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Service Description :<sup class="text-danger">*</sup></label>
                                        <textarea id="ckeditor" name="description">{{  $service->description }}</textarea>
                                    </div>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                         <strong style="color: red">{{ $message }}</strong>
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
@section('script')
<script>
    CKEDITOR.replace('application',
        {
            height:300,
            resize_enabled:true,
            wordcount: {
                showParagraphs: false,
                showWordCount: true,
                showCharCount: true,
                countSpacesAsChars: true,
                countHTML: false,

                maxCharCount: 20}
        });
</script>
<script>
    CKEDITOR.replace('application2',
        {
            height:300,
            resize_enabled:true,
            wordcount: {
                showParagraphs: false,
                showWordCount: true,
                showCharCount: true,
                countSpacesAsChars: true,
                countHTML: false,

                maxCharCount: 20}
        });
</script>
@endsection