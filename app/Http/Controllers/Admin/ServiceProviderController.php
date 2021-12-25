<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\orders;
use App\Models\ServiceProvide;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $page_name = "Customer Service Download";
        $orders    = ServiceProvide::find($id);
//        return $orders;
        return view('admin.service-provides.show', compact('page_name','orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = "Upload File And Provide Link";
        $orders = orders::find($id);
        return view('admin.service-provides.index',compact('page_name','orders'));
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
            'pdf_version' => 'mimes:pdf|max:7048',
            'doc_version' => 'mimes:doc,docx|max:7048'
        ],[
            'pdf_version.mimes'   => 'Please Select pdf Version Only',
            'pdf_version.max'     => 'Please Select pdf Less Then 8 Mb',
            'doc_version.mimes'   => 'Please Select doc, docx Version Only',
            'doc_version.max'     => 'Please Select docx Less Then 8 Mb'
        ]);

        $service = new ServiceProvide();
        $service->order_id          = $id;
        $service->bd_jobs_link      = $request->bd_jobs_link;
        $service->linkdin_jobs_link = $request->linkdin_jobs_link;
        $service->portfolio_link    = $request->portfolio_link;

        if($request->pdf_version == ''){
            // $office->update($request->all());
            // $office->save();
        }else{
            if ($request->hasFile('pdf_version')) {
                $file = $request->file('pdf_version');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
                $file->move('File/service/', $fileName);
                $service->pdf_version = $fileName;
            } else {
                return $request;
                $service->pdf_version = '';
            }
        }


        if($request->doc_version == ''){
            // $office->update($request->all());
            // $office->save();
        }else{
            if ($request->hasFile('doc_version')) {
                $file = $request->file('doc_version');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
                $file->move('File/service/', $fileName);
                $service->doc_version = $fileName;
            } else {
                return $request;
                $service->doc_version = '';
            }
        }


        // $cbatch = Batch::create(['model'=>course::class,'model_id'=>$course->id]);

        $update = orders::find($id);
        $update->process_status = '5';
        $update->save();
        $service->save();
        return redirect()->route('order-services.create')->with('message','Upload Successful');

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
