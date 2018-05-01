<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\User;
use App\Report;
use Mail;
use App\AuctionProduct;
use App\DonateItem;

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

    public function register_manage()
    {
      $user = User::all();
        return view('admin.register-manage',compact('user',$user));
    }

    public function manage_user()
    {
      $user = User::all();
        return view('admin.register-manage',compact('user',$user));
    }

    public function user_ban(Request $request)
    {

        $user = User::find($request->id);
        $user->status = '3';
        $user->update();
        $request->session()->flash('message', 'Ban user successfully!');
        return back();
    }

    public function manage_auction()
    {
      $auction = AuctionProduct::all();
        return view('admin.auction-manage',compact('auction',$auction));
    }

    public function auction_ban(Request $request)
    {

        $auction = AuctionProduct::find($request->id);
        $auction->status = 'ban';
        $auction->update();
        $request->session()->flash('message', 'Ban Product Successfully!');
        return back();
    }

    public function manage_donate()
    {
      $donate = DonateItem::all();
        return view('admin.donate-manage',compact('donate',$donate));
    }

    public function donate_ban(Request $request)
    {

        $donate = DonateItem::find($request->id);
        $donate->status = 'ban';
        $donate->update();
        $request->session()->flash('message', 'Ban Product Successfully!');
        return back();
    }

    public function report_manage()
    {
          $report = Report::all();

          return view('admin.report',compact('report'));
    }


    public function report_update(Request $request)
    {
        $report = Report::find($request->id);
        $report->status = 'Seen';
        $report->update();
        $request->session()->flash('message', 'Successfully modified the task!');
        return back();
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
        $user->accept_status = 2;
        $user->update();
        return redirect()->back()->with('message', 'Denied');

    }




}
