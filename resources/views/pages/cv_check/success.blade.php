@extends('pages.layouts.app')
@section('content')

    <div class="col-md-10 mx-auto mt-5 mb-5">
        <h2 class="text-center text-success">Congratulations! Your Transaction is Successful. </h2>
        <br>
        <div class="card">
            <div class="card-header">
                <h3 colspan="2">Upload Your Cv/Resume Here </h3>
            </div>
            <div class="card-body">
                <div class="col-md-5 col-sm-12 float-left">
                    <h5 class="font-weight-bold text-danger">Upload Your Resume / Profile Link<h5>
                    <hr/>

                    @php
                        $service = DB::select(DB::raw("SELECT orders.invoice_number, cvcheckcarts.invoice_number, cvcheckcarts.service_id FROM orders INNER JOIN cvcheckcarts ON orders.invoice_number = cvcheckcarts.invoice_number AND orders.invoice_number = '$invoice'"));
                    @endphp 
                    
                    @foreach ($service as $services)
                        @if($services->service_id == '10')
                            <form action="{{ route('file-upload.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="font-weight-normal">Upload FIle</label><br/>
                                    <input type="number" hidden name="order_id" value="{{ $orderID }}">
                                    <input type="text" hidden name="invoice_number" value="{{ $invoice }}">
                                    <input type="file" name="file_name" class="form-control" required accept="doc,docs,pdf,txt,docx">
                                </div>
                                <div>
                                    <input type="submit" name="btn" class="btn btn-success" value="Submit">
                                </div>
                            </form>
                        @else
                            <form action="{{ route('file-upload.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="font-weight-normal text-danger">Past Your profile Link here <sup class="font-weight-bold text-danger">*</sup></label><br/>
                                    <input hidden type="number" name="order_id" value="{{ $orderID }}">
                                    <input hidden type="text" name="invoice_number" value="{{ $invoice }}">
                                    <input type="text" name="link_url" class="form-control" required placeholder="Enter Your Profile Link">
                                </div>
                                <div>
                                    <input type="submit" name="btn" class="btn btn-success" value="Submit">
                                </div>
                            </form>
                        @endif
                    @endforeach
                   
                </div>
                <div class="col-md-7 col-sm-12 float-left border-left">
                    <h5>Payment Details</h5>
                    <hr/>
                    <div class="table-responsive" id="mainFrame">
                        <table border="1" class="table tabble-border table-striped">
                            <tbody>
                                <tr>
                                    <td>Transaction ID</td>
                                    <td>{{ $tran_id }}</td>
                                </tr>
                                <tr>
                                    <td>Transaction Time</td>
                                    <td>{{$tran_date}}</td>
                                </tr>
                                <tr>
                                    <td>Payment Method</td>
                                    <td>{{$card_issuer}}</td>
                                </tr>
                                <tr>
                                    <td>Bank Transaction ID</td>
                                    <td>{{$bank_tran_id}}</td>
                                </tr>
                                <tr>
                                    <td>Amount</td>
                                    <td>{{$amount}} {{$currency}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
         
        </div>
    </div>
@endsection

