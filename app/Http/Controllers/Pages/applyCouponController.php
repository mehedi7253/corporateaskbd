<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\CopunCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class applyCouponController extends Controller
{
    public function apply(Request $request){
        $search = $request->get('search');
        $data = DB::table('copun_codes')
            ->where('coupon_code', '=', $search)
            ->where('status','=','0')
            ->get();
        if (count($data)>0){
            foreach ($data as $d){
                $coupin = $d->coupon_code;
                $discount = $d->discount;
            }
            $value = Session::put('copun_codes', $discount, $data);
            return back()->with(session()->get($value));

//            return back()->with('message','Coupon Added Successful', compact('coupin', 'discount', 'data'));
//            return back()->withErrors($discount);
        }else {
            return back()->with('error','Invalid Coupon Code');
//            return back()->withErrors($error);
        }
    }
}
