<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shop = Shop::all();
        return view('public.shop')->with('shop', $shop);
    }

    public function show($id)
    {
        $shop = Shop::find($id);
        return view('public.shop_one')->with('shop', $shop);
    }
}
