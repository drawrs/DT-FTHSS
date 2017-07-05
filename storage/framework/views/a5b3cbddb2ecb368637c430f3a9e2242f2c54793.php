<?php $__env->startSection('site_title', $guru->detail->nama); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php echo $__env->make('includes.notif', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <table class="table table-responsive">
                        <tr>
                            <td colspan="3"  align="center" style="border: none;">
                                <div class="pull-left">
                                    <button class="btn btn-primary btn-sm" onclick="window.history.back()"><i class="fa fa-arrow-left"></i> kembali</button>
                                    <a href="<?php echo e(url('print-data?type_cetak=data_guru&tahun='. $guru->tahun .'&id_guru='. $guru->guru_id)); ?>" class="btn btn-default"><i class="fa fa-print"></i> cetak</a>
                                </div>
                                <div class="pull-right">
                                    <button class="btn btn-success btn-sm" id="btnUbah"><i class="fa fa-save"></i> simpan perubahan</button>
                                    <!-- <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> hapus</button> -->
                                </div>
                                <a href="<?php echo e(url(userPhoto($guru->detail->foto))); ?>"><img src="<?php echo e(userPhoto($guru->detail->foto)); ?>" alt=""  height="200px" title="<?php echo e($guru->detail->nama); ?>"></a>
                            </td>
                        </tr>
                        <!-- Form open -->
                        <form action="<?php echo e(route('post.update_guru')); ?>" method="post" id="ubahGuru" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="id" value="<?php echo e($guru->id); ?>">
                        <tr>
                            <td colspan="3" align="right">
                                <b>Data tahun </b><select name="tahun" id="">
                                    <?php for($i=date("Y")+1; $i >= (date("Y")-70); $i--): ?>
                                    <option value="<?php echo e($i); ?>" <?php echo e(autoSelect($i, $guru->tahun)); ?>><?php echo e($i); ?></option>
                                    <?php endfor; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                        
                            <td width="200px">
                                Nama
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control" name="nama" value="<?php echo e($guru->detail->nama); ?>">
                            </td>
                        </tr>
                        <tr>
                        
                            <td width="200px">
                                Foto
                            </td>
                            <td>:</td>
                            <td>
                                <input type="file" class="form-control" name="foto_user">
                                <small>*) kosongkan jika tidak ingin merubah</small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Jenis Kelamin
                            </td>
                            <td>:</td>
                            <td>
                            <input type="radio" value="L" name="jk" <?php echo e(autoChecked($guru->detail->jk, 'L')); ?>> Laki-laki
                            <input type="radio" value="P" name="jk" <?php echo e(autoChecked($guru->detail->jk, 'P')); ?>> Perempuan
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tanggal Lahir
                            </td>
                            <td>:</td>
                            <td>
                            <input type="text" name="tgl_lahir" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" value="<?php echo e(readDate($guru->detail->tgl_lahir)); ?>" data-mask>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tempat Lahir
                            </td>
                            <td>:</td>
                            <td>
                                <select name="tmp_lahir_id" id="" class="form-control select2">
                                <?php foreach(App\Kota::all() as $kota): ?>
                                <option value="<?php echo e($kota->id); ?>" <?php echo e(autoSelect($guru->detail->kota->id, $kota->id)); ?>><?php echo e($kota->name); ?></option>
                                <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Program
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control" name="prog"value="<?php echo e($guru->detail->prog); ?>">
                               
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Jurusan
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control" name="jurusan" value="<?php echo e($guru->detail->jurusan); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tugas/Pekerjaan
                            </td>
                            <td>:</td>
                            <td>
                                <select name="tugas_id" id="" class="form-control">
                                    <?php foreach(App\Tugas::all() as $tugas): ?>
                                    <option value="<?php echo e($tugas->id); ?>" <?php echo e(autoSelect($guru->tugas->id, $tugas->id)); ?>><?php echo e($tugas->nama); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Pejabat Yang Mengangkat
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" name="pejabat" class="form-control" value="<?php echo e($guru->detail->pejabat); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                No.Surat
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" name="no_surat" class="form-control" value="<?php echo e($guru->detail->no_surat); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                No.Telp / HP
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" name="no_telp" class="form-control" value="<?php echo e($guru->detail->no_telp); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tgl.Surat
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" name="tgl_surat" class="form-control" value="<?php echo e(readDate($guru->detail->tgl_surat)); ?>" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tmt.Kerja
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text"  name="tmt_kerja" class="form-control" value="<?php echo e(readDate($guru->detail->tmt_kerja)); ?>" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Status
                            </td>
                            <td>:</td>
                            <td>
                                 <select name="status" id="" class="form-control">
                                   <?php foreach(getEnum(new App\Guru, 'status') as $m_key => $m_val): ?>
                                        <option value="<?php echo e($m_val); ?>" <?php echo e(autoSelect($guru->detail->status, $m_val)); ?>><?php echo e($m_val); ?></option>
                                   <?php endforeach; ?>
                                </select>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                NUPTK
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" name="nuptk" class="form-control" value="<?php echo e($guru->detail->nuptk); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                No.Sertifikasi
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" name="no_sertifikasi" class="form-control" value="<?php echo e($guru->detail->no_sertifikasi); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                No.NRG
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" name="no_nrg" class="form-control" value="<?php echo e($guru->detail->no_nrg); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Asal Sekolah
                            </td>
                            <td>:</td>
                            <td>
                            <select name="sekolah_id" id="" class="form-control select2">
                                <?php foreach(App\Sekolah::all() as $sekolah): ?>
                                <option value="<?php echo e($sekolah->id); ?>" <?php echo e(autoSelect($guru->sekolah->id, $sekolah->id)); ?>><?php echo e($sekolah->nama); ?></option>
                                <?php endforeach; ?>
                            </select>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat Lengkap</td>
                            <td>:</td>
                            <td>
                                <textarea name="alamat" id="" rows="3" class="form-control"><?php echo e($guru->detail->alamat); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                        <td colspan="2"></td>
                            <td>
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> SIMPAN</button>
                            </td>
                        </tr>
                        </form>
                        <!-- end form -->
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
        $('#btnUbah').click(function(event) {
            /* Act on the event */
            $('form#ubahGuru').submit();
        });
        $('.select2').select2();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>