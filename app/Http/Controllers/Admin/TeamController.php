<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "All Team Members";
        $members = team::all();
        return view('admin.team.index', compact('page_name','members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Add New Member";
        return view('admin.team.create', compact('page_name'));
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
          'first_name'   => 'required',
          'last_name'    => 'required',
          'designation'  => 'required',
          'image'        => 'required | mimes:jpg,png,jpeg|max:7048',
          'status'       => 'required',
        ],[
            'first_name.required'   => 'Please Enter First Name',
            'last_name.required'    => 'Please Enter Last Name',
            'designation.required'  => 'Please Enter Designation',
            'image.required'        => 'Please Select Image',
            'image.mimes'           => 'Please Select jpg,png,jpeg Type',
            'image.max'             => 'Please Select Image Less Then 8 Mb',
            'status.required'       => 'Please Status',
        ]);

        $team = new team();
        $team->first_name  = $request->first_name;
        $team->last_name   = $request->last_name;
        $team->designation = $request->designation;
        $team->status      = $request->status;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('team/images/', $fileName);
            $team->image = $fileName;
        } else {
            return $request;
            $team->image = '';
        }

        $team->save();
        return back()->with('message','New Member Added Successful');
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
        $page_name = "Update Member Data";
        $member = team::find($id);
        return view('admin.team.edit', compact('page_name','member'));
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
            'first_name'   => 'required',
            'last_name'    => 'required',
            'designation'  => 'required',
            'status'       => 'required',
        ],[
            'first_name.required'   => 'Please Enter First Name',
            'last_name.required'    => 'Please Enter Last Name',
            'designation.required'  => 'Please Enter Designation',
            'image.mimes'           => 'Please Select Jpg,png,jpeg Type',
            'image.max'             => 'Please Select Image Less Then 8 Mb',
            'status.required'       => 'Please Status',
        ]);

        $team = team::find($id);
        $team->first_name  = $request->first_name;
        $team->last_name   = $request->last_name;
        $team->designation = $request->designation;
        $team->status      = $request->status;

        if($request->image == ''){
            // $office->update($request->all());
            // $office->save();
        }else{
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
                $file->move('team/images/', $fileName);
                $team->image = $fileName;
            } else {
                return $request;
                $team->image = '';
            }
        }

        $team->save();
        return back()->with('message',' Member Data Update Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = team::find($id);
        $member->delete();
        return back()->with('message',' Member Data Delete Successful');
    }
}
