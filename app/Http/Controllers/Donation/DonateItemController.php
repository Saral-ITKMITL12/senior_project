<?php

namespace App\Http\Controllers\Donation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DonateItem;
use App\DonateTran;
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
       $user_id = Auth::id();
       $donate_item = DonateItem::find($id);
       $user = DonateTran::where('donate_item_id', $id)->where('user_id', $user_id)->first();
         return view('donate_item.show',compact('donate_item',$donate_item))->with('user', $user);

     }

     public function manage()
     {
         $id = Auth::id();
         $donate_item = DonateItem::where('user_id', $id)->get();
         return view('donate_item.manage',compact('donate_item',$donate_item));

     }

     public function history()
     {
         $id = Auth::id();
         $donate_tran = DonateTran::where('user_id', $id)->get();
         $tran = array();
         if($donate_tran->count() == 0){
           // code...
         }
         foreach ($donate_tran as $key => $donate) {
           $tran[] = $donate->donate_item_id;
         }
         $tran_final = array_unique($tran);
         $donate_item = collect(new DonateItem);
         foreach ($tran_final as $value) {
           $do_item = DonateItem::find($value);
           $donate_item->push($do_item);
         }
         return view('donate_item.history',compact('donate_item',$donate_item));
     }

     public function search(Request $request)
     {

            if($request->has('search')){
              if ($request->has('category')) {
                $donate_item = DonateItem::where('title', 'LIKE', '%'.$request->search.'%')
                                               ->where('category', 'LIKE', '%'.$request->category.'%')
                                               ->orWhere('description', 'LIKE', '%'.$request->search.'%')
                                               ->get();
              }else{
                $donate_item = DonateItem::where('title', 'LIKE', '%'.$request->search.'%')
                                               ->orWhere('description', 'LIKE', '%'.$request->search.'%')
                                               ->get();
                                             }
            }else{
                $donate_item = DonateItem::all();
            }
            return view('donate_item.index',compact('donate_item'));
     }

     public function category($id)
     {

                $donate_item = DonateItem::where('category', 'LIKE', '%'.$id.'%')
                                               ->get();
            return view('donate_item.index',compact('donate_item'));
     }

     public function request_list($id)
     {
       $donate_tran = DonateTran::where('donate_item_id', $id)->get();
       $tran = array();
       if($donate_tran->count() == 0){
         // code...
       }
       foreach ($donate_tran as $key => $donate) {
         $tran[] = $donate->user_id;
       }
       $tran_final = array_unique($tran);
       $user = collect(new User);
       foreach ($tran_final as $value) {
         $user_index = User::find($value);
         $user->push($user_index);
       }
       $donate_item = DonateItem::find($id);
         return view('donate_item.request',compact('donate_item',$donate_item))->with('user', $user)->with('donate_tran', $donate_tran);
     }

     public function accept_request(Request $request)
     {
       $item = DonateItem::find($request->donate_item_id);
       $item->recipient = $request->user_id;
       $item->status = 'closed';

       $item->update();
       return back();
     }

}
