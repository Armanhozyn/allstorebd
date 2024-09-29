<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlashSaleController extends Controller
{
    public function index()
    {
        $flashSaleDate = FlashSale::first();
        $flashSaleItems = FlashSaleItem::where('status', 1)->orderBy('id', 'ASC')->pluck('product_id')->toArray();
        if(Auth::check() && Auth::user()->role == 'company'){
            return view('frontend.b2b.pages.flash-sale', compact('flashSaleDate', 'flashSaleItems'));
        }else{
            return view('frontend.b2c.pages.flash-sale', compact('flashSaleDate', 'flashSaleItems'));
        }
    }
}
