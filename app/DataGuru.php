<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataGuru extends Model
{
    /**
    * Developer : Rizal Khilman
    * Facebook : http://fb.me/rizal.ofdraw
    * Instagram : http://instagram.com/rz.khilman
    * Website : http://www.khilman.com
    * Email : rizal.drawrs@gmail.com
    * Last Update: 9 Juni 2017
    */
    protected $table = 'data_guru';
    protected $fillable = ["guru_id", "tugas_id", "sekolah_id", "tahun"];


    public function detail(){
        return $this->belongsTo('App\Guru', 'guru_id', 'id');
    }
    public function sekolah(){
        return $this->belongsTo('App\Sekolah');
    }
    public function kota(){
        return $this->belongsTo('App\Kota','tmp_lahir_id');
    }
    public function tugas(){
        return $this->belongsTo('App\Tugas');
    }
}
