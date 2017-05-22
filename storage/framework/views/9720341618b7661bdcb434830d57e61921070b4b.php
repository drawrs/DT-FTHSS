<?php $__env->startSection('site_title', 'DATA SEKOLAH'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">DATA SEKOLAH TERDAFTAR</div>

                <div class="panel-body">
                    <div class="col-md-6 no-padding">
                        <div class="row">
                        <?php echo $__env->make('includes.notif', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <form action="">
                            <select name="opsi" id="" class="form-control" style="display: inline;width: 30%">
                                <option value="nama" <?php echo e(autoSelect('nama', Request::input('opsi'))); ?>>Nama</option>
                                <option value="tnkt" <?php echo e(autoSelect('tnkt', Request::input('opsi'))); ?>>Tingkat</option>
                                <option value="almt" <?php echo e(autoSelect('almt', Request::input('opsi'))); ?>>Alamat</option>
                            </select>
                            <input type="text" value="<?php echo e(Request::input('q')); ?>" class="form-control" name="q" placeholder="Cari.." style="display: inline; width: 50%">
                        <button type="submit" class="btn btn-default" title="Klik untuk mulai mencari.."><i class="fa fa-search"></i></button>
                    </form>

                        </div>
                    </div>
                    <div class="col-md-6 no-padding" style="text-align: right;">
                        <div class="row">
                          <a href="<?php echo e(route('rekap_data_sekolah')); ?>" class="btn btn-default"><i class="fa fa-plus"></i> REKAP DATA</a>
                            <a href="<?php echo e(route('tambah_sekolah')); ?>" class="btn btn-default"><i class="fa fa-plus"></i> TAMBAH DATA</a>
                        </div>
                    </div>
                    <br><br>
                   <table class="table table-bordered table-responsive table-striped  table-hover">
                       <thead>
                           <tr>
                               <th width="20px">NO</th>
                               <th>NAMA</th>
                               <th width="50px">TINGKAT</th>
                               <th width="40%">ALAMAT</th>
                               <th width="10%">OPSI</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php $__empty_1 = true; foreach($data_sekolah as $data): $__empty_1 = false; ?>
                           <?php  $no++  ?>
                           <tr>
                               <td><?php echo e($no); ?></td>
                               <td><a href="<?php echo e(url('data-guru?sklh_id=' . $data->id)); ?>"><?php echo e($data->nama); ?></a></td>
                               <td><?php echo e($data->tingkat); ?></td>
                               <td><?php echo e($data->alamat); ?></td>
                               <td>
                                   <a class="btn btn-primary btn-sm" title="Ubah data"   href="<?php echo e(url('ubah-sekolah/' . $data->id)); ?>"><i class="fa fa-pencil"></i></a>
                                   <a onclick="return confirm('Hapus Data Ini?')"  href="<?php echo e(url('hapus-sekolah/' . $data->id)); ?>" title="Hapus" class="btn btn-danger btn-sm" onclick="return confirm('Hapus Nih?');" title="Hapus"><i class="fa fa-trash"></i></a>
                               </td>
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
                   <?php echo $data_sekolah->links(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>