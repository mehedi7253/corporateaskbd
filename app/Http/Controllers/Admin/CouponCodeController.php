<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CopunCode;
use Illuminate\Http\Request;

class CouponCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Coupon Code List";
        $coupons = CopunCode::all();
        return view('admin.coupons.index', compact('coupons','page_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Add New Coupon Code";
        return view('admin.coupons.create', compact('page_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'coupon_code' => 'required',
            'discount'    => 'required',
            'status'      => 'required'
        ]);
        $coupon = new CopunCode();
        $coupon->coupon_code  = $request->coupon_code;
        $coupon->discount     = $request->discount;
        $coupon->status       = $request->status;

        $coupon->save();
        return back()->with('message','New Coupon Code Create Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = "Update Coupon Data";
        $coupon = CopunCode::find($id);
        return view('admin.coupons.edit', compact('page_name','coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'discount'    => 'required',
            'status'      => 'required'
        ]);
        $coupon = CopunCode::find($id);
        $coupon->discount     = $request->discount;
        $coupon->status       = $request->status;

        $coupon->save();
        return back()->with('message','Coupon Code Update Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = CopunCode::find($id);
        $coupon->delete();
        return back()->with('message','Delete Successful');
    }
}
