<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CvcheckOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Cv/Resume Checking Orders";
        $order = orders::all()->where('type','=','CV Checking')->where('status', '=', 'Processing');
        // return $file;

        return view('admin.cvcheck.index', compact('page_name','order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Cv/Resume Checking Orders";
        $order = orders::all()->where('type','=','CV Checking')->where('status', '=', 'Processing');
        // return $file;

        return view('admin.cvcheck.complete', compact('page_name','order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_name = "Order Details";
        $order_list = orders::find($id);
        $invoice = $order_list->invoice_number;

        $service = DB::table('orders')
                ->join('cvcheckcarts', 'cvcheckcarts.invoice_number', '=', 'orders.invoice_number')
                ->join('services','services.id', '=', 'cvcheckcarts.service_id')
                ->select('services.service_name','services.discount_price')
                ->where('orders.invoice_number','=', $invoice)
                ->get();

        // return $service;
        
        return view('admin.cvcheck.show', compact('page_name','order_list','service'));
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
        $update_status = orders::find($id);
        $update_status->process_status = '2';
        $update_status->notify = '1';

        $update_status->save();
        return back()->with('message','Order Deliverd Successful');
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
