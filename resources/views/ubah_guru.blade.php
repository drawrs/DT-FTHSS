@extends('layouts.app')
@section('site_title', $guru->detail->nama)
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    @include('includes.notif')
                    <table class="table table-responsive">
                        <tr>
                            <td colspan="3"  align="center" style="border: none;">
                                <div class="pull-left">
                                    <button class="btn btn-primary btn-sm" onclick="window.history.back()"><i class="fa fa-arrow-left"></i> kembali</button>
                                </div>
                                <div class="pull-right">
                                    <button class="btn btn-success btn-sm" id="btnUbah"><i class="fa fa-save"></i> simpan perubahan</button>
                                    <!-- <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> hapus</button> -->
                                </div>
                                <a href="{{userPhoto($guru->detail->foto)}}"><img src="{{userPhoto($guru->detail->foto)}}" alt=""  height="200px" title="{{$guru->detail->nama}}"></a>
                            </td>
                        </tr>
                        <!-- Form open -->
                        <form action="{{route('post.update_guru')}}" method="post" id="ubahGuru" enctype="multipart/form-data">
                        {!!csrf_field()!!}
                        <input type="hidden" name="id" value="{{$guru->id}}">
                        <tr>
                            <td colspan="3" align="right">
                                <b>Data tahun </b><select name="tahun" id="">
                                    @for($i=date("Y")+1; $i >= (date("Y")-70); $i--)
                                    <option value="{{$i}}" {{autoSelect($i, $guru->tahun)}}>{{$i}}</option>
                                    @endfor
                                </select>
                            </td>
                        </tr>
                        <tr>
                        
                            <td width="200px">
                                Nama
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control" name="nama" value="{{$guru->detail->nama}}">
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
                            <input type="radio" value="L" name="jk" {{autoChecked($guru->detail->jk, 'L')}}> Laki-laki
                            <input type="radio" value="P" name="jk" {{autoChecked($guru->detail->jk, 'P')}}> Perempuan
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tempat Lahir
                            </td>
                            <td>:</td>
                            <td>
                                <select name="tmp_lahir_id" id="" class="form-control select2">
                                @foreach(App\Kota::all() as $kota)
                                <option value="{{$kota->id}}" {{autoSelect($guru->detail->kota->id, $kota->id)}}>{{$kota->name}}</option>
                                @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Program
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control" name="prog"value="{{$guru->detail->prog}}">
                               
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Jurusan
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control" name="jurusan" value="{{$guru->detail->jurusan}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tugas/Pekerjaan
                            </td>
                            <td>:</td>
                            <td>
                                <select name="tugas_id" id="" class="form-control">
                                    @foreach(App\Tugas::all() as $tugas)
                                    <option value="{{$tugas->id}}" {{autoSelect($guru->tugas->id, $tugas->id)}}>{{$tugas->nama}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Pejabat Yang Mengangkat
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" name="pejabat" class="form-control" value="{{$guru->detail->pejabat}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                No.Surat
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" name="no_surat" class="form-control" value="{{$guru->detail->no_surat}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                No.Telp / HP
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" name="no_telp" class="form-control" value="{{$guru->detail->no_telp}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tgl.Surat
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" name="tgl_surat" class="form-control" value="{{readDate($guru->detail->tgl_surat)}}" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tmt.Kerja
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text"  name="tmt_kerja" class="form-control" value="{{readDate($guru->detail->tmt_kerja)}}" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Status
                            </td>
                            <td>:</td>
                            <td>
                                 <select name="status" id="" class="form-control">
                                   @foreach(getEnum(new App\Guru, 'status') as $m_key => $m_val)
                                        <option value="{{$m_val}}" {{autoSelect($guru->detail->status, $m_val)}}>{{$m_val}}</option>
                                   @endforeach
                                </select>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                NUPTK
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" name="nuptk" class="form-control" value="{{$guru->detail->nuptk}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                No.Sertifikasi
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" name="no_sertifikasi" class="form-control" value="{{$guru->detail->no_sertifikasi}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                No.NRG
                            </td>
                            <td>:</td>
                            <td>
                                <input type="text" name="no_nrg" class="form-control" value="{{$guru->detail->no_nrg}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Asal Sekolah
                            </td>
                            <td>:</td>
                            <td>
                            <select name="sekolah_id" id="" class="form-control select2">
                                @foreach(App\Sekolah::all() as $sekolah)
                                <option value="{{$sekolah->id}}" {{autoSelect($guru->sekolah->id, $sekolah->id)}}>{{$sekolah->nama}}</option>
                                @endforeach
                            </select>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat Lengkap</td>
                            <td>:</td>
                            <td>
                                <textarea name="alamat" id="" rows="3" class="form-control">{{$guru->detail->alamat}}</textarea>
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
@endsection
@section('bottscript')
<script>
    $(function() {
        $('#btnUbah').click(function(event) {
            /* Act on the event */
            $('form#ubahGuru').submit();
        });
        $('.select2').select2();
    });
</script>
@endsection