<?php $__env->startSection('site_title', 'Laporan'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Apa yang ingin anda Cetak ?</div>
                <div class="panel-body">
                    <form action="<?php echo e(route('print.data')); ?>" method="get">
                    <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <input type="radio" name="type_cetak" value="data_guru"> REKAP DATA GURU
                        </div>
                        <div class="form-group">
                            <input type="radio" name="type_cetak" value="r_sekolah"> REKAP DATA SEKOLAH
                        </div>
                        <div class="form-group">
                            <input type="radio" name="type_cetak" value="r_penerima"> REKAP DATA PENERIMA
                        </div>
                        <div class="form-group">
                            <label for="">Pilih Tahun</label>
                            <select name="tahun" id="" class="form-control">
                                <?php for($i=date("Y")+1; $i >= (date("Y")-70); $i--): ?>
                                <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-default"><i class="fa fa-print"></i> Lanjutkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>