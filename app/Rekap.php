<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    /**
    * Developer : Rizal Khilman
    * Facebook : http://fb.me/rizal.ofdraw
    * Instagram : http://instagram.com/rz.khilman
    * Website : http://www.khilman.com
    * Email : rizal.drawrs@gmail.com
    * Last Update: 9 Juni 2017
    */
    protected $table = 'rekap';
    protected $fillable = ['sekolah_id', 'jml_gty', 'jml_pty', 'ket', 'tahun'];
    public function sekolah(){
        return $this->belongsTo('App\Sekolah');
    }
}
