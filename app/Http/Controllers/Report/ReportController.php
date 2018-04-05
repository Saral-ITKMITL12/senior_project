<?php

namespace App\Http\Controllers\Report;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Report;
use Auth;
class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }


    public function index()
    {
      $id = Auth::id();
      $report = Report::where('user_id', $id)->get();
      return view('report.index',compact('report'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Report $report)
    {
      $request->validate([
          'title' => 'required|max:100',
          'description' => 'required|max:200',
      ]);
      $images=array();
       if($files=$request->file('images')){
           foreach($files as $file){
               $fileName = $file->getClientOriginalName();
               $destination_path = 'public/image/AuctionProductImage/'.$count;
               \Storage::putFileAs($destination_path, $file, $fileName);
               $images[] = $fileName;
           }
       }
      $id = Auth::id();
      $report->title = $request->title;
      $report->description = $request->description;
      $report->user_id = $id;
      // $auc_product->images = json_encode($images);
      $report->save();
              return redirect('/report');

      //$lib->save();

      //return redirect('lib');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, report $report)
    {
      $report->delete();
      $request->session()->flash('message', 'Successfully deleted the task!');
      return redirect('report');
    }
}
