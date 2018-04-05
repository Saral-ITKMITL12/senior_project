<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuctionProduct extends Model
{
  protected $fillable = [
      'title', 'description','open_time','close_time', 'bid_step', 'price', 'user_id',
  ];
    public function User()
   {
       return $this->belongsTo('App\User');
   }
}
