<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\packege;
use App\Models\productPackage;
use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagePackageController extends Controller
{
    public function index()
    {
       $packages = packege::all()->where('status','=','0');
       return view('pages.services.index', compact('packages'));
    }
    public function show($name)
    {
        $package = DB::select(DB::raw("SELECT * FROM packeges WHERE slug = '$name'"));
        return view('pages.services.show', compact('package'));
    }
}
