<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    //
    protected $table = 'rekap';
    protected $fillable = ['sekolah_id', 'jml_gty', 'jml_pty', 'ket', 'tahun'];
    public function sekolah(){
        return $this->belongsTo('App\Sekolah');
    }
}
