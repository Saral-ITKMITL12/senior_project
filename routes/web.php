<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\User;
use App\Product;
use App\Report;
use App\AuctionProduct;
use App\AuctionTran;
use App\DonateItem;
use App\DonateTran;
Route::get('/test', function () {
   // $lastdata = DB::table('userposts')->where(['user_name'=>$user_name ])->orderBy('post_id', 'desc')->first();
   // $count = User::find(1);
  // $auction_product = AuctionTran::where('auction_product_id', '=', '1')->get();
  //$confirm = User::find($id);
  // $num = $id->username;
  //   $product = Product::find(1);
  //   $product_owner =  $product->user_id;
  // $user = User::find($product_owner);
  // $product = new App\Product();
  // $product->product_name = 'i phone';
  // $product->price = 100;
  // $product->user_id = $user->id;
  // $product->save();
  // $user1 = auth()->user()->unreadNotifications;

    return $input[$user1];
    // return response()->json($auction_product);
  });
  Auth::routes();
  Route::get('/', 'HomeController@index')->name('home');
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/testing', 'TestingController@show');


  Route::get('/markAsRead', function () {
    auth()->user()->unreadNotifications->markAsRead();
  });
  Route::prefix('admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/admin', 'Admin\AdminController@index')->name('admin.dashboard');
  Route::get('/register_manage', 'Admin\AdminController@register_manage')->name('admin.register-manage');
  Route::post('/AcceptUser', 'Admin\AdminController@AcceptUser')->name('admin.acceptuser');
  Route::post('/DenyUser', 'Admin\AdminController@DenyUser')->name('admin.denyuser');
  Route::get('/report','Admin\AdminController@report_manage')->name('admin.report');
  Route::post('/report', 'Admin\AdminController@report_update')->name('admin.report.update');
  Route::get('/user_manage','Admin\AdminController@manage_user')->name('admin.user-manage');
  Route::get('/item_manage/auction','Admin\AdminController@manage_auction')->name('admin.auction-manage');
  Route::get('/item_manage/donate','Admin\AdminController@manage_donate')->name('admin.donate-manage');

  });



  Route::get('profile/{id}','Profile\ProfileController@show')->name('profile');
  Route::get('edit_profile',  ['as' => 'profile.edit', 'uses' => 'Profile\ProfileController@edit']);
  Route::patch('profile/{user}/update',  ['as' => 'profile.update', 'uses' => 'Profile\ProfileController@update']);


  Route::get('/waiting', function () {  return view('waiting'); });


   Route::get('/auction_product','Auction\AuctionProductController@index')->name('auction_product');
   Route::get('/auction_product/create','Auction\AuctionProductController@create')->name('auction_product.create');
   Route::post('/auction_product','Auction\AuctionProductController@store');
   Route::get('/auction_product/{id}','Auction\AuctionProductController@show');
   Route::get('/auction_product_manage','Auction\AuctionProductController@manage')->name('auction_product.manage');
   Route::get('/auction_history','Auction\AuctionProductController@history')->name('auction_product.history');
   Route::get('/auction_category/{id}','Auction\AuctionProductController@category')->name('auction_product.category');
   Route::get('/auction_search','Auction\AuctionProductController@search')->name('auction.search');
   // Route::delete('/auction_product/{id}','AuctionProductController@destroy');
   // Route::put('/auction_product/{id}','AuctionProductController@update');
   Route::post('/request_item','Donation\DonateController@request_item')->name('request_item');
   Route::post('/bid','Auction\AuctionController@bid')->name('bid');
   Route::get('/ajax/{id}','Auction\AuctionController@ajax')->name('ajax');
   Route::get('/ajax-noti','NotifyController@noti')->name('noti');
   Route::get('ajaxtest',function(){
      return view('test');
   });
   Route::post('/getmsg','Auction\AuctionController@index');


   Route::get('/donate_item','Donation\DonateItemController@index')->name('donate_item');
   Route::get('/donate_item/create','Donation\DonateItemController@create')->name('donate_item.create');
   Route::post('/donate_item','Donation\DonateItemController@store');
   Route::get('/donate_item/{id}','Donation\DonateItemController@show');
   Route::get('/donate_item_manage','Donation\DonateItemController@manage')->name('donate_item.manage');
   Route::get('/donate_item_history','Donation\DonateItemController@history')->name('donate_item.history');
   Route::get('/donate_search','Donation\DonateItemController@search')->name('donate.search');
   Route::get('/request_list/{id}','Donation\DonateItemController@request_list');
   Route::post('/accept_request','Donation\DonateItemController@accept_request');

   Route::get('/report/create','Report\ReportController@create')->name('report.create');
   Route::post('/report','Report\ReportController@store');
   Route::get('/report','Report\ReportController@index')->name('report');

   Route::get('/chat/{id}','Chat\ChatController@index')->name('chat');
   Route::post('/chat/{id}/store','Chat\ChatController@storeMessage');

   Route::get('/pusher', function() {
    event(new App\Events\HelloPusherEvent('Hi there Pusher!'));
    return "Event has been sent!";
});
  // Route::resource('kimtest', 'Test1Controller');
