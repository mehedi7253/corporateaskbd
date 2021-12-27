<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\packege;
use App\Models\product;
use App\Models\productPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductPackageController extends Controller
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_name = "Add Product";
        $package   = packege::find($id);
        $products = product::all();
        $product_package = DB::table('product_packages')
                    ->join('products','products.id', '=', 'product_packages.product_id')
                    ->select('products.name as ProductName', 'product_packages.id as producPackaID')
                    ->where('product_packages.package_id', '=', $id)
                    ->get();

        return view('admin.product-package.index', compact('page_name','package','product_package','products'));
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
            'is_required' => 'required'
        ]);

        foreach ($request->product_id as $i => $products) 
        {
            $product_package = new productPackage();
            $product_package->package_id  = $id;
            $product_package->product_id  = $request->product_id [$i];
            $product_package->is_required = $request->is_required;

            $product_package->save();

            // return $product_package;
        }

        return back()->with('message','New Product Added Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = productPackage::find($id);
        $product->delete();
        return back()->with('message', 'Delete Successfull');
    }
}
