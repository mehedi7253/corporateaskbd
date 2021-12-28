<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\CvService;
use App\Models\service;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class testServiceController extends Controller
{
    // public function show($name)
    // {
    //     // $service = service::find($name);
    //     $cvservices = CvService::all();
      
    //     // $url = $service->url;
    //     $services = DB::select(DB::raw("SELECT * FROM services WHERE url = '$name'"));
      
    //     return view('pages.services.show', compact('services', 'cvservices'));
    // }
 
}
