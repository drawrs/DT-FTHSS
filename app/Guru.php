<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    /**
    * Developer : Rizal Khilman
    * Facebook : http://fb.me/rizal.ofdraw
    * Instagram : http://instagram.com/rz.khilman
    * Website : http://www.khilman.com
    * Email : rizal.drawrs@gmail.com
    * Last Update: 9 Juni 2017
    */
    protected $table = 'guru';
    protected $primaryKey = 'id';
    protected $fillable = ["nama", "jk","tgl_lahir", "tmp_lahir_id", "prog", "jurusan", "pejabat", "no_surat", "tgl_surat", "tmt_kerja", "status", "nuptk", "no_sertifikasi", "no_nrg", "status_guru", "foto", "no_telp", "alamat"];
    public function kota(){
            return $this->belongsTo('App\Kota','tmp_lahir_id');
        }
    public function guru(){
        return $this->hasOne('App\DataGuru');
    }
}
