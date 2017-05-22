<?php $__env->startSection('title', 'DATA TENAGA HONORER SEKOLAH SWASTA  ' . Request::get('tahun')); ?>
<?php $__env->startSection('content'); ?>
<div class="print-panel">
    <button id="btnPrint" onclick="window.print()">CETAK PDF</button>
    <button id="btnExportExcel">EKSPORT EXCEL</button>
    <form action="">
                            Pilih Tingkat : <select name="tnkt" id="tnkt">
                                              <option value="all">Semua</option>
                                              <option value="TK" <?php echo e(autoSelect(Request::input('tnkt'), 'TK')); ?>>TK</option>
                                              <option value="SD" <?php echo e(autoSelect(Request::input('tnkt'), 'SD')); ?>>SD</option>
                                              <option value="SMP" <?php echo e(autoSelect(Request::input('tnkt'), 'SMP')); ?>>SMP</option>
                                              <option value="SMA" <?php echo e(autoSelect(Request::input('tnkt'), 'SMA')); ?>>SMA</option>
                                            </select>
                                            <br>
                            <span id="pilih_sekolah">Pilih Sekolah : <select name="sklh_id" id="sklh_id" class="form-control select2">
                            <option value="all">Semua</option>
                              <?php foreach(App\Sekolah::all() as $sklh): ?>
                                <option value="<?php echo e($sklh->id); ?>"><?php echo e($sklh->nama); ?></option>
                              <?php endforeach; ?>
                            </select></span>
                            <br>
                            Pilih Tahun : <select name="" id="tahun" class="form-control">
                                <option value="">-- Pilih tahun -- </option>
                                <?php for($i= date("Y"); $i >= (date("Y") - 30) ; $i--): ?>
                                <option value="<?php echo e($i); ?>" <?php echo e(autoSelect(Request::input('tahun'), $i)); ?>><?php echo e($i); ?></option>
                                <?php endfor; ?>
                              </select>
                    </form>
                        <button type="submit" id="btnTampil" class="btn btn-default" title="Klik untuk mulai mencari..">Tampilkan</button>
</div>
<div id="table_wrapper">
  <table border="1">
<caption>
  DATA TENAGA HONORER SEKOLAH SWASTA       <br>                     
DI LINGKUNGAN DINAS PENDIDIKAN KOTA CIREBON  <br>                         
TAHUN <?php echo e(Request::get('tahun')); ?>                            

</caption>
                       <thead>
                           <tr>
                               <th>NO</th>
                               <th>NAMA</th>
                               <th>JK</th>
                               <th>TEMPAT LAHIR</th>
                               <th>TGL.LAHIR</th>
                               <th>TELP/HP</th>
                               <th>PROG</th>
                               <th>JURUSAN</th>
                               <th>TUGAS/PEKERJAAN</th>
                               <th>PEJABAT YANG MENGANGKAT</th>
                               <th>NO.SURAT</th>
                               <th>TGL.SURAT</th>
                               <th>TMT KERJA</th>
                               <th>STATUS</th>
                               <th>STATUS GURU</th>
                               <th>NUPTK</th>
                               <th>NO NRG</th>
                               <th>NO SERTIFIKASI</th>
                               <th>ASAL SEKOLAH</th>
                               <th>ALAMAT</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php $__empty_1 = true; foreach($data_guru as $guru): $__empty_1 = false; ?>
                           <?php  $no++  ?>
                           <tr>

                               <td><?php echo e($no); ?></td>
                               <td><?php echo e($guru->detail->nama); ?></td>
                               <td><?php echo e($guru->detail->jk); ?></td>
                               <td><?php echo e($guru->detail->kota->name); ?></td>
                               <td><?php echo e($guru->detail->tgl_lahir); ?></td>
                               <td><?php echo e($guru->detail->no_telp); ?></td>
                               <td><?php echo e($guru->detail->prog); ?></td>
                               <td><?php echo e($guru->detail->jurusan); ?></td>
                               <td><?php echo e($guru->tugas->nama); ?></td>
                               <td><?php echo e($guru->detail->pejabat); ?></td>
                               <td><?php echo e($guru->detail->no_surat); ?></td>
                               <td><?php echo e($guru->detail->tgl_surat); ?></td>
                               <td><?php echo e($guru->detail->tmt_kerja); ?></td>
                               <td><?php echo e($guru->detail->status); ?></td>
                               <td><?php echo e($guru->detail->status_guru); ?></td>
                               <td><?php echo e($guru->detail->nuptk); ?></td>
                               <td><?php echo e($guru->detail->no_nrg); ?></td>
                               <td><?php echo e($guru->detail->no_sertifikasi); ?></td>
                               <td><?php echo e($guru->sekolah->nama); ?></td>
                               <td><?php echo e($guru->detail->alamat); ?></td>
                           </tr>
                           <?php endforeach; if ($__empty_1): ?>
                           <tr>
                               <td colspan="7" align="center">
                                   <strong><i>Maaf, tidak ada data untuk ditampilkan!</i></strong>
                               </td>
                           </tr>
                           <?php endif; ?>
                       </tbody>
                   </table>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('bottscript'); ?>

<script>
  $(document).ready(function() {
    $('.select2').select2();
    $('#btnTampil').click(function(event) {
      /* Act on the event */
      var tnkt = $('#tnkt').val();
      var sklh_id = $('#sklh_id').val();
      var tahun = $('#tahun').val();
      window.location.href = 'print-data?type_cetak=<?php echo e(Request::get('type_cetak')); ?>&tahun=' + tahun + '&tnkt=' + tnkt +'&sklh_id=' + sklh_id ;
    });
    
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('print.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>