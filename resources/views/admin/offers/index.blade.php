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
                        <a href="{{ route('admin-offers.create') }}" class="btn btn-primary">Add New Offer</a>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Package</th>
                                    <th>Discount</th>
                                    <th>Regular</th>
                                    <th>Discount</th>
                                    <th>Status</th>  
                                    <th>Image</th>
                                    <th>url</th>       
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($offers as $i=>$offer)
                                   <tr>
                                       <td>{{ ++$i }}</td>
                                       <td>{{ $offer->services->service_name }}</td>
                                       <td>{{ $offer->discount }} %</td>
                                       <td>{{ number_format($offer->services->start_price, 2) }}</td>
                                       <td>
                                           @php
                                              $percent = $offer->services->start_price * $offer->discount /100;
                                              $discount = $offer->services->start_price - $percent;
                                              echo number_format($discount,2);
                                            @endphp
                                        </td>
                                       <td>
                                           @if ($offer->status == '0')
                                                 <span class="label bg-green">Published</span>
                                               @elseif ($offer->status == '1')
                                                 <span class="label bg-red">Published</span>
                                           @endif
                                       </td>
                                       <td>
                                           <img src="{{ asset('offer/images/'.$offer->image) }}" style="height: 30px; width: 40px;" class="img-fluid">
                                       </td>
                                       <td>
                                           {{ $offer->url }}
                                       </td>
                                       <td>
                                        <form action="{{route('admin-offers.destroy', $offer->id)}}" method="post">
                                            <a class="btn btn-info" href="{{ route('admin-offers.edit', $offer->id) }}"><i class="fa fa-edit"></i></a> |
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
@section('script')
   
@endsection
