<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     public function AuctionProduct()
     {
         return $this->hasMany('App\AuctionProduct');
     }

     public function DonateItem()
     {
         return $this->hasMany('App\DonateItem');
     }

    protected $fillable = [
        'username', 'email','fname','lname', 'password', 'address', 'phone', 'year', 'faculty', 'degree', 'studentcard_id', 'image_id', 'image_profile', 'gender','line_id','accept_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
