<?php

namespace App\Http\Controllers\Auction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AuctionProduct;
use Auth;
use App\User;
class AuctionProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function __construct()
   {
       $this->middleware('auth');
   }

  public function index()
  {
        $auc_product = AuctionProduct::all();

    return view('auction_product.index',compact('auc_product',$auc_product));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('auction_product.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, AuctionProduct $auc_product)
  {
      $request->validate([
        'title' => 'required|max:100',
        'description' => 'required|max:200',


    ]);

    $count = AuctionProduct::pluck('id')->last();
    $count = $count+1;
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
      $auc_product->title = $request->title;
      $auc_product->description = $request->description;
      $auc_product->price = $request->price;
      $auc_product->bid_step = $request->bid_step;
      $auc_product->user_id = $id;
      $auc_product->open_time = $request->open_time;
      $auc_product->close_time = $request->close_time;
      $auc_product->images = json_encode($images);
      $auc_product->save();
      $request->session()->flash('message', 'Successfully!');
        return redirect('/auction_product');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $auc_product = AuctionProduct::find($id);
    $user = User::find($auc_product->user_id);
    return view('auction_product.show',compact('auc_product',$auc_product))->with('user', $user);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function manage()
  {
      $id = Auth::id();
      $auc_product = AuctionProduct::where('user_id', $id)->get();
      return view('auction_product.manage',compact('auc_product',$auc_product));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Auction_product $auc_product)
  {
      $request->validate([
        'title' => 'required|max:100',
        'description' => 'required|max:200',
    ]);

      $auc_product->title = $request->title;
      $auc_product->description = $request->description;
      $auc_product->save();
      $request->session()->flash('message', 'Successfully modified the task!');
      return redirect('auction_product');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, Auction_product $auc_product)
  {
    $report->delete();
    $request->session()->flash('message', 'Successfully deleted the task!');
    return redirect('auction_product');
  }
}
