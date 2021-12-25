<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserbookorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "New Order List";
        $orders = orders::all()->where('status','=','Processing')->where('type','=','Book Payment')->where('email','=', Auth::user()->email);
        return view('user.bookorder.index', compact('page_name','orders'));
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
        $page_name = "Order Details";
        $order_list = orders::find($id);
        $invoice = $order_list->invoice_number;

        $order = DB::table('orders')
            ->join('book_orders', 'book_orders.invoice_number', '=', 'orders.invoice_number')
            ->join('books','books.id','=','book_orders.book_id')
            ->select('books.book_name as BookName', 'books.discount_price as Price', 'orders.invoice_number as InvoiceNumber', 'book_orders.quantity as Quantity')
            ->where('orders.invoice_number','=', $invoice)
            ->get();

        $subtotal = DB::select(DB::raw("SELECT books.discount_price, book_orders.quantity, books.id, book_orders.book_id, SUM(books.discount_price * book_orders.quantity) AS PaybleAmount FROM books, book_orders WHERE book_orders.book_id = books.id AND book_orders.invoice_number = '$invoice'"));

        // return $subtotal;
        return view('user.bookorder.show', compact('page_name','order_list','order','subtotal'));
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
