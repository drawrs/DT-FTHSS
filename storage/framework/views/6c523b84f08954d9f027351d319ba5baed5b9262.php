<?php $__env->startSection('site_title', 'REKAPITULASI'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">TABLE REKAPITULASI : <select name="" id="pilihTahun" class="form-control" style="display: inline;width: 30%">
                                <option value="">-- Pilih tahun -- </option>
                                <?php for($i= date("Y")+1; $i >= (date("Y") - 30) ; $i--): ?>
                                <option value="<?php echo e($i); ?>" <?php echo e(autoSelect(Request::input('tahun'), $i)); ?>><?php echo e($i); ?></option>
                                <?php endfor; ?>
                              </select>
                              
                              </div>

                <div class="panel-body">
                <?php if($data->count() > 0): ?>
                <a class="btn btn-danger btn-sm pull-right" onclick="return confirm('Anda yakin ? Semua data rekapitulasi tahun <?php echo e($tahun); ?> akan di Hapus !')" href="<?php echo e(route('delete.rekap_sekolah', ['tahun' => $tahun])); ?>" data-toggle="tooltip" data-placement="top" title="Hapus data rekapitulasi tahun <?php echo e($tahun); ?>"><i class="fa fa-trash"></i> Hapus Rekap</a>
                <?php endif; ?>
                <?php echo $__env->make('includes.notif', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="col-md-6 no-padding">
                    <div class="row">
                        
                        <form action="<?php echo e(url_now()); ?>" method="GET">
                            <select name="opsi" id="" class="form-control" style="display: inline;width: 30%">
                                <option value="nama" <?php echo e(autoSelect('nama', Request::input('opsi'))); ?>>Nama</option>
                                <option value="tnkt" <?php echo e(autoSelect('tnkt', Request::input('opsi'))); ?>>Tingkat</option>
                                <option value="almt" <?php echo e(autoSelect('almt', Request::input('opsi'))); ?>>Alamat</option>
                            </select>
                            <input type="text" value="<?php echo e(Request::input('q')); ?>" class="form-control" name="q" placeholder="Cari.." style="display: inline; width: 50%">
                        <button type="submit" class="btn btn-default" title="Klik untuk mulai mencari.."><i class="fa fa-search"></i></button>
                    </form>
                    <br>
                    </div>

                </div>
                    <table class="table table-striped table-responsive table-bordered">
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
                                <form action="" method="POST">
                                <?php $__empty_1 = true; foreach($data->paginate(50) as $data): $__empty_1 = false; ?>
                                    <?php 
                                        $t_gty = $guru->whereHas('detail', function($e) {
                                                         $e->where(['status' => 'GTY', 'status_guru' => 'aktif']);
                                                    })->where(['sekolah_id' => $data->sekolah_id, 'tahun' => $tahun])->count();
                                            
                                        $t_pty = $guru->whereHas('detail', function($e) {
                                                         $e->where(['status' => 'PTY', 'status_guru' => 'aktif']);
                                                    })->where(['sekolah_id' => $data->sekolah_id, 'tahun' => $tahun])->count();
                                        $t_all = $t_gty + $t_pty;
                                     ?>
                                    <?php echo csrf_field(); ?>

                                    <input type="hidden" name="id[]" value="<?php echo e($data->id); ?>">
                                <tr>
                                    <td><?php echo e($no++); ?></td>
                                    <td><a href="<?php echo e(url('data-guru?sklh_id=' . $data->sekolah->id)); ?>" target="_blank"><?php echo e($data->sekolah->nama); ?></a></td>
                                    <td><?php echo e($t_gty); ?></td>
                                    <td><?php echo e($t_pty); ?></td>
                                    <td><?php echo e($t_all); ?></td>
                                    <td><input type="text" name="ket[]" class="form-control" placeholder="keterangan.." value="<?php echo e($data->ket); ?>"></td>
                                </tr>
                                <?php endforeach; if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6" align="center"><i><strong>Maaf, tidak ada data untuk ditampilkan</strong></i></td>
                                </tr>
                                <?php endif; ?>
                        </tbody>
                    </table>
                    <?php echo $data->paginate(50)->links(); ?>

                        <button type="submit" class="btn btn-warning pull-right"><i class="fa fa-save"></i> SIMPAN PERUBAHAN</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bottscript'); ?>
<script>
  $(document).ready(function() {
    $('#pilihTahun').change(function(event) {
      /* Act on the event */
      var tahun = $(this).val();

      window.location.href = '?tahun=' + tahun;
    });
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>