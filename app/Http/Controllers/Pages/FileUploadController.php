<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\cvcheckcart;
use App\Models\cvcheckorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileUploadController extends Controller
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
        $upload = new cvcheckorder();
        $upload->order_id = $request->order_id;
        $upload->link_url = $request->link_url;
        $upload->status   = '0';

        if($request->file_name == ''){
            // $office->update($request->all());
            // $office->save();
        }else{
            if ($request->hasFile('file_name')) {
                $file = $request->file('file_name');
                $extension = $file->getClientOriginalExtension();
                $fileName =  $request->order_id . '.' . $extension;
                $file->move('cvcheck/file/', $fileName);
                $upload->file_name = $fileName;
            } else {
                return $request;
                $upload->file_name = '';
            }
        }
        $upload->save();
        $last_id = $upload->id;

        $date = @date('m');
        $update_serial = DB::table('cvcheckorders')
            ->where('id', $last_id)
            ->update(['serial' => 'cv_check_21'.$date.'-'.$last_id]);

        if($update_serial == true){
            return redirect()->route('file-upload.show', [$last_id])->with('message','Your Order Placed Successful');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = cvcheckorder::find($id);
        return view('pages.cv_check.confirm', compact('orders'));
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
