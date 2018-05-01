<?php

namespace App\Http\Controllers\Donation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DonateItem;
use App\DonateTran;
use Auth;
use App\Notifications\SendRequest;
use Carbon\Carbon;
class DonateController extends Controller
{
  public function request_item(Request $request, DonateTran $tran)
  {
    $user_id = Auth::id();
    $item = DonateItem::find($request->id);
    $tran->donate_item_id = $request->id;
    $tran->request = $request->description;
    $tran->user_id = $user_id;
    $tran->created_at = Carbon::now();

    $item->user->notify(new SendRequest($tran));

    $tran->save();
    return back();
  }



}
