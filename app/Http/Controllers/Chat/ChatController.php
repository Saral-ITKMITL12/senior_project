<?php

namespace App\Http\Controllers\Chat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Pusher\Pusher;
use App\AuctionProduct;
use App\Chat;
class ChatController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index($id)
  {

    $message = Chat::where('auction_product_id', $id)->get();

    $data['message'] = $message;
    $data['auction_product_id'] = $id;

    return view('chat.show', $data);

  }

  public function storeMessage(Request $request, $id)
  {
    $message = new Chat();
    $message->auction_product_id = $id;
    $message->message = $request['message'];
    $message->user_id = Auth::user()->id;
    $message->user_name = Auth::user()->fname;

    // $message->save();

    $options = array(
      'cluster' => 'ap1',
      'encrypted' => true
    );
      $pusher = new Pusher(
      'ab9b06c5d191fb9d5156',
      '1f0c847fc183d67ac57a',
      '514241',
      $options
    );

    $data['user_name'] =Auth::user()->fname;
    $data['auction_product_id'] = $id;
    $data['message'] = $request['message'];
    $pusher->trigger('eauction', 'message', $data);
    // event(new App\Events\HelloPusherEvent($request['message']));
    return \Response::json(view('chat.message', $data)->render());

  }



}
