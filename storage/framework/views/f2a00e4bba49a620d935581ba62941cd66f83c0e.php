<?php $__env->startSection('site_title', 'Halaman Utama'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">FORUM TENAGA HONORER SEKOLAH SWASTA</div>

                <div class="panel-body">
                    <div style="text-align: center">
                        <img src="<?php echo e(url('uploads/fthss.png')); ?>" alt="" align="center">
                        <h3>Jalan Karya Mulya No.20 Gang Gua Sininih II RT 04 RW 11 Kota Cirebon</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>