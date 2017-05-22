<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    //
    protected $table = 'guru';
    protected $primaryKey = 'id';
    protected $fillable = ["nama", "jk", "tmp_lahir_id", "prog", "jurusan", "pejabat", "no_surat", "tgl_surat", "tmt_kerja", "status", "nuptk", "no_sertifikasi", "no_nrg", "status_guru", "foto", "no_telp", "alamat"];
    public function kota(){
            return $this->belongsTo('App\Kota','tmp_lahir_id');
        }
    public function guru(){
        return $this->hasOne('App\DataGuru');
    }
}
