<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\productMeta;
use Illuminate\Http\Request;

class ProductmetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $page_name = "Update Data";
        $product_meta = product::find($id);

        return view('admin.product-meta.index', compact('page_name','product_meta'));
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
        $this->validate($request,[
            'value' => 'required',
        ]);

        $meta = new productMeta();
        $meta->sku_id        = $request->sku_id;
        $meta->sku_type      = $request->sku_type;
        $meta->type          = $request->type;
        $meta->key           = $request->key;
        $meta->value         = $request->value;

        $meta->save();
        return back()->with('message', 'MetaData Added Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_name = "Add Product Meta Data";
        $product = product::find($id);

        return view('admin.product-meta.create', compact('page_name','product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = "Add Product Meta Data";
        $product = product::find($id);

        return view('admin.product-meta.edit', compact('page_name','product'));
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
