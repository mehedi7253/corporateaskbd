<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Books;
use Illuminate\Http\Request;

class AdminBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Book List";
        $book  = Books::all();
        return view('admin.books.index', compact('page_name','book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Add Book";
        return view('admin.books.create', compact('page_name'));
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
            'book_name'       => 'required',
            'writer_name'     => 'required',
            'publisher_name'  => 'required',
            'country'         => 'required',
            'language'        => 'required',
            'main_image'      => 'required | mimes:jpg,png,jpeg|max:7048',
            'old_price'       => 'required',
            'discount_price'  => 'required',
            'status'          => 'required',
            'url'             => 'required',
        ],[
            'book_name.required'         => 'Please Enter Book Name',
            'writer_name.required'       => 'Please Enter Writer Name',
            'publisher_name.required'    => 'Please Enter Publisher Name',
            'country.required'           => 'Please Enter Country',
            'language.required'          => 'Please Enter Language',
            'main_image.required'        => 'Please Enter Main Image',
            'main_image.mimes'           => 'Please Select Jpg,png,jpeg Type',
            'main_image.max'             => 'Please Select Image Less Then 8 Mb',
            'old_price.required'         => 'Please Enter Old Price',
            'discount_price.required'    => 'Please Enter New Price',
            'status.required'            => 'Please Select Status',
            'url.required'               => 'Please Enter URl'
        ]);

        $book = new Books();
        $book->book_name       = $request->book_name;
        $book->writer_name     = $request->writer_name;
        $book->publisher_name  = $request-> publisher_name;
        $book->country         = $request->country;
        $book->language        = $request->language;
        $book->old_price       = $request-> old_price;
        $book->discount_price  = $request->discount_price;
        $book->status          = $request->status;
        $book->url             = $request->url;

        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('book/images/', $fileName);
            $book->main_image = $fileName;
        } else {
            return $request;
            $book->main_image = '';
        }

        $book->save();
        return redirect()->route('admin-books.index')->with('message', 'New Book Added Successful');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_name = "View Book Details";
        $book = Books::find($id);
        return view('admin.books.show', compact('page_name','book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = "Update Book Data";
        $book = Books::find($id);
        return view('admin.books.edit', compact('page_name','book'));
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
            'writer_name'     => 'required',
            'publisher_name'  => 'required',
            'country'         => 'required',
            'language'        => 'required',
            'main_image'      => 'mimes:jpg,png,jpeg|max:7048',
            'old_price'       => 'required',
            'discount_price'  => 'required',
            'status'          => 'required',
            'url'             => 'required',
        ],[
            'writer_name.required'       => 'Please Enter Writer Name',
            'publisher_name.required'    => 'Please Enter Publisher Name',
            'country.required'           => 'Please Enter Country',
            'language.required'          => 'Please Enter Language',
            'main_image.mimes'           => 'Please Select Jpg,png,jpeg Type',
            'main_image.max'             => 'Please Select Image Less Then 8 Mb',
            'old_price.required'         => 'Please Enter Old Price',
            'discount_price.required'    => 'Please Enter New Price',
            'status.required'            => 'Please Select Status',
            'url.required'               => 'Please Enter URL',
        ]);

        $book = Books::find($id);
        $book->writer_name     = $request->writer_name;
        $book->publisher_name  = $request-> publisher_name;
        $book->country         = $request->country;
        $book->language        = $request->language;
        $book->old_price       = $request-> old_price;
        $book->discount_price  = $request->discount_price;
        $book->status          = $request->status;
        $book->url             = $request->url;


        if($request->main_image == ''){
            // $office->update($request->all());
            // $office->save();
        }else{
            if ($request->hasFile('main_image')) {
                $file = $request->file('main_image');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
                $file->move('book/images/', $fileName);
                $book->main_image = $fileName;
            } else {
                return $request;
                $book->main_image = '';
            }
        }

        $book->save();
        return redirect()->route('admin-books.index')->with('message','Book Data Update Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Books::find($id);
        $book->delete();
        return back()->with('message','Book Data Delete Successful');
    }
}
