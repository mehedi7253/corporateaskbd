@extends('pages.layouts.app')
@section('content')

<section class="recomandation">
    <div class="container">
        <div class="col-md-12 col-sm-12 mb-5 mt-3">
            <div class="card">
                <h4 class="p-3" style="border-bottom: 1px solid silver; width: 49%">{{ $page_name }}</h4>
                
                <form action="{{ route('pay.book') }}" method="POST" class="needs-validation" id="form_calc">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                    <div class="card-body">
                        <div class="col-md-6 col-sm-12 float-left">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" value="{{ Auth::user()->first_name. ' ' .Auth::user()->last_name  }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <label style="color: red">{{ $message }}</label>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" value="{{ Auth::user()->email }}" disabled title="Email Address Cannot Changeable">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <label style="color: red">{{ $message }}</label>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Phone Number" value="{{ Auth::user()->phone }}">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <label style="color: red">{{ $message }}</label>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label>Shiping Address</label>
                                <textarea  name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Shipiing address"></textarea>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <label style="color: red">{{ $message }}</label>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12 float-left">
                            <div class="table-responsive mt-4">
                                <table class="table table-bordered">
                                    <thead> 
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Item</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    @foreach ($orders as $i=>$orders)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $orders->bookName }} x {{ $orders->quantity }}</td>
                                            <td class="text-right">  {{ number_format($orders->quantity * $orders->discount_price,2) }} T.K</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="border-0"></td>
                                        <td class="text-right border-0">Sub Total :</td>
                                        <td class="border-0 text-right">
                                            @foreach ($subtotal as $sub_total)
                                                {{ number_format($sub_total->PaybleAmount,2) }} T.k
                                            @endforeach 
                                        </td>
                                    </tr>
                                    <tr>
                                            <td class="border-0"></td>
                                            <td class="text-right border-0">Discount :</td>
                                            <td class="border-0 text-right"> 0.00 T.K </td>
                                        </tr>
                                        <tr>
                                            <td class="border-0"></td>
                                            <td class="text-right border-0">Courier Charge :</td>
                                            <td class="border-0 text-right">  60.00 T.K </td>
                                        </tr>
                                        <tr style="border-top: 1px solid silver">
                                            <td class="border-0"></td>
                                            <td class="text-right border-0">Total:</td>
                                            <td class="border-0 text-right"> 
                                                @foreach ($subtotal as $sub_total)
                                                    {{ number_format($sub_total->PaybleAmount + 60,2) }} T.k 
                                                    <input name="amount" value="{{ $sub_total->PaybleAmount + 60 }}" hidden>
                                                @endforeach 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-0"></td>
                                            <td class="border-0"></td>
                                            <td class="border-0">   
                                                {{-- <input name="type" value="Book" hidden> --}}
                                                <input name="invoice_number" value="{{ $invoice }}" hidden>
                                                <input name="btn" class="btn btn-primary btn-lg btn-block" type="submit" value="Pay Now">
                                            </td>
                                        </tr>
                                </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
    
@endsection
