<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\service;
use Illuminate\Http\Request;

class AdminOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "All Offer List";
        $offers = Offer::all();
        $service = $offers;
        return view('admin.offers.index', compact('page_name','offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Add New Offer";
        $service = service::all()->where('status','=','0');
        return view('admin.offers.create', compact('page_name','service'));
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
            'service_id' => 'required',
            'discount'   => 'required',
            'status'     => 'required',
            'image'      => 'required | mimes:jpg,png,jpeg|max:7048',
            'url'        => 'required'
        ],[
            'discount.required' => 'Please Enter Discount Percent',
            'status.required'   => 'Please Select Status',
            'image.required'    => 'Please Select An Image',
            'image.mimes'       => 'Please Select Jpg,png,jpeg Type',
            'image.max'         => 'Please Select Image Less Then 8 Mb',
            'url.required'      => 'Please Enter URL'
        ]);
      
        $new_offer = new Offer();
        $new_offer->service_id = $request->service_id;
        $new_offer->discount   = $request->discount;
        $new_offer->status     = $request->status;
        $new_offer->url        = $request->url;

        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $fileName = time() . '.' . $extension;
        //     $file->move('offer/images/', $fileName);
        //     $new_offer->image = $fileName;
        // } else {
        //     return $request;
        //     $new_offer->image = '';
        // }

        $imageName = time().'.'.$request->image->extension();
     
       $dd = $request->image->move(public_path('offer/images'), $imageName);
           
       $new_offer->$dd;
        $new_offer->save();
        return back()->with('message','New Offer Added Successful');
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
        $page_name = "Update Offer Data";
        $offer = Offer::find($id);
        return view('admin.offers.edit', compact('page_name', 'offer'));
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
            'discount'   => 'required',
            'status'     => 'required',
            'image'      => 'mimes:jpg,png,jpeg|max:7048',
        ],[
            'discount.required' => 'Please Enter Discount Percent',
            'status.required'   => 'Please Select Status',
            'image.mimes'       => 'Please Select Jpg,png,jpeg Type',
            'image.max'         => 'Please Select Image Less Then 8 Mb',
        ]);

        $update_offer = Offer::find($id);
        $update_offer->discount   = $request->discount;
        $update_offer->status     = $request->status;
        $update_offer->url        = $request->url;
        
        if($request->image == ''){
            
        }else{
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
                $file->move('offer/images/', $fileName);
                $update_offer->image = $fileName;
            } else {
                return $request;
                $update_offer->image = '';
            }
        }

        $update_offer->save();
        return back()->with('message','Offer Updated Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Offer::find($id);
        $delete->delete();
        return back()->with('message','Offer Deleted Successful');
    }
}
