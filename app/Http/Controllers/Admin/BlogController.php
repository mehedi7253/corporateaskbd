<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Blogs List";
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('page_name','blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Add New Blog";
        return view('admin.blogs.create', compact('page_name'));
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
            'blog_name'    => 'required',
            'blog_image'   => 'required | mimes:jpg,png,jpeg|max:7048',
            'description'  => 'required',
            'url'          => 'required',
            'type'         => 'required'
        ],[
            'blog_name.required'    => 'Please Enter Blog Name',
            'description.required'  => 'Please Enter Blog Description',
            'blog_image.required'   => 'Please Select An Image',
            'blog_image.mimes'      => 'Please Select Jpg,png,jpeg Type',
            'blog_image.max'        => 'Please Select Image Less Then 8 Mb',
            'url.required'          => 'Please Enter Blog URL',
            'type.required'         => 'Please Select One'
        ]);

        $blog = new Blog();
        $blog->blog_name   = $request->blog_name;
        $blog->description = $request->description;
        $blog->url         = $request->url;
        $blog->type        = $request->type;

        if ($request->hasFile('blog_image')) {
            $file = $request->file('blog_image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('blog/images/', $fileName);
            $blog->blog_image = $fileName;
        } else {
            return $request;
            $blog->blog_image = '';
        }

        $blog->save();
        return back()->with('message','New Blog Added Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_name = "View Blog Details";

        $blog = Blog::find($id);
        return view('admin.blogs.show',compact('page_name','blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = "View Blog";
        $blog = Blog::find($id);
        return view('admin.blogs.edit',compact('page_name','blog'));
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
            'blog_name'   => 'required',
            'blog_image'  => 'mimes:jpg,png,jpeg|max:7048',
            'description' => 'required',
            'status'      => 'required',
        ],[
            'blog_name.required'    => 'Please Enter Blog Name',
            'description.required'  => 'Please Enter Blog Description',
            'blog_image.mimes'      => 'Please Select Jpg,png,jpeg Type',
            'blog_image.max'        => 'Please Select Image Less Then 8 Mb',
        ]);

        $blog = Blog::find($id);
        $blog->blog_name   = $request->blog_name;
        $blog->description = $request->description;
        $blog->status      = $request->status;
        
        if($request->blog_image == ''){
            // $office->update($request->all());
            // $office->save();
        }else{
            if ($request->hasFile('blog_image')) {
                $file = $request->file('blog_image');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
                $file->move('blog/images/', $fileName);
                $blog->blog_image = $fileName;
            } else {
                return $request;
                $blog->blog_image = '';
            }
        }

        $blog->save();
        return redirect()->route('admin-blogs.index')->with('message','Blog Data Update Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return back()->with('message','Blog Delete Successful');
    }
}
