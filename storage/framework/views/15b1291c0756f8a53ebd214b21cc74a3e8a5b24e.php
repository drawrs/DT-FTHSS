<?php $__env->startSection('site_title', 'Halaman Utama'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Pilih Tahun</div>

                <div class="panel-body" align="center">
                <?php echo $__env->make('includes.notif', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                   <div class="post">
                   <p>Silahkan pilih tahun data yang akan di rekap</p>
                       <form action="<?php echo e(route('post.simpan_rekap_sk')); ?>" method="post">
                       <?php echo csrf_field(); ?>

                       <div class="form-group">
                           <select name="tahun" id="" class="form-control" style="display: inline; width: 20%">
                               <?php for($i=date("Y")+1; $i >= (date("Y")-70) ; $i--): ?>
                                <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                               <?php endfor; ?>
                           </select>
                           <button class="btn btn-success"><i class="fa fa-save"></i> SIMPAN</button>
                       </div>
                   </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>