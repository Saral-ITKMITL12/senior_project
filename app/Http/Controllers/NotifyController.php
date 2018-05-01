<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotifyController extends Controller
{
  public function noti()
  {
    $noti = collect();
    $test = auth()->user()->unreadNotifications;
    foreach ($test as $key) {
          $noti->push(['id' =>   $key->data['user']['id'],
                      'name' => $key->data['user']['fname'],
                      'action' => $key->data['tran']['created_at']
                  ]);
    }
     return response()->json($noti);
    }
  }
  //
  // return response()->json([ 'id' =>   $test->data['user']['id'],
  //                          'name' => $test->data['user']['fname'],
  //                          'action
