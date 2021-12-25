<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $offer = Offer::all()->where('status','=','0');
        return view('pages.offers.index', compact('offer'));
    }
}
