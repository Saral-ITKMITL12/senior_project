<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\User;
use Mail;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.admin-index');
    }

    public function registermanage()
    {
      $user = User::all();
        return view('admin.register-manage',compact('user',$user));
    }

    public function AcceptUser(Request $request)
    {
        $user = User::find($request->id);
        $user->accept_status = 1;
        $user->update();
        return redirect()->back()->with('message', 'Accepted');

    }

    public function DenyUser(Request $request)
    {
        $user = User::find($request->id);
        $myEmail = $user->email;
        Mail::to($myEmail)->send(new DenyUser());
        $user->accept_status = 3;
        $user->update();
        return redirect()->back()->with('message', 'Denied');

    }

}
