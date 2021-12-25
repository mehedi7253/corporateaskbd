<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\cvcheckcart;
use App\Models\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CvcheckserviceController extends Controller
{
    public function index()
    {
        $services = service::all()->where('status','=','0')->where('type','=','cvcheck service');
        return view('pages.cv_check.index', compact('services'));
    }
    public function cvheckShow($cvcheck)
    {      
        $cvcheck = DB::table('services')->where('url', '=', $cvcheck)->get();
    
        return view('pages.cv_check.show', compact('cvcheck'));
    }

   
}
