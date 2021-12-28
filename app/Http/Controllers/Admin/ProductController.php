<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\productCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Manage All Product";
        $prodcuts = product::all();

        return view('admin.product.index', compact('page_name', 'prodcuts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Add New Product";
        $categories = productCategory::all();

        return view('admin.product.create', compact('page_name', 'categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id'      => 'required',
            'name'             => 'required',
            'price'            => 'required',
            'default_discount' => 'required',
            'status'           => 'required'
        ],[
            'category_id.required'      => 'Please Enter Category Name',
            'name.required'             => 'Plese Enter Prodcut Name',
            'price.required'            => 'Please Enter Product Price',
            'default_discount.required' => 'Please Enter Discount Price',
            'status.required'           => 'Please Select Status',
        ]);

        $product = new product();
        $product->category_id      = $request->category_id;
        $product->name             = $request->name;
        $product->price            = $request->price;
        $product->default_discount = $request->default_discount;
        $product->status           = $request->status;

        $product->save();
        return back()->with('message','New Product Added Succesful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_name = "product Details";
        $product = product::find($id);

        // return $product->productMeta;
        

        return view('admin.product.show', compact('page_name','product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = "Update Product Details";
        $product = product::find($id);
        $categories = productCategory::all();
        return view('admin.product.edit', compact('page_name', 'product','categories'));
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
        $this->validate($request, [
            'category_id'      => 'required',
            'name'             => 'required',
            'price'            => 'required',
            'default_discount' => 'required',
            'status'           => 'required'
        ],[
            'category_id.required'      => 'Please Enter Category Name',
            'name.required'             => 'Plese Enter Prodcut Name',
            'price.required'            => 'Please Enter Product Price',
            'default_discount.required' => 'Please Enter Discount Price',
            'status.required'           => 'Please Select Status',
        ]);

        $product = product::find($id);
        $product->category_id      = $request->category_id;
        $product->name             = $request->name;
        $product->price            = $request->price;
        $product->default_discount = $request->default_discount;
        $product->status           = $request->status;

        $product->save();
        return redirect()->route('products.index')->with('message','Product Data Update Succesful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::find($id);
        $product->delete();
        return back()->with('message','Product Delete Succesful');
    }
}
