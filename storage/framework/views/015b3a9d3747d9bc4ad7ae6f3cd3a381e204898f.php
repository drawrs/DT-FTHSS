<?php $__env->startSection('site_title', $guru->detail->nama); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-responsive">
                        <tr>
                            <td colspan="3"  align="center" style="border: none;">
                                <div class="pull-left">
                                    <button class="btn btn-primary btn-sm" onclick="window.history.back()"><i class="fa fa-arrow-left"></i> kembali</button>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo e(url('ubah-guru/' . $guru->id)); ?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> ubah</a>
                                    <a onclick="return confirm('Hapus Data Ini?')"  href="<?php echo e(url('hapus-guru/' . $guru->id)); ?>" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> hapus</a>
                                </div>
                                <img src="<?php echo e(userPhoto($guru->detail->foto)); ?>" alt="" height="400px">
                            </td>
                        </tr>
                        <tr>
                            <td width="200px">
                                Nama
                            </td>
                            <td>:</td>
                            <td>
                                <?php echo e($guru->detail->nama); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Jenis Kelamin
                            </td>
                            <td>:</td>
                            <td>
                                <?php echo e($guru->detail->jk); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tempat Lahir
                            </td>
                            <td>:</td>
                            <td>
                                <?php echo e($guru->detail->kota->name); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Program
                            </td>
                            <td>:</td>
                            <td>
                                <?php echo e($guru->detail->prog); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Jurusan
                            </td>
                            <td>:</td>
                            <td>
                                <?php echo e($guru->detail->jurusan); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tugas/Pekerjaan
                            </td>
                            <td>:</td>
                            <td>
                                <?php echo e($guru->tugas->nama); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Pejabat Yang Mengangkat
                            </td>
                            <td>:</td>
                            <td>
                                <?php echo e($guru->detail->pejabat); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                No.Surat
                            </td>
                            <td>:</td>
                            <td>
                                <?php echo e($guru->detail->no_surat); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tgl.Surat
                            </td>
                            <td>:</td>
                            <td>
                                <?php echo e(readDate($guru->detail->tgl_surat)); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tgl.Kerja
                            </td>
                            <td>:</td>
                            <td>
                                <?php echo e(readDate($guru->detail->tmt_kerja)); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Status
                            </td>
                            <td>:</td>
                            <td>
                                <?php echo e($guru->detail->status); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                NUPTK
                            </td>
                            <td>:</td>
                            <td>
                                <?php echo e($guru->detail->nuptk); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                No.Sertifikasi
                            </td>
                            <td>:</td>
                            <td>
                                <?php echo e($guru->detail->no_sertifikasi); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                No.NRG
                            </td>
                            <td>:</td>
                            <td>
                                <?php echo e($guru->detail->no_nrg); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Asal Sekolah
                            </td>
                            <td>:</td>
                            <td>
                                <a href="<?php echo e(url('data-guru?sklh_id=' . $guru->sekolah->id)); ?>"><?php echo e($guru->sekolah->nama); ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Alamat Rumah
                            </td>
                            <td>:</td>
                            <td>
                                <?php echo e($guru->detail->alamat); ?>

                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>