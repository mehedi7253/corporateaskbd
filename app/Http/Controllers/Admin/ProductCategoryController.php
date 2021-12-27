<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\productCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Manage Category";
        $categories = productCategory::all();

        return view('admin.product-category.index', compact('page_name','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Add New Category";
        return view('admin.product-category.create', compact('page_name'));
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
            'name' => 'required',
        ],[
            'name.required' => 'Please Enter Category Name'
        ]);

        $category = new productCategory();
        $category->name = $request->name;

        $category->save();
        return back()->with('message','New Category Added Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $page_name = "Update Category Details";
        $category = productCategory::find($id);
        return view('admin.product-category.edit', compact('page_name', 'category'));
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
            'name' => 'required',
        ],[
            'name.required' => 'Please Enter Category Name'
        ]);

        $category = productCategory::find($id);
        $category->name = $request->name;

        $category->save();
        return redirect()->route('product-category.index')->with('message','New Category Update Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = productCategory::find($id);
        $categorie->delete();
        return back()->with('message','Category Delete Successful');
    }
}
