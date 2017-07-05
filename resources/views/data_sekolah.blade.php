@extends('layouts.app')
@section('site_title', 'DATA SEKOLAH')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">DATA SEKOLAH TERDAFTAR</div>

                <div class="panel-body">
                    <div class="col-md-6 no-padding">
                        <div class="row">
                        @include('includes.notif')
                            <form action="">
                            <select name="opsi" id="" class="form-control" style="display: inline;width: 30%">
                                <option value="nama" {{ autoSelect('nama', Request::input('opsi')) }}>Nama</option>
                                <option value="tnkt" {{ autoSelect('tnkt', Request::input('opsi')) }}>Tingkat</option>
                                <option value="almt" {{ autoSelect('almt', Request::input('opsi')) }}>Alamat</option>
                            </select>
                            <input type="text" value="{{Request::input('q')}}" class="form-control" name="q" placeholder="Cari.." style="display: inline; width: 50%">
                        <button type="submit" class="btn btn-default" title="Klik untuk mulai mencari.."><i class="fa fa-search"></i></button>
                    </form>

                        </div>
                    </div>
                    <div class="col-md-6 no-padding" style="text-align: right;">
                        <div class="row">
                          <a href="{{route('rekap_data_sekolah') }}" class="btn btn-default"><i class="fa fa-plus"></i> REKAP DATA</a>
                            <a href="{{route('tambah_sekolah') }}" class="btn btn-default"><i class="fa fa-plus"></i> TAMBAH DATA</a>
                        </div>
                    </div>
                    <br><br>
                   <table class="table table-bordered table-responsive table-striped  table-hover">
                       <thead>
                           <tr>
                               <th width="20px">NO</th>
                               <th>NAMA</th>
                               <th width="50px">TINGKAT</th>
                               <th width="40%">ALAMAT</th>
                               <th width="10%">OPSI</th>
                           </tr>
                       </thead>
                       <tbody>
                           @forelse($data_sekolah as $data)
                           @php $no++ @endphp
                           <tr>
                               <td>{{$no}}</td>
                               <td><a href="{{url('data-guru?sklh_id=' . $data->id)}}">{{$data->nama}}</a></td>
                               <td>{{$data->tingkat}}</td>
                               <td>{{$data->alamat}}</td>
                               <td>
                                   <a class="btn btn-primary btn-sm" title="Ubah data"   href="{{url('ubah-sekolah/' . $data->id)}}"><i class="fa fa-pencil"></i></a>
                                   <a onclick="return confirm('Hapus Data Ini?')"  href="{{url('hapus-sekolah/' . $data->id)}}" title="Hapus" class="btn btn-danger btn-sm" onclick="return confirm('Hapus Nih?');" title="Hapus"><i class="fa fa-trash"></i></a>
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
                   {!! $data_sekolah->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
