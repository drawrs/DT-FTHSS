<?php $__env->startSection('site_title', 'Data Guru'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">DATA TENAGA HONORER SEKOLAH SWASTA : <select name="" id="pilihTahun" class="form-control" style="display: inline;width: 30%">
                                <option value="">-- Pilih tahun -- </option>
                                <?php for($i= date("Y")+1; $i >= (date("Y") - 30) ; $i--): ?>
                                <option value="<?php echo e($i); ?>" <?php echo e(autoSelect(Request::input('tahun'), $i)); ?>><?php echo e($i); ?></option>
                                <?php endfor; ?>
                              </select></div>

                <div class="panel-body">
                <?php echo $__env->make('includes.notif', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                
                    <div class="col-md-6 no-padding">
                        <div class="row">
                            <form action="">
                            <select name="opsi" id="search" class="form-control" style="display: inline;width: 30%">
                                <option value="nama" <?php echo e(autoSelect('nama', Request::input('opsi'))); ?>>Nama</option>
                                <option value="no_nrg" <?php echo e(autoSelect('no_nrg', Request::input('opsi'))); ?>>NO NRG</option>
                                <option value="nuptk" <?php echo e(autoSelect('nuptk', Request::input('opsi'))); ?>>NUPTK</option>
                                <option value="no_sr" <?php echo e(autoSelect('no_sr', Request::input('opsi'))); ?>>NO SERTIFIKASI</option>
                                <option value="a_sklh" <?php echo e(autoSelect('a_sklh', Request::input('opsi'))); ?>>ASAL SEKOLAH</option>
                            </select>
                            <input type="text" id="keyword" value="<?php echo e(Request::input('q')); ?>" class="form-control" name="q" placeholder="Cari.." style="display: inline; width: 50%">
                            <span id="pilih_sekolah"><select name="sklh_id" id="sklh_id" class="form-control select2" style="display: inline; width: 50%">
                              <?php foreach(App\Sekolah::all() as $sklh): ?>
                                <option value="<?php echo e($sklh->id); ?>"><?php echo e($sklh->nama); ?></option>
                              <?php endforeach; ?>
                            </select></span>
                        <button type="submit" class="btn btn-default" title="Klik untuk mulai mencari.."><i class="fa fa-search"></i></button>
                    </form>

                        </div>
                    </div>

                    <div class="col-md-6 no-padding" style="text-align: right;">
                        <div class="row">
                            <a href="<?php echo e(route('tambah_guru')); ?>" class="btn btn-default"><i class="fa fa-plus"></i> TAMBAH DATA</a>
                        </div>
                    </div>
                     <br><br>
                   <table class="table table-bordered table-responsive table-striped table-hover">
                       <thead>
                           <tr>
                               <th>NO</th>
                               <th>NAMA</th>
                               <th>STATUS</th>
                               <th>NO REG</th>
                               <th>NUPTK</th>
                               <th>NO SERTIFIKASI</th>
                               <th>ASAL SEKOLAH</th>
                               <th>OPSI</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php $__empty_1 = true; foreach($data_guru as $guru): $__empty_1 = false; ?>
                           <?php  $no++  ?>
                           <tr>
                               <td><?php echo e($no); ?></td>
                               <td><a href="<?php echo e(url('detail-guru/' . $guru->id)); ?>"><?php echo e($guru->detail->nama); ?></a></td>
                               <td><?php echo e($guru->detail->status); ?></td>
                               <td><?php echo e($guru->detail->no_nrg); ?></td>
                               <td><?php echo e($guru->detail->nuptk); ?></td>
                               <td><?php echo e($guru->detail->no_sertifikasi); ?></td>
                               <td><?php echo e($guru->sekolah->nama); ?></td>
                               <td>
                                   <a href="<?php echo e(url('ubah-guru/' . $guru->id)); ?>" class="btn btn-primary btn-xs"  data-toggle="tooltip" data-placement="left" title="Klik untuk menubah data"><i class="fa fa-pencil"></i></a>
                                   
                                   <a class="btn btn-danger btn-xs"  data-toggle="tooltip" data-placement="top" title="Hapus data" onclick="return confirm('Hapus Data Ini?')"  href="<?php echo e(route('hapus_data_guru', ['id' => $guru->id])); ?>" title="Hapus"><i class="fa fa-trash"></i></a>
                                   <button href="" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="right" title="Ubah status menjadi Aktif/Nonaktif/Mutasi" onclick="ubahModal('<?php echo e($guru->guru_id); ?>')"><i class="fa fa-external-link"></i></button>
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
                   <?php echo $data_guru->links(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ubahModal" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Ubah Status Guru</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo e(route('ubah_mutasi')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <input type="hidden" name="guru_id" id="guru_id"> <!-- ID dari tabel guru -->
        <div class="form-group">
          <label for="">Pilih Status</label>
          <select name="status" id="pilihStatus" class="form-control">
            <?php foreach(getEnum(new App\Guru, 'status_guru') as $key => $val): ?>
            <option value="<?php echo e($val); ?>" <?php echo e(($val == 'nonaktif') ? "SELECTED":""); ?>><?php echo e($val); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
         <div class="form-group"  id="pilihSekolah" style="display: none;">
          <label for="">Pilih Sekolah</label>
          <select name="sekolah_id" class="form-control select2" style="width: 100%;">
            <?php foreach(App\Sekolah::all() as $sekolah): ?>
            <option value="<?php echo e($sekolah->id); ?>"><?php echo e($sekolah->nama); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button></form>
      </div>
    </div>
</div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bottscript'); ?>
<script>
  $(document).ready(function() {
    // select
    $(".select2").select2();
    $('#pilihTahun').change(function(event) {
      /* Act on the event */
      var tahun = $(this).val();

      window.location.href = '<?php echo e(url('data-guru')); ?>?tahun=' + tahun;
    });
    cekSelect();

    $('#search').change(function(event) {
      /* Act on the event */
          cekSelect();
    });
    $('#pilihStatus').change(function(event) {
          /* Act on the event */
          console.log("changet" + $(this).val());
          if ($(this).val() == 'aktif') {
            $('#pilihSekolah').show();
            //console.log("bukan nonaktif");
          } else {
            //console.log(" nonaktif");
            $('#pilihSekolah').hide();
          }
        });
  });
  function cekSelect(){

    if ($('#search').val() == 'a_sklh') {
      $('#pilih_sekolah').show();
      $('#keyword').hide();
      $('#sklh_id').attr('disabled', false);
    } else {
      $('#pilih_sekolah').hide();
      $('#keyword').show();
      $('#sklh_id').attr('disabled', true);
    }
  }

  function ubahModal(id){
    $('#guru_id').val(id);
    console.log(id);
    $('#ubahModal').modal('show');
  }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>