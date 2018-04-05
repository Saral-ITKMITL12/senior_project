<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Report;
use Auth;

class ManageReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
          $report = Report::all();

          return view('admin.report',compact('report'));
    }


    public function update(Request $request)
    {
        $report = Report::find($request->id);
        $report->status = 'Seen';
        $report->update();
        $request->session()->flash('message', 'Successfully modified the task!');
        return back();
    }
