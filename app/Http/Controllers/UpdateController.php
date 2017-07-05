<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\DataGuru;
use App\Guru;
use App\Sekolah;
use App\Tugas;
use App\Rekap;
class UpdateController extends Controller
{
    /**
     * Developer : Rizal Khilman
     * Facebook : http://fb.me/rizal.ofdraw
     * Instagram : http://instagram.com/rz.khilman
     * Website : http://www.khilman.com
     * Email : rizal.drawrs@gmail.com
     * Last Update: 9 Juni 2017
     */
    public function updateGuru(Request $request){
        $data_guru = DataGuru::find($request->id);
        $guru = new Guru;
        // olah tanggal
         // format tanggal
        $tgl_lahir = toDate($request->tgl_lahir);
        $tgl_surat = toDate($request->tgl_surat);
        $tmt_kerja = toDate($request->tmt_kerja);
        // append
        $request->request->add(['tgl_surat' => $tgl_surat, 'tmt_kerja' => $tmt_kerja, 'tgl_lahir' => $tgl_lahir]);
        // default foto name
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
        // update table data guru
        if($data = $data_guru->update($request->all())){
            // update table guru
            $guru->find($data_guru->guru_id)->update($request->all());

            $msg = "Data berhasil disimpan";
            $type = "success";
        } else {
            $msg = "Terjadi kesalahan! Gagal disimpan";
            $type = "danger";
        }
        // update foto name
        $guru->update(['tgl_surat' => $tgl_surat, 'tmt_kerja' => $tmt_kerja]);
        if ($request->hasFile('foto')) {
            $guru->update(['foto' => $fotoName]);
        }
        return redirect()->back()->with(['msg' => $msg, 'type' => $type]);
    }
    public function updateSekolah(Request $request){
        $sekolah = Sekolah::find($request->id);
         if($sekolah->update($request->all())){
            $msg = "Data berhasil disimpan";
            $type = "success";
        } else {
            $msg = "Terjadi kesalahan! Gagal disimpan";
            $type = "danger";
        }
        return redirect()->back()->with(['msg' => $msg, 'type' => $type]);
    }
    public function updateRekap(Request $request){
        //print_r($request->ket[0]);
        $rekap = new Rekap;
        foreach ($request->id as $key => $val) {
            $ket = $request->ket[$key];
            $id = $val;
            $rekap->find($id)->update(['ket' => $ket]);
            echo $ket . "- <br>";
        }
        return redirect()->back()->with(['msg' => "Behasil di upadte", 'type' => "success"]);
    }
    public function updateMutasi(Request $request){
        $guru = Guru::find($request->guru_id);
        $data_guru = new DataGuru;
        $tahun = date("Y");
        // update guru
        // /return $request->all();
        $guru->update(['status_guru' => $request->status]);
        //update data guru
        if ($request->status == 'aktif') {
            $data_guru->where(['guru_id' => $request->guru_id, 'tahun' => $tahun])
                ->update(['sekolah_id' => $request->sekolah_id]);
        }
        return redirect()->back()->with(['msg' => 'Berhasil di perbaharui!', 'type' => 'success']);
    }
}
