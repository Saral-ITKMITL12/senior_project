<?php

namespace App\Http\Controllers\Donation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DonateItem;
use Auth;
use App\User;
class DonateItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $donate_item = DonateItem::all();

      return view('donate_item.index',compact('donate_item',$donate_item));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
         return view('donate_item.create');
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request, DonateItem $donate_item)
     {
         $request->validate([
           'title' => 'required|max:100',
           'description' => 'required|max:200',


       ]);

       $count = DonateItem::pluck('id')->last();
       $count = $count+1;
         $images=array();
          if($files=$request->file('images')){
              foreach($files as $file){
                  $fileName = $file->getClientOriginalName();
                  $destination_path = 'public/image/DonateItemImage/'.$count;
                  \Storage::putFileAs($destination_path, $file, $fileName);
                  $images[] = $fileName;
              }
          }
         $id = Auth::id();
         $donate_item->title = $request->title;
         $donate_item->description = $request->description;
         $donate_item->condition = $request->condition;
         $donate_item->user_id = $id;
         $donate_item->open_time = $request->open_time;
         $donate_item->close_time = $request->close_time;
         $donate_item->images = json_encode($images);
         $donate_item->save();
         $request->session()->flash('message', 'Successfully!');
           return redirect('/donate_item');
     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
       $donate_item = DonateItem::find($id);
       $user = User::find($donate_item->user_id);
       return view('donate_item.show',compact('donate_item',$donate_item))->with('user', $user);
     }

     public function manage()
     {
         $id = Auth::id();
         $donate_item = DonateItem::where('user_id', $id)->get();
         return view('donate_item.manage',compact('donate_item',$donate_item));
     }

}
