<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\orders;
use App\Models\CvService;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "New Order List";
        $orders = orders::all()->where('status','=','Processing')->where('invoice_number','!=','NULL')->where('type','=','');
        return view('admin.service-orders.index', compact('page_name','orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Complete Order List";
        $orders = orders::all()->where('type','!=','Manual Payment');
        $download = DB::table('orders')
            ->join('service_provides','service_provides.order_id','=','orders.id')
            ->get();
        foreach ($download as $service){
            $download_id = $service->id;
        }
//        return $download;
        return view('admin.service-orders.complete', compact('page_name','orders'));
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

        if ($order_list->invoice_number == 0){
           return view('admin.service-orders.show', compact('order_list','page_name'));
        }else{
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
            return view('admin.service-orders.show', compact('page_name','order_list','experience','service_name','service_price','cv_services','total_price','cv_service_item'));


        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
            'process_status' => 'required'
        ]);

        $update_process = orders::find($id);
        $update_process->process_status = $request->process_status;
        $update_process->notify         = 1;

        $update_process->save();
        return back()->with('message','Update Successful');
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
