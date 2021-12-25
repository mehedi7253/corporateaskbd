<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\orders;
use App\Models\CvService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServiceorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "My Service Order List";
        $order = orders::all()->where('email','=', Auth::user()->email);
//        return $order;
        return view('user.service-orders.index', compact('page_name','order'));
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
        $page_name = 'My Order Details';
        $order_list = orders::find($id);
        $cv_services = CvService::all();
        $cv = DB::table('orders')
            ->join('cv_carts','cv_carts.invoice_number','=','orders.invoice_number')
            ->select('cv_carts.service_id as service','cv_carts.cv_service_id as cv_service','cv_carts.experience', 'orders.invoice_number')
            ->where('orders.id','=', $id)
            ->get();

        foreach ($cv as $cvs){
            $service_id = $cvs->service;
            $cv_service_id = $cvs->cv_service;
            $experience     = $cvs->experience;
            $invoice_number = $cvs->invoice_number;
        }

        $cv_item = DB::table('cv_carts')
            ->join('services','services.id','=', 'cv_carts.service_id')
            ->join('orders','orders.invoice_number','=','cv_carts.invoice_number')
            ->where('cv_carts.invoice_number', '=', $invoice_number)
            ->get();
        foreach ($cv_item as $service){
            $service_name = $service->service_name;
            $service_price = $service->discount_price;
        }

        $cv_service_item = DB::table('cv_carts')
            ->join('cv_services','cv_services.id','=', 'cv_carts.cv_service_id')
            ->join('orders','orders.invoice_number','=','cv_carts.invoice_number')
            ->select('cv_services.name as CvServiceName', 'cv_services.price')
            ->where('cv_carts.invoice_number', '=', $invoice_number)
            ->get();
        $total_price = 0;
        foreach ($cv_service_item as $service){
            $total_price += $service->price;
        }
        return view('user.service-orders.show', compact('page_name','order_list','experience','service_name','service_price','cv_services','total_price','cv_service_item'));
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
