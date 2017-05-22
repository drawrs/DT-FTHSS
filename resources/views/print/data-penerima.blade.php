@extends('print.main')
@section('title', 'DATA PERMOHONAN BELANJA HIBAH ' . Request::get('tahun'))
@section('content')
<div class="print-panel">
    <button id="btnPrint" onclick="window.print()">CETAK</button>
    <button id="btnExportExcel">EKSPORT ECXEL</button>
    
</div>
<div id="table_wrapper">
    <table border="1">
                    <caption>
                        REKAPITULASI DATA PERMOHONAN BELANJA HIBAH<br>
                        INSENTIF TENAGA PENDIDIK DAN TENAGA KEPENDIDIKAN<br>
                        DI LINGKUNGAN DINAS PENDIDIKAN KOTA CIREBON<br>
                        TAHUN ANGGARAN {{Request::get('tahun')}}<br>
                    </caption>
                        <thead>
                            <tr valign="center">
                                <th rowspan="2">NO</th>
                                <th  rowspan="2">NAMA SEKOLAH</th>
                                <th colspan="3">JUMLAH PENERIMA</th>
                               <th rowspan="2">KETERANGAN</th>
                            </tr>
                            <tr>
                                <th>GTY</th>
                                <th>PTY</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                @php 
                                $no = 1;
                                $t_gty = 0;
                                $t_pty = 0;
                                $t_all = 0;

                                $tes =  0;
                                @endphp
                                @forelse($data->get() as $data)
                                    @php
                                        $t_gty = $guru->whereHas('detail', function($e){
                                            $e->where('status', 'GTY');
                                        })->where(['sekolah_id' => $data->sekolah_id, 'tahun' => $tahun])->count();
                                        $t_pty = $guru->whereHas('detail', function($e){
                                            $e->where('status', 'PTY');
                                        })->where(['sekolah_id' => $data->sekolah_id, 'tahun' => $tahun])->count();
                                        $t_all = $t_gty + $t_pty;
                                        if ($data->sekolah->tingkat == 'TK') {
                                            if ($tes == 0) {
                                                echo "<tr class='tunggal'><td colspan='6'>TK</td></tr>";
                                                $tes = 1;
                                            }
                                        }
                                        if ($data->sekolah->tingkat == 'SD') {
                                            if ($tes == 1) {
                                                echo "<tr class='tunggal'><td colspan='6'>SD</td></tr>";
                                                $tes = 2;
                                            }
                                        }
                                        if ($data->sekolah->tingkat == 'SMP') {
                                            if ($tes == 2) {
                                                echo "<tr class='tunggal'><td colspan='6'>SMP</td></tr>";
                                                $tes = 3;
                                            }
                                        }
                                        
                                    @endphp
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->sekolah->nama}}</td>
                                    <td>{{$t_gty}}</td>
                                    <td>{{$t_pty}}</td>
                                    <td>{{$t_all}}</td>
                                    <td>{{$data->ket}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" align="center"><i><strong>Maaf, tidak ada data untuk ditampilkan</strong></i></td>
                                </tr>
                                @endforelse
                                @php $tes = 0 @endphp
                        </tbody>
                    </table>
</div>

 @endsection
 @section('topscript')
 <style>
     table {
            border-collapse: collapse;
            font-size: 1em;
        }
        td, th {
            padding: 10px;
        }
        caption {
            font-weight: bold;
            margin-bottom: 10px;
        }
        thead, tfoot, .tunggal {
            background-color: rgba(255, 199, 96, 0.58);
        }
        .print-panel {
            margin-bottom: 20px;
        }
        @media print {
            .print-panel {
                display: none;
            }
        }
 </style>
 @endsection