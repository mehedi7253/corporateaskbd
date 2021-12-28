<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\CvCart;
use App\Models\CvService;
use App\Models\packege;
use App\Models\service;
use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $packages = packege::all();
       return view('pages.services.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.services.orders');
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
    public function show($url)
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
        $page_name = "Your Order List";
        $cv_services = CvService::all();
        $services = service::all();
        $cv = DB::table('cv_carts')
            ->join('services','services.id','=','cv_carts.service_id')
            ->where('cv_carts.id','=',$id)
            ->get();

        foreach ($cv as $i){
            $invoice_number = $i->invoice_number;
            $experience     = $i->experience;
            $service_price  = $i->discount_price;
            $service_name   = $i->service_name;
        }

        $cart_item = DB::table('cv_carts')
            ->join('services','services.id','=','cv_carts.service_id')
            ->join('cv_services','cv_services.id','=','cv_carts.cv_service_id')
            ->where('cv_carts.invoice_number','=', $invoice_number)
            ->get();

        $total_price = 0;
        foreach ($cart_item as $cart_data) {
            $total_price += $cart_data->price;
        }

        return view('pages.services.orders', compact('cart_item','page_name','cv','experience','service_price', 'total_price','service_name','cv_services','services','invoice_number'));

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
            'cv_service_id'
        ]);
        $invoice = rand(100,1000000);
        if ($request->cv_service_id == ''){
            $cv_cart                 = new CvCart();
            $cv_cart->service_id     = $id;
            $cv_cart->experience     = $request->experience;
            $cv_cart->update_year    = $request->update_year;
            $cv_cart->invoice_number = $invoice;
            $cv_cart->save();
        }else{
            foreach ($request->cv_service_id as $i => $service) {
                $cv_cart = new CvCart();
                $cv_cart->service_id     = $id;
                $cv_cart->experience     = $request->experience;
                $cv_cart->update_year    = $request->update_year;
                $cv_cart->cv_service_id  = $request->cv_service_id[$i];
                $cv_cart->invoice_number = $invoice;
                $cv_cart->save();
            }
        }
        $cart_id = $cv_cart->id;
        return redirect()->route('services-packages.edit',[$cart_id])->with('message','New Service Added Successful');

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
