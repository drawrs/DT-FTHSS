<?php $__env->startSection('site_title', "Tambah Data"); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php echo $__env->make('includes.notif', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <table class="table table-responsive">
                        
                        <!-- Form open -->
                        <form action="<?php echo e(route('post.insert_guru')); ?>" method="post" id="ubahGuru" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                       
                        <tr>
                            <td colspan="3">
                                <b>Data tahun </b><select name="tahun" id="">
                                    <?php for($i=date("Y")+1; $i >= (date("Y")-70); $i--): ?>
                                    <option value="<?php echo e($i); ?>" ><?php echo e($i); ?></option>
                                    <?php endfor; ?>
                                </select>
                                <br>
                                <span><small>*) Data ini akan dikelompokan berdasarkan tahun yang Anda pilih di atas</small></span>
                            </td>
                        </tr>
                        <tr>
                        
                            <td width="200px">
                                Nama
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control" name="nama">
                            </td>
                        </tr>
                        <tr>
                        
                            <td width="200px">
                                Foto
                            </td>
                            <td>:</td>
                            <td>
                                <input type="file" class="form-control" name="foto_user">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Jenis Kelamin
                            </td>
                            <td>:</td>
                            <td>
                            <input type="radio" value="L" name="jk"> Laki-laki
                            <input type="radio" value="P" name="jk"> Perempuan
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tanggal Lahir
                            </td>
                            <td>:</td>
                            <td>
                            <input type="text" name="tgl_lahir" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tempat Lahir
                            </td>
                            <td>:</td>
                            <td>
                                <select name="tmp_lahir_id" id="tmp_lahir" class="form-control select2">
                                <?php foreach(App\Kota::all() as $kota): ?>
                                    <option value="<?php echo e($kota->id); ?>"><?php echo e($kota->name); ?></option>
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
                                <input type="text" class="form-control" name="prog">
                               
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Jurusan
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control" name="jurusan">
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
                                    <option value="<?php echo e($tugas->id); ?>"><?php echo e($tugas->nama); ?></option>
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
                                <input type="text" name="pejabat" class="form-control" >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                No.Surat
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" name="no_surat" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tgl.Surat
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" name="tgl_surat" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tmt.Kerja
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text"  name="tmt_kerja" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
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
                                        <option value="<?php echo e($m_val); ?>"><?php echo e($m_val); ?></option>
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
                                <input type="text" name="nuptk" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                No.Sertifikasi
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" name="no_sertifikasi" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                No.NRG
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" name="no_nrg" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                No.Telp / HP
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" name="no_telp" class="form-control">
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
                                <option value="<?php echo e($sekolah->id); ?>"><?php echo e($sekolah->nama); ?></option>
                                <?php endforeach; ?>
                            </select>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat Lengkap</td>
                            <td>:</td>
                            <td>
                                <textarea name="alamat" id="" rows="3" class="form-control"></textarea>
                            </td>
                        </tr>
                        <tr>
                        <td colspan="2"></td>
                            <td>
                                <input type="checkbox" name="tambah_lagi"> Saya ingin menambahkan data lagi
                                <br>
                                <br>
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
        $(".select2").select2();
    });
</script>
<script>
    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>