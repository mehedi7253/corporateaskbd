<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\orders_item;
use App\Models\ordersfinal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinalOrdersController extends Controller
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
        $orders = orders_item::find($id);
        
        $packages = DB::table('ordersfinals')
           ->join('packeges','packeges.id','=','ordersfinals.purchase_type')
           ->select('packeges.name as PckageName', 'packeges.default_discount as PackagePrice','ordersfinals.experience as Experience')
           ->where('ordersfinals.transaction_id','=', $orders->transaction_id)
           ->get();

        foreach($packages as $package)
        {
            $package_price = $package->PackagePrice;
        }

        $products = DB::table('orders_items')
            ->join('products','products.id','=','orders_items.product_id')
            ->select('products.name as ProductName', 'products.default_discount as productPrice')
            ->where('orders_items.transaction_id','=', $orders->transaction_id)
            ->get();

            $total_price = 0;
            foreach ($products as $product_price) {
                $total_price += $product_price->productPrice;
            }

        return view('pages.services.orders', compact('orders', 'products', 'packages', 'total_price', 'package_price'));
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
