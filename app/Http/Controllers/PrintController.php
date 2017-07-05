<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\DataGuru;
use App\Guru;
use App\Sekolah;
use App\Rekap;
class PrintController extends Controller
{
    /**
     * Developer : Rizal Khilman
     * Facebook : http://fb.me/rizal.ofdraw
     * Instagram : http://instagram.com/rz.khilman
     * Website : http://www.khilman.com
     * Email : rizal.drawrs@gmail.com
     * Last Update: 9 Juni 2017
     */
    public function pilihPrint(){
        return view('print.pilih');
    }
    public function printPage(Request $request){
        $tahun = $request->tahun;
        if ($request->type_cetak == 'r_sekolah'){
            $data = new DataGuru;

            $hitung =  array();
            $model_tk = $data->where('tahun', $tahun)
                            ->whereHas('sekolah', function($e) {
                                $e->where('tingkat', 'TK');
                            });
             // tk
            $hitung['c_tk_gty'] = $this->whereStatus($model_tk, 'GTY');
            $hitung['c_tk_pty'] = $this->whereStatus($model_tk, 'PTY');

            
            $model_sd = $data->where('tahun', $tahun)
                            ->whereHas('sekolah', function($e) {
                                $e->where('tingkat', 'SD');
                            });
            $hitung['c_sd_gty'] = $this->whereStatus($model_sd, 'GTY');
            $hitung['c_sd_pty'] = $this->whereStatus($model_sd, 'PTY');
            // SD
             $model_smp = $data->where('tahun', $tahun)
                             ->whereHas('sekolah', function($e) {
                                $e->where('tingkat', 'SMP');
                            });

            // SMP
            $hitung['c_smp_gty'] = $this->whereStatus($model_smp, 'GTY');
            $hitung['c_smp_pty'] = $this->whereStatus($model_smp, 'PTY');
            return view('print.data-sekolah', compact('hitung'));
        } elseif($request->type_cetak == 'r_penerima') {
            $tahun = ($request->tahun) ? $request->tahun: date("Y");
            $sekolah = new Rekap;
            $rekap = $sekolah;
            $data = $rekap->load(['sekolah' => function($query){
                $query->orderBy('tingkat', 'desc');
            }]);
            $guru = new DataGuru;
            return view('print.data-penerima', compact('data', 'guru', 'tahun', 'rekap'));
        } elseif ($request->type_cetak == 'data_guru') {
            $guru = new DataGuru;
            $sklh = NULL;
            $tahun = ($request->tahun) ? $request->tahun: date("Y");
            if ($request->has('sklh_id')) {
                if ($request->sklh_id !== 'all') {
                    $guru = $guru->where('sekolah_id', $request->sklh_id);
                    $sklh = Sekolah::find($request->sklh_id);
                }
            }
            $no  = 0;
            $data = $guru;
            if ($request->has('tnkt') && $request->tnkt !== 'all') {
                $data = $guru->whereHas('sekolah', function($e) use($request){
                    $e->where('tingkat', $request->tnkt);
                });
            }
            if ($request->has('id_guru')) {
                $data = $guru->where('guru_id', $request->id_guru);
            }
            $data_guru = $data->where('tahun', $tahun)
                                ->whereHas('detail', function($e){
                                    $e->where('status_guru', 'aktif');
                                })
                            ->join('guru','data_guru.guru_id', '=', 'guru.id')
                            ->orderBy('guru.nama', 'asc')
                            ->paginate(10);
            return view('print.data-guru', compact('data_guru', 'no', 'sklh'));
        }
        
    }
    public function whereStatus($model, $option){
        $result = $model->whereHas('detail', function($e) use($option) {
                     $e->where(['status' => $option, 'status_guru' => 'aktif']);
                    })->count();
        return $result;
    }
}
