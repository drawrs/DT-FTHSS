@extends('print.main')
@section('title', 'DATA TENAGA HONORER SEKOLAH SWASTA  ' . Request::get('tahun'))
@section('content')
<div class="print-panel">
    <button id="btnPrint" onclick="window.print()">CETAK PDF</button>
    <button id="btnExportExcel">EKSPORT EXCEL</button>
    <form action="">
                            Pilih Tingkat : <select name="tnkt" id="tnkt">
                                              <option value="all">Semua</option>
                                              <option value="TK" {{autoSelect(Request::input('tnkt'), 'TK')}}>TK</option>
                                              <option value="SD" {{autoSelect(Request::input('tnkt'), 'SD')}}>SD</option>
                                              <option value="SMP" {{autoSelect(Request::input('tnkt'), 'SMP')}}>SMP</option>
                                              <option value="SMA" {{autoSelect(Request::input('tnkt'), 'SMA')}}>SMA</option>
                                            </select>
                                            <br>
                            <span id="pilih_sekolah">Pilih Sekolah : <select name="sklh_id" id="sklh_id" class="form-control select2">
                            <option value="all">Semua</option>
                              @foreach(App\Sekolah::all() as $sklh)
                                <option value="{{$sklh->id}}">{{$sklh->nama}}</option>
                              @endforeach
                            </select></span>
                            <br>
                            Pilih Tahun : <select name="" id="tahun" class="form-control">
                                <option value="">-- Pilih tahun -- </option>
                                @for($i= date("Y"); $i >= (date("Y") - 30) ; $i--)
                                <option value="{{$i}}" {{autoSelect(Request::input('tahun'), $i)}}>{{$i}}</option>
                                @endfor
                              </select>
                    </form>
                        <button type="submit" id="btnTampil" class="btn btn-default" title="Klik untuk mulai mencari..">Tampilkan</button>
</div>
<div id="table_wrapper">
  <table border="1">
<caption>
  DATA TENAGA HONORER SEKOLAH SWASTA       <br>                     
DI LINGKUNGAN DINAS PENDIDIKAN KOTA CIREBON  <br>                         
TAHUN {{Request::get('tahun')}}                            

</caption>
                       <thead>
                           <tr>
                               <th>NO</th>
                               <th>NAMA</th>
                               <th>JK</th>
                               <th>TEMPAT LAHIR</th>
                               <th>TGL.LAHIR</th>
                               <th>TELP/HP</th>
                               <th>PROG</th>
                               <th>JURUSAN</th>
                               <th>TUGAS/PEKERJAAN</th>
                               <th>PEJABAT YANG MENGANGKAT</th>
                               <th>NO.SURAT</th>
                               <th>TGL.SURAT</th>
                               <th>TMT KERJA</th>
                               <th>STATUS</th>
                               <th>STATUS GURU</th>
                               <th>NUPTK</th>
                               <th>NO NRG</th>
                               <th>NO SERTIFIKASI</th>
                               <th>ASAL SEKOLAH</th>
                               <th>ALAMAT</th>
                           </tr>
                       </thead>
                       <tbody>
                           @forelse($data_guru as $guru)
                           @php $no++ @endphp
                           <tr>

                               <td>{{$no}}</td>
                               <td>{{$guru->detail->nama}}</td>
                               <td>{{$guru->detail->jk}}</td>
                               <td>{{$guru->detail->kota->name}}</td>
                               <td>{{$guru->detail->tgl_lahir}}</td>
                               <td>{{$guru->detail->no_telp}}</td>
                               <td>{{$guru->detail->prog}}</td>
                               <td>{{$guru->detail->jurusan}}</td>
                               <td>{{$guru->tugas->nama}}</td>
                               <td>{{$guru->detail->pejabat}}</td>
                               <td>{{$guru->detail->no_surat}}</td>
                               <td>{{$guru->detail->tgl_surat}}</td>
                               <td>{{$guru->detail->tmt_kerja}}</td>
                               <td>{{$guru->detail->status}}</td>
                               <td>{{$guru->detail->status_guru}}</td>
                               <td>{{$guru->detail->nuptk}}</td>
                               <td>{{$guru->detail->no_nrg}}</td>
                               <td>{{$guru->detail->no_sertifikasi}}</td>
                               <td>{{$guru->sekolah->nama}}</td>
                               <td>{{$guru->detail->alamat}}</td>
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
</div>

@endsection
@section('bottscript')

<script>
  $(document).ready(function() {
    $('.select2').select2();
    $('#btnTampil').click(function(event) {
      /* Act on the event */
      var tnkt = $('#tnkt').val();
      var sklh_id = $('#sklh_id').val();
      var tahun = $('#tahun').val();
      window.location.href = 'print-data?type_cetak={{Request::get('type_cetak')}}&tahun=' + tahun + '&tnkt=' + tnkt +'&sklh_id=' + sklh_id ;
    });
    
  });
</script>
@endsection
