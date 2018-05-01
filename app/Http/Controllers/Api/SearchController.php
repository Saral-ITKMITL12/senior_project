<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AuctionProduct;
class SearchController extends Controller
{
  public function search(Request $request)
  {

         if($request->has('search')){
             $auc_product = AuctionProduct::where('title', 'LIKE', '%'.$request->search.'%')
                                            ->orWhere('description', 'LIKE', '%'.$request->search.'%')
                                            ->get();
         }else{
             $auc_product = AuctionProduct::all();
         }
         return view('search',compact('auc_product'));
 }
}
