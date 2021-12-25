<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\courses;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "All categories List";
        $categories = category::all();
        return view('admin.categories.index', compact('page_name','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Add New categories";
        return view('admin.categories.create', compact('page_name'));
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
            'name'        => 'required | unique:categories',
            'status'      => 'required',
            'image'       => 'required | mimes:jpg,png,jpeg|max:7048',
            'description' => 'required',
            'url'         => 'required | unique:categories'
        ],[
            'name.required'            => "Please Enter categories Name",
            'name.unique'              => "This Name All Ready Taken",
            'status.required'          => "Please Select Status",
            'image.required'           => 'Please Select An Image',
            'image.mimes'              => 'Please Select Jpg,png,jpeg Type',
            'image.max'                => 'Please Select Image Less Then 8 Mb',
            'description.required'     => 'Please Enter Description',
            'url.required'             => 'Please Enter URl',
            'url.unique'               => 'This Url All Ready Taken',
        ]);
        $category = new category();
        $category->name        = $request->name;
        $category->status      = $request->status;
        $category->description = $request->description;
        $category->url         = $request->url;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('categories/images/', $fileName);
            $category->image = $fileName;
        } else {
            return $request;
            $category->image = '';
        }

        $category->save();
        return back()->with('message', 'New categories Added Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_name = "Add New Course Video";
        $category = category::find($id);
        $courses = $category->courses;
//        $course_count = $courses->count();
//        return $count;
        return view('admin.courses.index', compact('page_name','category', 'courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = "Update categories Data";
        $category = category::find($id);
        return view('admin.categories.edit', compact('page_name','category'));
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
            'status'      => 'required',
            'image.mimes' => 'Please Select Jpg,png,jpeg Type',
            'image.max'   => 'Please Select Image Less Then 8 Mb',
            'url'         => 'required | unique:categories'
        ],[
            'status.required'  => "Please Select Status",
            'image.mimes'      => 'Please Select Jpg,png,jpeg Type',
            'image.max'        => 'Please Select Image Less Then 8 Mb',
            'url.required'     => 'Please Enter URl',
            'url.unique'       => 'This Url All Ready Taken',
        ]);
        $category = category::find($id);
        $category->status      = $request->status;
        $category->description = $request->description;
        $category->url         = $request->url;
        
        if($request->image == ''){
            // $office->update($request->all());
            // $office->save();
        }else{
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
                $file->move('categories/images/', $fileName);
                $category->image = $fileName;
            } else {
                return $request;
                $category->image = '';
            }
        }

        $category->save();
        return back()->with('message', 'New categories Updated Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = category::find($id);
        $categories->delete();
        return back()->with('message','categories Delete Successful');
    }
}
