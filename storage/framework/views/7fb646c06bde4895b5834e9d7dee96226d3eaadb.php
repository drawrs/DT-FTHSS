<?php if(Session::has('msg')): ?>
<div class="alert alert-<?php echo e(Session::get('type')); ?>"><?php echo Session::get('msg'); ?></div>
<?php endif; ?>
<?php if(Request::has('sklh_id')): ?>
<div class="alert alert-info">Sekolah terpilih : <strong><?php echo e($sklh->nama); ?></strong></div>
<?php endif; ?>
<?php if(Request::has('opsi')): ?>
<div class="alert alert-success">Menampilkan hasil untuk : "<strong><?php echo e(Request::input('q')); ?></strong>"</div>
<?php endif; ?>
<?php if(Request::has('tahun')): ?>
    <div class="alert alert-info">Menampilkan data Tahun - <strong><?php echo e(Request::get('tahun')); ?></strong></div>
<?php endif; ?>