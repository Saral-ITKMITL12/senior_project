<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonateItem extends Model
{
  protected $dates = ['created_at', 'updated_at', 'deleted_at','open_time','close_time'];
  public function User()
 {
     return $this->belongsTo('App\User');
 }
}
