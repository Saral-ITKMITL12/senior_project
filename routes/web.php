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

Route::get('/test', function () {
   // $lastdata = DB::table('userposts')->where(['user_name'=>$user_name ])->orderBy('post_id', 'desc')->first();
   // $count = AuctionProduct::find(1)->user;
   $report = AuctionProduct::find(1);
   $test = $report->images;
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
  // return  dd($id);
    echo $test;
  });
  Auth::routes();
  Route::get('/', 'HomeController@index')->name('home');
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/testing', 'TestingController@create');
  Route::get('/search', [
    'as' => 'api.search',
    'uses' => 'Api\SearchController@search'
  ]);

  Route::prefix('admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
  Route::get('/registermanage', 'Admin\AdminController@registermanage')->name('admin.register-manage');
  Route::post('/AcceptUser', 'Admin\AdminController@AcceptUser')->name('admin.acceptuser');
  Route::post('/DenyUser', 'Admin\AdminController@DenyUser')->name('admin.denyuser');
  Route::get('/report','Admin\ManageReportController@index')->name('admin.report');
  Route::post('/report', 'Admin\ManageReportController@update')->name('admin.report.update');
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
   // Route::delete('/auction_product/{id}','AuctionProductController@destroy');
   // Route::put('/auction_product/{id}','AuctionProductController@update');

   Route::get('/donate_item','Donation\DonateItemController@index')->name('donate_item');;
   Route::get('/donate_item/create','Donation\DonateItemController@create')->name('donate_item.create');
   Route::post('/donate_item','Donation\DonateItemController@store');
   Route::get('/donate_item/{id}','Donation\DonateItemController@show');
   Route::get('/donate_item_manage','Donation\DonateItemController@manage')->name('donate_item.manage');

   Route::get('/report/create','Report\ReportController@create')->name('report.create');
   Route::post('/report','Report\ReportController@store');
   Route::get('/report','Report\ReportController@index')->name('report');
  // Route::resource('kimtest', 'Test1Controller');
