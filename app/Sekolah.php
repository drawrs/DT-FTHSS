<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    //
    protected $table = 'sekolah';
    protected $fillable = ['kota_id', 'tingkat', 'nama', 'alamat'];
    public function guru(){
        return $this->hasOne('App\DataGuru');
    }
}
