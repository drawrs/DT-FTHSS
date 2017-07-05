<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    /**
    * Developer : Rizal Khilman
    * Facebook : http://fb.me/rizal.ofdraw
    * Instagram : http://instagram.com/rz.khilman
    * Website : http://www.khilman.com
    * Email : rizal.drawrs@gmail.com
    * Last Update: 9 Juni 2017
    */
    protected $table = 'sekolah';
    protected $fillable = ['kota_id', 'tingkat', 'nama', 'alamat'];
    public function guru(){
        return $this->hasOne('App\DataGuru');
    }
}
