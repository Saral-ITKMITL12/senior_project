<?php

namespace App\Http\Controllers\Auction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AuctionProduct;
use App\AuctionTran;
use Auth;
class AuctionController extends Controller
{
  public function bid(Request $request, AuctionTran $tran)
  {
    $user_id = Auth::id();
    $auction_product = AuctionProduct::find($request->id);
    $price = $auction_product->price;
    $cur_price = $request->bid_price + $price;

    $auction_product->price = $cur_price;
    $tran->auction_product_id = $request->id;
    $tran->bid_price = $request->bid_price;
    $tran->user_id = $user_id;
    $tran->user_name = Auth::user()->fname;
    $auction_product->update();
    $tran->save();
    return back();
  }

  public function ajax($id)
  {
      $test = "555";
      $auction_product = AuctionTran::where('auction_product_id', '=', $id)->get();

      return response()->json($auction_product);
   }
}
