<!DOCTYPE html>
<html>
<head>
    <title>Print</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td, th {
            padding: 10px;
        }
        caption {
            font-weight: bold;
            margin-bottom: 10px;
        }
        thead, tfoot {
            background-color: rgba(255, 199, 96, 0.58);
        }
        .print-panel {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .print-area {
            width: 545px;
            position: relative;
        }
        .foot-note {
            position: absolute;
            right: -5px;
            line-height: .2;
        }
        @media print {
            .print-panel {
                display: none;
            }
        }
        .setting {
            margin: 10px 0;
        }
    </style>
</head>
<body>
<div class="print-panel">
    <button onclick="window.history.back()">KEMBALI</button>
    <button id="btnPrint" onclick="window.print()">CETAK</button>
    <div class="setting" id="app">
        <p><strong>Pengaturan</strong></p>
        <input type="text" placeholder="Nama Dinas" id="inp_nmdis">
        <input type="text" placeholder="Nama" id="inp_nama">
        <input type="text" placeholder="Titel"  id="inp_titel">
        <input type="text" placeholder="NIP"  id="inp_nip">
        <br><br>
        <input type="text" placeholder="Tanggal"  id="inp_tgl">
        <input type="text" placeholder="Tahun"  id="inp_thn">
    </div>
</div>
<div class="print-area">
    <table border="1">
    <caption>
        REKAPITULASI DATA PENGAJUAN <br>
        BANTUAN HIBAH PADA SEKOLAH SWASTA <br>
        BAGI PENDIDIK DAN TENAGA KEPENDIDIKAN <br>
        TAHUN ANGGARAN <span id="tahun">{{ Request::get('tahun')}}</span> <br>
    </caption>
    <thead>
        <tr>
            <th rowspan="2">NO</th>
            <th rowspan="2">TINGKATAN SEKOLAH</th>
            <th colspan="2">JUMLAH</th>
            <th rowspan="2">TOTAL</th>
        </tr>
        <tr>
            <td>GTY</td>
            <td>PTY</td>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
        $no =1;
        ?>
            <td>{{$no++}}</td>
            <td>TK</td>
            <td>{{$hitung['c_tk_gty']}}</td>
            <td>{{$hitung['c_tk_pty']}}</td>
            <td>{{$total_tk = $hitung['c_tk_gty'] + $hitung['c_tk_pty']}}</td>
        </tr>
        <tr>
            <td>{{$no++}}</td>
            <td>SEKOLAH DASAR (SD)</td>
            <td>{{$hitung['c_sd_gty']}}</td>
            <td>{{$hitung['c_sd_pty']}}</td>
            <td>{{$total_sd = $hitung['c_sd_gty'] + $hitung['c_sd_pty']}}</td>
        </tr>
        <tr>
            <td>{{$no++}}</td>
            <td>SEKOLAH MENENGAH PERTAMA (SMP)</td>
            <td>{{$hitung['c_smp_gty']}}</td>
            <td>{{$hitung['c_smp_pty']}}</td>
            <td>{{$total_smp = $hitung['c_smp_gty'] + $hitung['c_smp_pty']}}</td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2" align="center">J U M L A H  ( 1+3 )</td>
            <td>{{$hitung['c_tk_gty'] + $hitung['c_sd_gty'] + $hitung['c_smp_gty']}}</td>
            <td>{{$hitung['c_tk_pty'] + $hitung['c_sd_pty'] + $hitung['c_smp_pty']}}</td>
            <td>{{$total_tk + $total_sd + $total_smp}}</td>
        </tr>
    </tfoot>

</table>
<div class="foot-note">
<br><br><br><br><br><br>
@php
$bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$bln = date('n');

@endphp
<p>Cirebon, <span id="tanggal"><?= date("d ") . $bulan[$bln] .date(" Y") ?></span></p>
<p><span id="dinas">Kepala Dinas Pendidikan Kota Cirebon</span></p>
<br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
<p><u><span id="nama">RIZAL KHILMAN</span></u></p>
<p><span id="titel">Web Developer</span></p>
<p>NIP: <span id="nip">123456780</span></p>
</div>
</div>
<script src="{{url('js/jquery.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('#inp_nama').keydown(function(event) {
        /* Act on the event */
        $('#nama').text($(this).val());
    });
    $('#inp_titel').keydown(function(event) {
        /* Act on the event */
        $('#titel').text($(this).val());
    });
    $('#inp_nmdis').keydown(function(event) {
        /* Act on the event */
        $('#dinas').text($(this).val());
    });
    $('#inp_nip').keydown(function(event) {
        /* Act on the event */
        $('#nip').text($(this).val());
    });
    $('#inp_tgl').change(function(event) {
        /* Act on the event */
        $('#tanggal').text($(this).val());
    });
    $('#inp_thn').change(function(event) {
        /* Act on the event */
        $('#tahun').text($(this).val());
    });
});
</script>
</body>
</html>