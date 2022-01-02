<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\orders_item;
use App\Models\ordersfinal;
use Illuminate\Http\Request;

class ordersController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'product_id' => 'required'
        ]);

        $transaction_id = rand(100,10000000000);
        foreach ($request->product_id as $i => $product) 
        {
            $order = new orders_item();
            $order->user_id        = 1;
            $order->product_id     = $request->product_id [$i];
            $order->category_id    = $request->category_id [$i];
            $order->purchase_type  = $request->purchase_type;
            $order->transaction_id = $transaction_id;
            $order->affiliate_code = 'mehedi7253';
            $order->discount_code  = 'test50';

            $order->save();

            $final_order = new ordersfinal();
            $final_order->transaction_id = $transaction_id;
            $final_order->user_id        = 1;
            $final_order->experience     = $request->experience;
            $final_order->purchase_type  = $request->purchase_type;
            $final_order->meta           = 'meta data';
            $final_order->price          = '10000';
            $final_order->status         = 'Pending';

            $final_order->save();
        }

        return $order;

    }
}
