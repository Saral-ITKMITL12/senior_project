<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function user(){
      return $this->belongsTo('app/User');
    }
    protected $fillable = ['year','faculty','degree','studentcard_id'];
}
