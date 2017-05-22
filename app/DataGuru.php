<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataGuru extends Model
{
    //
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
