<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $new_work = DB::table('orders')->where('notify','=','0')->where('status','=','Processing')->where('invoice_number','!=','0')->count();
        $members = User::all()->where('role_id','=','2')->count();
        $today = @date('Y-m-d');
        $today_earn = DB::table('orders')
            ->where('created_at','=',$today)
            ->where('status','=','Processing')
            ->sum('amount');

        $month = date('m');
        $monthly_earn = DB::table('orders')
            ->whereMonth('created_at', '=', $month)
            ->where('status','=','Processing')
            ->sum('amount');

        $orders = orders::select("id","created_at" , DB::raw("(sum(amount)) as Total"), DB::raw("(DATE_FORMAT(created_at, '%d')) as day"))
                ->orderBy('created_at')
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%d')"))
                ->whereMonth('created_at', '=', $month)
                ->where('status','=','Processing')
                ->get();

        return view('admin.index', compact('new_work','members', 'today_earn','orders','monthly_earn'));
    }

    public function userLists()
    {
        $page_name = "All user List";
        $users = User::all()->where('role_id','=','2');
        return view('admin.users.index',compact('page_name','users'));
    }

    public function userProfile($id){
        $page_name = "User Profile";
        $user = User::find($id);
        return view('admin.users.show',compact('page_name','user'));
    }

    public function status(Request $request, $id)
    {
        $status = User::find($id);
        $status->status = $request->status;
        $status->save();
        return back()->with('message','Update Successful');
    }
    public function destroy($id)
    {
        $status = User::find($id);
        $status->delete();
        return back()->with('message','Delete Successful');
    }

}
