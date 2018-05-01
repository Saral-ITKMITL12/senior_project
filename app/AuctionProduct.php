<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class AuctionProduct extends Model
{
  use Searchable;
  protected $fillable = [
      'title', 'description','open_time','close_time', 'bid_step', 'price', 'user_id',
  ];
  protected $dates = ['created_at', 'updated_at', 'deleted_at','open_time','close_time'];
    public function User()
   {
       return $this->belongsTo('App\User');

   }
   public function searchableAs()
  {
      return 'auction_products_index';
  }
}
