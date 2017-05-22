@extends('layouts.app')
@section('site_title', 'Data Guru')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">DATA TENAGA HONORER SEKOLAH SWASTA : <select name="" id="pilihTahun" class="form-control" style="display: inline;width: 30%">
                                <option value="">-- Pilih tahun -- </option>
                                @for($i= date("Y")+1; $i >= (date("Y") - 30) ; $i--)
                                <option value="{{$i}}" {{autoSelect(Request::input('tahun'), $i)}}>{{$i}}</option>
                                @endfor
                              </select></div>

                <div class="panel-body">
                @include('includes.notif')
                
                    <div class="col-md-6 no-padding">
                        <div class="row">
                            <form action="">
                            <select name="opsi" id="search" class="form-control" style="display: inline;width: 30%">
                                <option value="nama" {{ autoSelect('nama', Request::input('opsi')) }}>Nama</option>
                                <option value="no_nrg" {{ autoSelect('no_nrg', Request::input('opsi')) }}>NO NRG</option>
                                <option value="nuptk" {{ autoSelect('nuptk', Request::input('opsi')) }}>NUPTK</option>
                                <option value="no_sr" {{ autoSelect('no_sr', Request::input('opsi')) }}>NO SERTIFIKASI</option>
                                <option value="a_sklh" {{ autoSelect('a_sklh', Request::input('opsi')) }}>ASAL SEKOLAH</option>
                            </select>
                            <input type="text" id="keyword" value="{{Request::input('q')}}" class="form-control" name="q" placeholder="Cari.." style="display: inline; width: 50%">
                            <span id="pilih_sekolah"><select name="sklh_id" id="sklh_id" class="form-control select2" style="display: inline; width: 50%">
                              @foreach(App\Sekolah::all() as $sklh)
                                <option value="{{$sklh->id}}">{{$sklh->nama}}</option>
                              @endforeach
                            </select></span>
                        <button type="submit" class="btn btn-default" title="Klik untuk mulai mencari.."><i class="fa fa-search"></i></button>
                    </form>

                        </div>
                    </div>

                    <div class="col-md-6 no-padding" style="text-align: right;">
                        <div class="row">
                            <a href="{{route('tambah_guru')}}" class="btn btn-default"><i class="fa fa-plus"></i> TAMBAH DATA</a>
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
                           @forelse($data_guru as $guru)
                           @php $no++ @endphp
                           <tr>
                               <td>{{$no}}</td>
                               <td><a href="{{url('detail-guru/' . $guru->id)}}">{{$guru->detail->nama}}</a></td>
                               <td>{{$guru->detail->status}}</td>
                               <td>{{$guru->detail->no_nrg}}</td>
                               <td>{{$guru->detail->nuptk}}</td>
                               <td>{{$guru->detail->no_sertifikasi}}</td>
                               <td>{{$guru->sekolah->nama}}</td>
                               <td>
                                   <a href="{{url('ubah-guru/' . $guru->id)}}" class="btn btn-primary btn-xs"  data-toggle="tooltip" data-placement="left" title="Klik untuk menubah data"><i class="fa fa-pencil"></i></a>
                                   <a class="btn btn-danger btn-xs"  data-toggle="tooltip" data-placement="top" title="Hapus data" onclick="return confirm('Hapus Data Ini?')"  href="{{url('hapus-guru/' . $guru->id)}}" title="Hapus"><i class="fa fa-trash"></i></a>
                                   <button href="" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="right" title="Ubah status menjadi Aktif/Nonaktif/Mutasi" onclick="ubahModal('{{$guru->guru_id}}')"><i class="fa fa-external-link"></i></button>
                               </td>
                           </tr>
                           @empty
                           <tr>
                               <td colspan="7" align="center">
                                   <strong><i>Maaf, tidak ada data untuk ditampilkan!</i></strong>
                               </td>
                           </tr>
                           @endforelse
                       </tbody>
                   </table>
                   {!! $data_guru->links() !!}
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
    // select
    $(".select2").select2();
    $('#pilihTahun').change(function(event) {
      /* Act on the event */
      var tahun = $(this).val();

      window.location.href = '{{url('data-guru')}}?tahun=' + tahun;
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
@endsection