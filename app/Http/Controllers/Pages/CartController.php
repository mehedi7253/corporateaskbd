<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\book_orders;
use App\Models\BookCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Cart Item";
        $cart_item = DB::table('book_carts')
                ->join('books','books.id','=','book_carts.book_id')
                ->select('books.id as bookID','books.book_name as bookName','books.main_image as bookImage', 'books.discount_price', 'book_carts.quantity', 'book_carts.id as cartID')
                ->where('book_carts.user_id','=',Auth::user()->id)
                ->get();

        $user_id = Auth::user()->id;
        $subtotal = DB::select(DB::raw("SELECT books.discount_price, book_carts.quantity, books.id, book_carts.book_id, SUM(books.discount_price * book_carts.quantity) AS PaybleAmount FROM books, book_carts WHERE book_carts.book_id = books.id AND book_carts.user_id = '$user_id'"));

        // return $subtotal;
        return view('pages.cart.index', compact('cart_item','page_name', 'subtotal'));
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
            'book_id' => 'required',
            'quantity' => 'required'
        ]);

        $invoice = rand(100,1000000);
        $user_id = Auth::user()->id;

        foreach($request->book_id as $key=>$insert)
        {
            $saverecord = [
                'user_id'        => $user_id,
                'book_id'        => $request->book_id[$key],
                'quantity'       => $request->quantity[$key],
                'invoice_number' => $invoice,
            ];
          $data = DB::table('book_orders')->insert($saverecord);
        }
        $productId = DB::getPdo()->lastInsertId();
        return redirect()->route('carts.show',[$productId])->with('message','Order Placed Successful');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_name = "Add Shiping Address and Make Payment";

        $orderid = book_orders::find($id);
        $invoice = $orderid->invoice_number;
        $orders = DB::table('book_orders')
            ->join('books','books.id','=','book_orders.book_id')
            ->select('books.id as bookID','books.book_name as bookName','books.main_image as bookImage', 'books.discount_price', 'book_orders.quantity', 'book_orders.id as orderID')
            ->where('book_orders.invoice_number','=', $invoice)
            ->get();
        
        $subtotal = DB::select(DB::raw("SELECT books.discount_price, book_orders.quantity, books.id, book_orders.book_id, SUM(books.discount_price * book_orders.quantity) AS PaybleAmount FROM books, book_orders WHERE book_orders.book_id = books.id AND book_orders.invoice_number = '$invoice'"));

        // return $subtotal;
        return view('pages.cart.order', compact('page_name','orders','subtotal','invoice'));
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
        $cart = BookCart::find($id);
        $cart->quantity = $request->quantity;
        $cart->save();
        return back()->with('message','Item Update Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = BookCart::find($id);
        $cart->delete();
        return back()->with('message','Item Remove Successful');
    }
}
