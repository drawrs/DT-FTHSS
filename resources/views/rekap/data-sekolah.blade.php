@extends('layouts.app')
@section('site_title', 'REKAPITULASI')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">TABLE REKAPITULASI : <select name="" id="pilihTahun" class="form-control" style="display: inline;width: 30%">
                                <option value="">-- Pilih tahun -- </option>
                                @for($i= date("Y")+1; $i >= (date("Y") - 30) ; $i--)
                                <option value="{{$i}}" {{autoSelect(Request::input('tahun'), $i)}}>{{$i}}</option>
                                @endfor
                              </select>
                              
                              </div>

                <div class="panel-body">
                @if($data->count() > 0)
                <a class="btn btn-danger btn-sm pull-right" onclick="return confirm('Anda yakin ? Semua data rekapitulasi tahun {{$tahun}} akan di Hapus !')" href="{{route('delete.rekap_sekolah', ['tahun' => $tahun])}}" data-toggle="tooltip" data-placement="top" title="Hapus data rekapitulasi tahun {{$tahun}}"><i class="fa fa-trash"></i> Hapus Rekap</a>
                @endif
                @include('includes.notif')
                <div class="col-md-6 no-padding">
                    <div class="row">
                        
                        <form action="{{url_now()}}" method="GET">
                            <select name="opsi" id="" class="form-control" style="display: inline;width: 30%">
                                <option value="nama" {{ autoSelect('nama', Request::input('opsi')) }}>Nama</option>
                                <option value="tnkt" {{ autoSelect('tnkt', Request::input('opsi')) }}>Tingkat</option>
                                <option value="almt" {{ autoSelect('almt', Request::input('opsi')) }}>Alamat</option>
                            </select>
                            <input type="text" value="{{Request::input('q')}}" class="form-control" name="q" placeholder="Cari.." style="display: inline; width: 50%">
                        <button type="submit" class="btn btn-default" title="Klik untuk mulai mencari.."><i class="fa fa-search"></i></button>
                    </form>
                    <br>
                    </div>

                </div>
                    <table class="table table-striped table-responsive table-bordered">
                        <thead>
                            <tr valign="center">
                                <th rowspan="2">NO</th>
                                <th  rowspan="2">NAMA SEKOLAH</th>
                                <th colspan="3">JUMLAH PENERIMA</th>
                               <th rowspan="2">KETERANGAN</th>
                            </tr>
                            <tr>
                                <th>GTY</th>
                                <th>PTY</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                @php 
                                $no = 1;
                                $t_gty = 0;
                                $t_pty = 0;
                                $t_all = 0;
                                @endphp
                                <form action="" method="POST">
                                @forelse($data->paginate(50) as $data)
                                    @php
                                        $t_gty = $guru->whereHas('detail', function($e) {
                                                         $e->where(['status' => 'GTY', 'status_guru' => 'aktif']);
                                                    })->where(['sekolah_id' => $data->sekolah_id, 'tahun' => $tahun])->count();
                                            
                                        $t_pty = $guru->whereHas('detail', function($e) {
                                                         $e->where(['status' => 'PTY', 'status_guru' => 'aktif']);
                                                    })->where(['sekolah_id' => $data->sekolah_id, 'tahun' => $tahun])->count();
                                        $t_all = $t_gty + $t_pty;
                                    @endphp
                                    {!!csrf_field()!!}
                                    <input type="hidden" name="id[]" value="{{$data->id}}">
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td><a href="{{url('data-guru?sklh_id=' . $data->sekolah->id)}}" target="_blank">{{$data->sekolah->nama}}</a></td>
                                    <td>{{$t_gty}}</td>
                                    <td>{{$t_pty}}</td>
                                    <td>{{$t_all}}</td>
                                    <td><input type="text" name="ket[]" class="form-control" placeholder="keterangan.." value="{{$data->ket}}"></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" align="center"><i><strong>Maaf, tidak ada data untuk ditampilkan</strong></i></td>
                                </tr>
                                @endforelse
                        </tbody>
                    </table>
                    {!! $data->paginate(50)->links() !!}
                        <button type="submit" class="btn btn-warning pull-right"><i class="fa fa-save"></i> SIMPAN PERUBAHAN</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('bottscript')
<script>
  $(document).ready(function() {
    $('#pilihTahun').change(function(event) {
      /* Act on the event */
      var tahun = $(this).val();

      window.location.href = '?tahun=' + tahun;
    });
  });
</script>
@endsection
