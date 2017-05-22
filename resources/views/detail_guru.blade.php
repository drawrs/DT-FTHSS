@extends('layouts.app')
@section('site_title', $guru->detail->nama)
@section('content')
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
                                    <a href="{{url('ubah-guru/' . $guru->id)}}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> ubah</a>
                                    <a onclick="return confirm('Hapus Data Ini?')"  href="{{url('hapus-guru/' . $guru->id)}}" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> hapus</a>
                                </div>
                                <img src="{{userPhoto($guru->detail->foto)}}" alt="" height="400px">
                            </td>
                        </tr>
                        <tr>
                            <td width="200px">
                                Nama
                            </td>
                            <td>:</td>
                            <td>
                                {{$guru->detail->nama}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Jenis Kelamin
                            </td>
                            <td>:</td>
                            <td>
                                {{$guru->detail->jk}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tempat Lahir
                            </td>
                            <td>:</td>
                            <td>
                                {{$guru->detail->kota->name}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Program
                            </td>
                            <td>:</td>
                            <td>
                                {{$guru->detail->prog}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Jurusan
                            </td>
                            <td>:</td>
                            <td>
                                {{$guru->detail->jurusan}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tugas/Pekerjaan
                            </td>
                            <td>:</td>
                            <td>
                                {{$guru->tugas->nama}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Pejabat Yang Mengangkat
                            </td>
                            <td>:</td>
                            <td>
                                {{$guru->detail->pejabat}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                No.Surat
                            </td>
                            <td>:</td>
                            <td>
                                {{$guru->detail->no_surat}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tgl.Surat
                            </td>
                            <td>:</td>
                            <td>
                                {{readDate($guru->detail->tgl_surat)}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tgl.Kerja
                            </td>
                            <td>:</td>
                            <td>
                                {{readDate($guru->detail->tmt_kerja)}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Status
                            </td>
                            <td>:</td>
                            <td>
                                {{$guru->detail->status}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                NUPTK
                            </td>
                            <td>:</td>
                            <td>
                                {{$guru->detail->nuptk}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                No.Sertifikasi
                            </td>
                            <td>:</td>
                            <td>
                                {{$guru->detail->no_sertifikasi}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                No.NRG
                            </td>
                            <td>:</td>
                            <td>
                                {{$guru->detail->no_nrg}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Asal Sekolah
                            </td>
                            <td>:</td>
                            <td>
                                <a href="{{url('data-guru?sklh_id=' . $guru->sekolah->id)}}">{{$guru->sekolah->nama}}</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Alamat Rumah
                            </td>
                            <td>:</td>
                            <td>
                                {{$guru->detail->alamat}}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
