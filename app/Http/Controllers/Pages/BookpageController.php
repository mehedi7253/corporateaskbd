<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\BookCart;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookpageController extends Controller
{
    public function index()
    {
        $books = Books::paginate(10);
        return view('pages.books.index',compact('books'));
    }
   
    public function book_details($books_url)
    {
        if(Auth::check())
        {
            $cart_count = DB::table('book_carts')
            ->where('user_id','=',Auth::user()->id)
            ->count();
        }else{
            $cart_count = 0;
        }
       
        $books = DB::select(DB::raw("SELECT * FROM books WHERE url = '$books_url'"));
        return view('pages.books.show', compact('books','cart_count'));
    }
    public function AddtoCart(Request $request)
    {
        if(Auth::check()){
            $cart_product = DB::table('book_carts')
                ->where('user_id','=',Auth::user()->id)
                ->where('book_id','=',$request->book_id)
                ->get();
            
            if(count($cart_product) > 0){
                return back()->with('error','This Product Allready added on Your Cart');
            }else{
                
                $this->validate($request, [
                    'quantity' => 'required'
                ],[
                    'quantity.required' => 'Please Enter Number of Quantity'
                ]);
    
                $cart = new BookCart();
                $cart->book_id   = $request->book_id;
                $cart->quantity  = $request->quantity;
                $cart->user_id   = Auth::user()->id;
    
                $cart->save();
                return back()->with('message','Book Added In To Cart');
            }

        }else{
            return back()->with('error','You are not Logeedin..! Login First');
        }
    }


  
        
}
