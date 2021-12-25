<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\CvCart;
use App\Models\cvcheck;
use App\Models\cvcheckcart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CvcheckControoler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice = rand(100,1000000);

        $cvcheck = new cvcheckcart();
        $cvcheck->service_id     = $request->service_id;
        $cvcheck->price          = $request->price;
        $cvcheck->invoice_number = $invoice;
        $cvcheck->status         = '1';

        $cvcheck->save();
        $order_id = $cvcheck->id;
        return redirect()->route('cvchecks.show',[$order_id])->with('message','Complete Your Payment Now');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cvcheck = cvcheckcart::find($id);
        $service = DB::table('cvcheckcarts')
                ->join('services', 'services.id', '=', 'cvcheckcarts.service_id')
                ->select('services.service_name as serviceName', 'services.discount_price as servicePrice')
                ->where('cvcheckcarts.id','=', $id)
                ->get();
        return view('pages.cv_check.order', compact('cvcheck', 'service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
