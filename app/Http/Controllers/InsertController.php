<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\DataGuru;
use App\Guru;
use App\Sekolah;
use App\Rekap;
class InsertController extends Controller
{
    /**
     * Developer : Rizal Khilman
     * Facebook : http://fb.me/rizal.ofdraw
     * Instagram : http://instagram.com/rz.khilman
     * Website : http://www.khilman.com
     * Email : rizal.drawrs@gmail.com
     * Last Update: 9 Juni 2017
     */
    public function insertGuru(Request $request){

        $data_guru = new DataGuru;
        $guru = new Guru;
        $fotoName = 'guru.png';
        
        if ($request->hasFile('foto_user')) {
            $foto = $request->file('foto_user');
            $fotoName = str_slug($request->nama).substr(md5($foto->getClientOriginalName()), 1, 10) . "." . $foto->getClientOriginalExtension();
            $foto->move(
                base_path() . '/public/uploads/foto/', $fotoName
            );
            // add new foto key into array
            $request->request->add(['foto' => $fotoName]);
        }
        // format tanggal
        $tgl_lahir = toDate($request->tgl_lahir);
        $tgl_surat = toDate($request->tgl_surat);
        $tmt_kerja = toDate($request->tmt_kerja);
        // append
        $request->request->add(['tgl_surat' => $tgl_surat, 'tmt_kerja' => $tmt_kerja, 'tgl_lahir' => $tgl_lahir]);
        // tampung data dari form
        $data = $request->all();
        if ($guru_rs = $guru->create($data)) { // nambahin ke table guru
            // add new guru_id key into array
            $request->request->add(['guru_id' => $guru_rs->id]);
            // ambil data baru
            $data = $request->all();
            if ($result = $data_guru->create($data)) { // nambahin ke data guru
                $msg = "Berhasil ditambahkan";
                $type = "success";
            } else {
                $msg = "gagal menambahkan";
                $type = "danger";
            }
        }

        if (isset($request->tambah_lagi)) {
            return redirect()->back()->with(['msg' => $msg, 'type' => $type]);
        } else {
            return redirect()->route('data_guru')->with(['msg' => $msg, 'type' => $type]);
        }
    }
    public function insertSekolah(Request $request){
        $sekolah = new Sekolah;
        if ($result = $sekolah->create($request->all())) {
            $msg = "Berhasil ditambahkan";
            $type = "success";
        } else {
            $msg = "gagal menambahkan";
            $type = "danger";
        }
      
        if (isset($request->tambah_lagi)) {
            return redirect()->back()->with(['msg' => $msg, 'type' => $type]);
        } else {
            return redirect()->route('data_sekolah')->with(['msg' => $msg, 'type' => $type]);
        }

    }
    public function insertRekapSekolah(Request $request){
        $rekap = new Rekap;
        $sekolah = Sekolah::select('id')->get();
        //return $sekolah;
        $checkif_exsist = $rekap->whereIn('sekolah_id', $sekolah)
                            ->where('tahun', $request->tahun)->count();
        if ($checkif_exsist !== 0) {
            return redirect()->back()->with(['msg' => "<strong>Maaf, </strong> Data sekolah pada tahun ini sudah pernah direkap sebelumnya", 'type' => 'danger']);
        }
        $query = [];
        foreach ($sekolah as $val) {
                $rekap->create(['sekolah_id' => $val->id, 'tahun' => $request->tahun]);
        }
        return redirect()->route('rekap_sekolah', ['tahun' => $request->tahun])->with(['msg' => "<strong>Berhasil, </strong> Data telah di rekap", 'type' => 'success']);
    }

   
}
