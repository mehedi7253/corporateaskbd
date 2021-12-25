<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = 'All Services';
        $services = service::all();
        return view('admin.services.index', compact('page_name','services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Add New Service";
        return view('admin.services.create', compact('page_name'));
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
            'service_name'  => 'required',
            'start_price'   => 'required',
            'discount_price'=> 'required',
            'status'        => 'required',
            'service_image' => 'required | mimes:jpg,png,jpeg|max:7048',
            'description'   => 'required',
            'features'      => 'required',
            'benefits'      => 'required',
            'url'           => 'required | unique:services'
        ],[
            'service_name.required'    => 'Please Enter Service Name',
            'start_price.required'     => 'Please Enter Service Price',
            'discount_price.required'  => 'Please Enter Service Discount Price',
            'status.required'          => 'Please Select Status',
            'service_image.required'   => 'Please Select An Image',
            'service_image.mimes'      => 'Please Select Jpg,png,jpeg Type',
            'service_image.max'        => 'Please Select Image Less Then 8 Mb',
            'description.required'     => 'Please Enter Description',
            'features.required'        => 'Please Enter Features',
            'benefits.required'        => 'Please Enter Benefits',
            'url.required'             => 'Please Enter URl',
            'url.unique'               => 'This Url All Ready Taken',
        ]);

        $service = new service();
        $service->service_name     = $request->service_name;
        $service->start_price      = $request->start_price;
        $service->discount_price   = $request->discount_price;
        $service->status           = $request->status;
        $service->description      = $request->description;
        $service->features         = $request->features;
        $service->benefits         = $request->benefits;
        $service->url              = $request->url;

        if ($request->hasFile('service_image')) {
            $file = $request->file('service_image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('services/images/', $fileName);
            $service->service_image = $fileName;
        } else {
            return $request;
            $service->service_image = '';
        }

        $service->save();
        return back()->with('message','New Service Added Successful');
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
        $page_name = "Update Service Data";
        $service = service::find($id);
        return view('admin.services.edit', compact('page_name','service'));
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
            'service_name'  => 'required',
            'start_price'   => 'required',
            'discount_price'=> 'required',
            'status'        => 'required',
            'service_image' => 'mimes:jpg,png,jpeg|max:7048',
            'description'   => 'required',
            'features'      => 'required',
            'benefits'      => 'required',
        ],[
            'service_name.required'   => 'Please Enter Service Name',
            'start_price.required'    => 'Please Enter Service Price',
            'discount_price.required' => 'Please Enter Service Discount Price',
            'status.required'         => 'Please Select Status',
            'service_image.mimes'     => 'Please Select Jpg,png,jpeg Type',
            'service_image.max'       => 'Please Select Image Less Then 8 Mb',
            'description.required'    => 'Please Enter Description',
            'features.required'        => 'Please Enter Features',
            'benefits.required'        => 'Please Enter Benefits',
        ]);

        $service = service::find($id);
        $service->service_name   = $request->service_name;
        $service->start_price    = $request->start_price;
        $service->discount_price = $request->discount_price;
        $service->status         = $request->status;
        $service->description    = $request->description;
        $service->features       = $request->features;
        $service->benefits       = $request->benefits;
       

        if($request->service_image == ''){
            // $office->update($request->all());
            // $office->save();
        }else{
            if ($request->hasFile('service_image')) {
                $file = $request->file('service_image');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
                $file->move('services/images/', $fileName);
                $service->service_image = $fileName;
            } else {
                return $request;
                $service->service_image = '';
            }
        }

        $service->save();
        return redirect()->route('services.index')->with('message','Service Update Successful');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = service::find($id);
        $delete->delete();
        return redirect()->route('services.index')->with('message','Service Delete Successful');
    }
}
