@extends('layouts.app')
@section('site_title', 'Data Mutasi')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">DATA MUTASI</div>

                <div class="panel-body">
                  @include('includes.notif')
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
                        @foreach($data->paginate(20) as $data)
                            <tr>
                               <td>1</td>
                               <td><a href="detail-guru/{{$data->guru->id}}">{{$data->nama}} </a></td>
                               <td>{{$data->status}}</td>
                               <td>{{$data->no_nrg}}</td>
                               <td>{{$data->guru->sekolah->nama}}</td>
                               <td>{{$data->status_guru}}</td>
                               <td>
                                   <button onclick="ubahModal('{{$data->id}}')" class="btn btn-primary btn-sm" title="Ubah data"><i class="fa fa-gear"></i> UBAH STATUS</button>
                               </td>
                           </tr>
                        @endforeach
                        </tbody>
                   </table>
                   {!! $data->paginate(20)->links() !!}
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
        <form action="{{ route('ubah_mutasi') }}" method="POST">
        {!! csrf_field() !!}
        <input type="hidden" name="guru_id" id="guru_id"> <!-- ID dari tabel guru -->
        <div class="form-group">
          <label for="">Pilih Status</label>
          <select name="status" id="pilihStatus" class="form-control">
            @foreach(getEnum(new App\Guru, 'status_guru') as $key => $val)
            <option value="{{$val}}" {{($val == 'nonaktif') ? "SELECTED":""}}>{{$val}}</option>
            @endforeach
          </select>
        </div>
         <div class="form-group"  id="pilihSekolah" style="display: none;">
          <label for="">Pilih Sekolah</label>
          <select name="sekolah_id" class="form-control select2" style="width: 100%;">
            @foreach(App\Sekolah::all() as $sekolah)
            <option value="{{$sekolah->id}}">{{$sekolah->nama}}</option>
            @endforeach
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
@endsection
@section('bottscript')
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
@endsection
