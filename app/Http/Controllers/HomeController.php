<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\AuctionProduct;
use App\DonateItem;
class HomeController extends Controller
{
    public function index()
    {
      if (Auth::check()){
        $auction = AuctionProduct::orderBy('id', 'desc')->take(4)->get();
        $donate = DonateItem::orderBy('id', 'desc')->take(4)->get();
        return view('home',compact('auction',$auction))->with('donate', $donate);
      }
        else{return view('/auth.login');}
    }
}
