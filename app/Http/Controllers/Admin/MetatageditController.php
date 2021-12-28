<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\productMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MetatageditController extends Controller
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
        $page_name = "Meta Tag list";
        $product   = product::find($id);

        $metatags = DB::table('product_metas')
                ->where('product_id', '=', $id)
                ->get();
        return view('admin.product-meta.index', compact('page_name','product', 'metatags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = "Update Meta tag Data";
        $metatag = productMeta::find($id);
        return view('admin.product-meta.edit', compact('page_name', 'metatag'));
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
        $metatag = productMeta::find($id);
        $metatag->value = $request->value;
        $metatag->save();
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
        $metatag = productMeta::find($id);
        $metatag->delete();
        return back()->with('message','Delete Successful');
    }
}
