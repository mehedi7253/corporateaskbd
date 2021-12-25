<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\PublicMessage;
use Illuminate\Http\Request;

class ContactCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.contact.index');
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
        $this->validate($request,[
            'name'   => 'required',
            'email'  => 'required',
            'phone'  => 'required |min:11|max:11',
            'message'=> 'required'
        ],[
            'name.required'    => 'Please Enter Your Full Name',
            'email.required'   => 'Please Enter Email Address',
            'phone.required'   => 'Please Enter Phone Number',
            'phone.min'        => ' Phone Number Must Be 11 Digit',
            'phone.max'        => ' Phone Number Must Be 11 Digit',
            'message.required' => 'Please Enter Your Full Name',
        ]);
        $contact = new PublicMessage();
        $contact->name    = $request->name;
        $contact->email   = $request->email;
        $contact->phone   = $request->phone;
        $contact->message = $request->message;

        $contact->save();
        return back()->with('message','Message Sent Successful');
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
