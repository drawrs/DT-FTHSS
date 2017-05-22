<?php $__env->startSection('site_title', 'Tambah Sekolah'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php echo $__env->make('includes.notif', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <table class="table table-responsive">
                    <form action="<?php echo e(url('tambah-sekolah')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                  
                        <tr>
                            <td>
                                Nama Sekolah
                            </td>
                            <td><input type="text" name="nama" class="form-control" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>
                                Tingkat
                            </td>
                            <td>
                                <select name="tingkat" id="" class="form-control">
                                   <?php foreach(getEnum(new App\Sekolah, 'tingkat') as $m_key => $m_val): ?>
                                        <option value="<?php echo e($m_val); ?>"><?php echo e($m_val); ?></option>
                                   <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Kota
                            </td>
                            <td>
                                <select name="kota_id" id="" class="form-control select2">
                                   <?php foreach(App\Kota::all() as $kota): ?>
                                        <option value="<?php echo e($kota->id); ?>"><?php echo e($kota->name); ?></option>
                                   <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Alamat Sekolah
                            </td>
                            <td><textarea class="form-control" name="alamat"></textarea></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="checkbox" name="tambah_lagi"> Saya ingin menambahkan data lagi
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> SIMPAN</button>
                            </td>
                        </tr>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bottscript'); ?>
<script>
    $(function() {
        $('.select2').select2();
        $('#btnUbah').click(function(event) {
            /* Act on the event */
            $('form#ubahsekolah').submit();
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>