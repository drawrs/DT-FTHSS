<?php $__env->startSection('title', 'DATA PERMOHONAN BELANJA HIBAH ' . Request::get('tahun')); ?>
<?php $__env->startSection('content'); ?>
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
                        TAHUN ANGGARAN <?php echo e(Request::get('tahun')); ?><br>
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
                        </tbody>
                    </table>
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
 </style>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('print.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>