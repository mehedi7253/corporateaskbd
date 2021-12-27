<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\packege;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Manage package";
        $packages  = packege::all();
        return view('admin.package.index', compact('page_name','packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Add New package";
        return view('admin.package.create', compact('page_name'));
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
            'slug'               => 'required',
            'name'               => 'required',
            'price'              => 'required',
            'default_discount'   => 'required',
            'status'             => 'required',
            'thumbnail'          => 'required | mimes:jpg,png,jpeg|max:7048'
        ],[
            'slug.required'             => 'Please Enter Package Slug',
            'name.required'             => 'Please Enter Package Name',
            'price.required'            => 'Please Enter Price',
            'default_discount.required' => 'Please Enter Discount Price',
            'thumbnail.required'        => 'Please Enter Image',
            'thumbnail.mimes'           => 'Please Select Jpg,png,jpeg Type',
            'thumbnail.max'             => 'Please Select Image Less Then 8 Mb',
        ]);

        $packages = new packege();
        $packages->slug             = $request->slug;
        $packages->name             = $request->name;
        $packages->price            = $request->price;
        $packages->default_discount = $request->default_discount;
        $packages->status           = $request->status;

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('package/images/', $fileName);
            $packages->thumbnail = $fileName;
        } else {
            return $request;
            $packages->thumbnail = '';
        }

        $packages->save();
        return back()->with('message','Package Added Successful');
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
        $page_name = "Update Package Data";
        $package   = packege::find($id);
        return view('admin.package.edit',compact('page_name','package'));
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
            'name'               => 'required',
            'price'              => 'required',
            'default_discount'   => 'required',
            'status'             => 'required',
            'thumbnail'          => 'mimes:jpg,png,jpeg|max:7048'
        ],[
            'name.required'             => 'Please Enter Package Name',
            'price.required'            => 'Please Enter Price',
            'default_discount.required' => 'Please Enter Discount Price',
            'thumbnail.mimes'           => 'Please Select Jpg,png,jpeg Type',
            'thumbnail.max'             => 'Please Select Image Less Then 8 Mb',
        ]);

        $packages = packege::find($id);
        $packages->name             = $request->name;
        $packages->price            = $request->price;
        $packages->default_discount = $request->default_discount;
        $packages->status           = $request->status;

        if($request->thumbnail == ''){
            // $office->update($request->all());
            // $office->save();
        }else{
            if ($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
                $file->move('package/images/', $fileName);
                $packages->thumbnail = $fileName;
            } else {
                return $request;
                $packages->thumbnail = '';
            }
        }

        $packages->save();
        return redirect()->route('packages.index')->with('message','Package Update Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pacakge   = packege::find($id);
        $pacakge->delete();
        return back()->with('message','Package Delete Successful');
    }
}
