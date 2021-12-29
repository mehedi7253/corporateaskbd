<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\packege;
use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagePackageController extends Controller
{
    public function index()
    {
        $packages = packege::all()->where('status', '=', '0');
        return view('pages.services.index', compact('packages'));
    }

    public function show($name)
    {
        $package = DB::select(DB::raw("SELECT * FROM packeges WHERE slug = '$name'"));

        foreach($package as $packages)
        {
            $package_id = $packages->id;
        }
        $meta = DB::table('product_metas')->where('sku_id', '=', $package_id)->get();

        return view('pages.services.show', compact('package', 'meta'));
    }
}
