<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\DataGuru;
use App\Sekolah;
use App\Guru;
use App\Rekap;
class MainController extends Controller
{
    /**
     * Developer : Rizal Khilman
     * Facebook : http://fb.me/rizal.ofdraw
     * Instagram : http://instagram.com/rz.khilman
     * Website : http://www.khilman.com
     * Email : rizal.drawrs@gmail.com
     * Last Update: 9 Juni 2017
     */
    public function beranda(){
        return view('beranda');
    }
    public function data_guru(Request $request){
        $guru = DataGuru::whereHas('detail', function($a){
            $a->where('status_guru', 'aktif');
        });
        $sklh = NULL;
        $tahun = ($request->tahun) ? $request->tahun: date("Y");
        if ($request->has('sklh_id')) {
            $guru = DataGuru::where('sekolah_id', $request->sklh_id);
            $sklh = Sekolah::find($request->sklh_id);
        }
        $no  = 0;
        $data = $guru;
        if (isset($request->opsi)) {
        $q = $request->q;
            switch ($request->opsi) {
                case 'nama':
                     $data = $guru->whereHas('detail', function($e) use($q){
                        $e->where('nama', 'like', '%' . $q . '%');
                     });
                    break;
                case 'nuptk':
                    $data = $guru->whereHas('detail', function($e) use($q){
                        $e->where('nuptk', 'like', '%' . $q . '%');
                     });
                    break;
                case 'no_nrg':
                    $data = $guru->whereHas('detail', function($e) use($q){
                        $e->where('no_nrg', 'like', '%' . $q . '%');
                     });
                    break;
                case 'no_sr':
                    $data = $guru->whereHas('detail', function($e) use($q){
                        $e->where('no_sertifikasi', 'like', '%' . $q . '%');
                     });
                    break;
                
                case 'a_sklh':
                    $sklh_id = $request->sklh_id;
                    $data = $guru->where('sekolah_id', $sklh_id);
                    break;
                default:
                    $data = $guru;
                    break;
            }
        }
        $data_guru = $data->where('tahun', $tahun)->paginate(10);
        return view('data_guru', compact('data_guru', 'no', 'sklh'));
    }
    public function data_sekolah(Request $request){
        $sekolah = new Sekolah;
        $no  = 0;
        $data = $sekolah;
        if (isset($request->opsi)) {
        $q = $request->q;
            //

            switch ($request->opsi) {
                case 'nama':
                     $data = $sekolah->where('nama', 'like', '%' . $q . '%');
                    break;
                case 'tnkt':
                     $data = $sekolah->where('tingkat', 'like', '%' . $q . '%');
                    break;
                case 'almt':
                     $data = $sekolah->where('alamat', 'like', '%' . $q . '%');
                    break;
                default:
                    $data = $sekolah;
                    break;
            }
        }
        $data_sekolah = $data->paginate(50);
        return view('data_sekolah', compact('data_sekolah', 'no'));
    }
    public function detail_guru($guru_id, Request $request){
        $guru = DataGuru::find($guru_id);
        if (is_null($guru)) {
            return redirect('/data-guru')->with(['msg' => "Data tidak ditemukan!", 'type' => "danger"]);
        }
        return view('detail_guru', compact('guru'));
    }
     public function ubah_guru($guru_id, Request $request){
        $guru = DataGuru::find($guru_id);
        if (is_null($guru)) {
            return redirect('/data-guru')->with(['msg' => "Data tidak ditemukan!", 'type' => "danger"]);
        }
        return view('ubah_guru', compact('guru'));
    }
    public function tambah_guru(){
        return view('tambah_guru');
    }
    public function rekap_sekolah(Request $request){
        $tahun = ($request->tahun) ? $request->tahun: date("Y");
        $sekolah =new Rekap;
        $rekap = $sekolah;
        if (isset($request->opsi)) {
        $q = $request->q;
            switch ($request->opsi) {
                case 'nama':
                     $rekap = $sekolah->whereHas('sekolah', function($q) use ($request) {
                                $q->where('nama', 'like', '%' . $request->q . '%');
                             });
                    break;
                case 'tnkt':
                     $rekap = $sekolah->whereHas('sekolah', function($q) use ($request) {
                                $q->where('tingkat', 'like', '%' . $request->q . '%');
                             });
                    break;
                case 'almt':
                     $rekap = $sekolah->whereHas('sekolah', function($q) use ($request) {
                                $q->where('alamat', 'like', '%' . $request->q . '%');
                             });
                    break;
                default:
                    $rekap = $sekolah;
                    break;
            }
        }
        $data = $rekap->where('tahun', $tahun);
        $guru = new DataGuru;
        return view('rekap.data-sekolah', compact('data', 'guru', 'tahun'));
    }
    public function hapus_data_guru($id){
        $data_guru = DataGuru::find($id);
        $guru = Guru::find($data_guru->guru_id);
        if (is_null($data_guru) || is_null($guru)) {
            return redirect('/data-guru')->with(['msg' => "Data tidak ditemukan!", 'type' => "danger"]);
        }
        if ($guru->delete()) {
            $data_guru->delete();
            $msg = "Berhasil dihapus";
            $type = "success";
        } else {
            $msg = "gagal menghapus";
            $type = "danger";
        }
         return redirect()->back()->with(['msg' => $msg, 'type' => $type]);
    }
    public function hapus_guru($id){
        $guru = Guru::find($id);
        if (is_null($guru)) {
            return redirect('/data-guru')->with(['msg' => "Data tidak ditemukan!", 'type' => "danger"]);
        }
        if ($guru->delete()) {
            $msg = "Berhasil dihapus";
            $type = "success";
        } else {
            $msg = "gagal menghapus";
            $type = "danger";
        }
         return redirect()->back()->with(['msg' => $msg, 'type' => $type]);
    }
    public function hapus_sekolah($id){
        $sekolah = Sekolah::find($id);
        if (is_null($sekolah)) {
            return redirect('/data-sekolah')->with(['msg' => "Data tidak ditemukan!", 'type' => "danger"]);
        }
         if ($sekolah->delete()) {
            $msg = "Berhasil dihapus";
            $type = "success";
        } else {
            $msg = "gagal menghapus";
            $type = "danger";
        }
         return redirect()->back()->with(['msg' => $msg, 'type' => $type]);
    }
    public function ubah_sekolah($id){
        $sekolah = Sekolah::find($id);
        return view('ubah_sekolah', compact('sekolah'));
    }
    public function tambah_sekolah(){
        return view('tambah_sekolah');
    }

    public function tambah_rekap_sekolah(){
        return view('rekap.pilih-tahun');
    }
    public function mutasi(Request $request){
        $data = Guru::where('status_guru', '!=', 'aktif');
        return view('mutasi.data_mutasi', compact('data'));
    }
     public function deleteRekap($tahun){
        $rekap = Rekap::where('tahun', $tahun);

        if ($rekap->delete()) {
            $msg = "Berhasil di hapus";
            $type = "success";
        } else {
            $msg = "Gagal menghapus!";
            $type = "danger";
        }
        return redirect()->route('rekap_sekolah')->with(['msg' => $msg, 'type' => $type]);
    }
}
