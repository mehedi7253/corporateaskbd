@extends('pages.layouts.app')
@section('content')

<section class="recomandation">
    <div class="container">
        <div class="col-md-12 col-sm-12 mb-5 mt-3">
            <div class="card">
                <h4 class="p-3" style="border-bottom: 1px solid silver; width: 40%">{{ $page_name }}</h4>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead style="background-color: #666666; color: white;">
                                <tr class="text-center">
                                    <th>Serial</th>
                                    <th>Product Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart_item as $i=>$items)
                                <tr class="text-center">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $items->bookName }}</td>
                                    <td>
                                        <img src="{{ asset('book/images/'.$items->bookImage) }}" style="height: 50px; width: 100%">
                                    </td>
                                    <td>{{ $sub_total = number_format($items->discount_price,2) }}</td>
                                    <td style="width: 30%">
                                        <form action="{{ route('carts.update', $items->cartID) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group input-group">
                                                <input type="number" min="1" id="quantity" name="quantity" class="form-control" value="{{ $items->quantity }}">
                                                <button type="submit" name="update" class="btn btn-danger"><i class="fa fa-arrow-circle-up"></i></button>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                      {{ number_format($items->quantity * $items->discount_price,2) }}
                                    </td>
                                    <td class="font-weight-bold">
                                        <form action="{{ route('carts.destroy', $items->cartID) }}" method="post">
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

                    <div class="col-md-8 col-sm-12 float-left mt-5">
                      
                        {{-- <div class="mt-4">
                            <h4> Coupon</h4>
                            <p class="text-muted"> Enter your coupon code if you have one.</p>
                            <form action="" method="post">
                                <div class="form-group input-group">
                                    <input type="text" class="col-6 form-control" placeholder="Enter Coupon Code">
                                    <input type="button" class="btn btn-primary ml-4" value="Apply Now">
                                </div>
                            </form>
                        </div> --}}
                    </div>
                    <div class="col-md-4 col-sm-12 float-left mt-5">
                       
                       <div class="form-group">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th class="text-right border-0">Sub Total : </th>
                                        <td class="text-right border-0">
                                            @foreach ($subtotal as $sub_total)
                                                 {{ number_format($sub_total->PaybleAmount,2) }} T.k
                                            @endforeach 
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-right border-0">Discount : </th>
                                        <td  class="text-right border-0">
                                          0.00 T.K
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-right border-0">Courier Charge : </th>
                                        <td  class="text-right border-0">
                                          60.00 T.K
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-right">Total : </th>
                                        <td  class="text-right">

                                            @foreach ($subtotal as $sub_total)
                                                @if($sub_total->PaybleAmount == '0')
                                                   0.00 T.k
                                                @else
                                                {{ number_format($sub_total->PaybleAmount + 60,2) }} T.k 
                                                @endif
                                            @endforeach 
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-right border-0"></th>
                                        <form action="{{ route('carts.store') }}" method="POST">
                                            @csrf
                                            @foreach ($cart_item as $cart)
                                                <input name="book_id[]" value="{{ $cart->bookID }}" hidden>
                                                <input name="quantity[]" value="{{ $cart->quantity }}" hidden>
                                            @endforeach
                                            <td  class="text-right border-0">
                                                <input type="submit" name="btn" class="btn btn-success" value="Place Order">
                                            </td>
                                        </form>
                                    </tr>
                                </table>
                            </div>



                           {{-- <label>Sub Total : 
                               <span class="ml-5">
                                    @foreach ($subtotal as $sub_total)
                                      {{ number_format($sub_total->PaybleAmount,2) }}
                                    @endforeach 
                                       
                                </span>
                            </label>
                              <br/>
                           <label>Discount : <span class="ml-5 text-right"> 0.00 </span> T.k</label><br/>
                           <label style="margin-left: -4%; font-size: 15px;">Courier Fee : <span class="ml-5"> 60.00 </span>  T.K</label><br/>
                         
                           <hr style="border-bottom: 1px solid silver; width: 100%"/>
                           <label> Total : 60.00<span class="ml-5"> </span>T.K</label> --}}
                       </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
    
@endsection
