<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /**
    * Developer : Rizal Khilman
    * Facebook : http://fb.me/rizal.ofdraw
    * Instagram : http://instagram.com/rz.khilman
    * Website : http://www.khilman.com
    * Email : rizal.drawrs@gmail.com
    * Last Update: 9 Juni 2017
    */
    protected $fillable = [
        'name', 'email', 'password',
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
