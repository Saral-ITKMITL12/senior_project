<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonateTran extends Model
{
  public function User()
 {
     return $this->belongsTo('App\User');
 }
}
