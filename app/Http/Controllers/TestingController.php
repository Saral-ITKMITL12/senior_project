<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\DenyUser;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
class TestingController extends Controller
{

  public function show()
  {
      //$user =User::get(['id', 'name', 'email'])->toArray()
      return view('search');
  }


  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\User
   */
  protected function create()
  {
    $myEmail = 'pitchaya.poppop@gmail.com';
    Mail::to($myEmail)->send(new DenyUser());

  }

}
