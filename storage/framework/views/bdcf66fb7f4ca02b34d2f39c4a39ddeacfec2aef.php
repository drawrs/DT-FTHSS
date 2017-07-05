<?php $__env->startSection('site_title', 'Data Mutasi'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">DATA MUTASI</div>

                <div class="panel-body">
                  <?php echo $__env->make('includes.notif', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                   <table class="table table-bordered table-responsive table-striped table-hover">
                       <thead>
                           <tr>
                               <th>NO</th>
                               <th>NAMA</th>
                               <th>STATUS</th>
                               <th>NO REG</th>
                               <th>ASAL SEKOLAH</th>
                               <th>STATUS MUTASI</th>
                               <th>OPSI</th>
                           </tr>
                       </thead>
                       <tbody>
                        <?php foreach($data->paginate(20) as $data): ?>
                            <tr>
                               <td>1</td>
                               <td><a href="detail-guru/<?php echo e($data->guru->id); ?>"><?php echo e($data->nama); ?> </a></td>
                               <td><?php echo e($data->status); ?></td>
                               <td><?php echo e($data->no_nrg); ?></td>
                               <td><?php echo e($data->guru->sekolah->nama); ?></td>
                               <td><?php echo e($data->status_guru); ?></td>
                               <td>
                                   <button onclick="ubahModal('<?php echo e($data->id); ?>')" class="btn btn-primary btn-sm" title="Ubah data"><i class="fa fa-gear"></i> UBAH STATUS</button>
                               </td>
                           </tr>
                        <?php endforeach; ?>
                        </tbody>
                   </table>
                   <?php echo $data->paginate(20)->links(); ?>

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
        <h4 class="modal-title" id="exampleModalLabel">Pilih Status Guru</h4>
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
        $('.select2').select2();
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
</script>
<script>
  function ubahModal(id){
    $('#guru_id').val(id);
     $('#ubahModal').modal('show');
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>