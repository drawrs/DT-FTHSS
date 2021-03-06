<?php $__env->startSection('title', 'DATA PERMOHONAN BELANJA HIBAH ' . Request::get('tahun')); ?>
<?php $__env->startSection('content'); ?>
<div class="print-panel">
    <button id="btnPrint" onclick="window.print()">CETAK</button>
    <button id="btnExportExcel">EKSPORT ECXEL</button>
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
<div id="table_wrapper">
    <table border="1">
                    <caption>
                        REKAPITULASI DATA PERMOHONAN BELANJA HIBAH<br>
                        INSENTIF TENAGA PENDIDIK DAN TENAGA KEPENDIDIKAN<br>
                        DI LINGKUNGAN DINAS PENDIDIKAN KOTA CIREBON<br>
                        TAHUN ANGGARAN <span id="tahun"><?php echo e(Request::get('tahun')); ?></span><br>
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
                        <?php 
                            $no = 1;
                            $t_gty = 0;
                            $t_pty = 0;
                            $t_all = 0;
                         ?>
                        <?php foreach(getEnum(new App\Sekolah, 'tingkat') as $m_key => $m_val): ?>
                            <tr>
                                <td colspan="6" class="tunggal"><?php echo e($m_val); ?></td>
                            </tr>
                            <?php 
                                $sql = $rekap->whereHas('sekolah', function($q) use ($m_val) {
                                    $q->where('tingkat', $m_val)->orderBy('nama');
                                });
                             ?>
                            <?php $__empty_1 = true; foreach($sql->get() as $data): $__empty_1 = false; ?>
                                <?php 
                                        $t_gty = $guru->whereHas('detail', function($e){
                                            $e->where('status', 'GTY');
                                        })->where(['sekolah_id' => $data->sekolah_id, 'tahun' => $tahun])->count();
                                        $t_pty = $guru->whereHas('detail', function($e){
                                            $e->where('status', 'PTY');
                                        })->where(['sekolah_id' => $data->sekolah_id, 'tahun' => $tahun])->count();
                                        $t_all = $t_gty + $t_pty;
                                 ?>
                                <tr>
                                    <td>
                                        <?php echo e($no++); ?>

                                    </td>
                                    <td>
                                        <?php echo e($data->sekolah->nama); ?>

                                    </td>
                                    <td><?php echo e($t_gty); ?></td>
                                    <td><?php echo e($t_pty); ?></td>
                                    <td><?php echo e($t_all); ?></td>
                                    <td><?php echo e($data->ket); ?></td>
                                </tr>
                            <?php endforeach; if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" align="center"><i><strong>Maaf, tidak ada data untuk ditampilkan</strong></i></td>
                            </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                            <?php /*
                                <?php  
                                $no = 1;
                                $t_gty = 0;
                                $t_pty = 0;
                                $t_all = 0;

                                $tes =  0;
                                 ?>
                                <?php $__empty_1 = true; foreach($data->get() as $data): $__empty_1 = false; ?>
                                    <?php 
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
                                        
                                     ?>
                                <tr>
                                    <td><?php echo e($no++); ?></td>
                                    <td><?php echo e($data->sekolah->nama); ?></td>
                                    <td><?php echo e($t_gty); ?></td>
                                    <td><?php echo e($t_pty); ?></td>
                                    <td><?php echo e($t_all); ?></td>
                                    <td><?php echo e($data->ket); ?></td>
                                </tr>
                                <?php endforeach; if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6" align="center"><i><strong>Maaf, tidak ada data untuk ditampilkan</strong></i></td>
                                </tr>
                                <?php endif; ?>
                                <?php  $tes = 0  ?>
                                */ ?>
                        </tbody>
                    </table>
<div class="foot-note">
<br><br><br><br><br><br>
<?php 
$bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$bln = date('n');

 ?>
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

 <?php $__env->stopSection(); ?>
 <?php $__env->startSection('topscript'); ?>
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
        @media  print {
            .print-panel {
                display: none;
            }
        }
        .foot-note {
                right: -5px;
                line-height: .2;
                padding-left: 400px;
        }
 </style>
 <?php $__env->stopSection(); ?>

 <?php $__env->startSection('bottscript'); ?>
<script>
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
</script>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('print.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>