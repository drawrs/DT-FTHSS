@extends('layouts.app')
@section('site_title', $sekolah->nama)
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    @include('includes.notif')
                    <table class="table table-responsive">
                    <form action="{{url('update-sekolah')}}" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{$sekolah->id}}">
                        <tr>
                            <td>
                                Nama Sekolah
                            </td>
                            <td><input type="text" name="nama" value="{{$sekolah->nama}}" class="form-control" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>
                                Tingkat
                            </td>
                            <td>
                                <select name="tingkat" id="" class="form-control">
                                   @foreach(getEnum(new App\Sekolah, 'tingkat') as $m_key => $m_val)
                                        <option value="{{$m_val}}" {{autoSelect($sekolah->tingkat, $m_val)}}>{{$m_val}}</option>
                                   @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Kota
                            </td>
                            <td>
                                <select name="kota_id" id="" class="form-control">
                                   @foreach(App\Kota::all() as $kota)
                                        <option value="{{$kota->id}}" {{autoSelect($sekolah->kota_id, $kota->id)}}>{{$kota->name}}</option>
                                   @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Alamat Sekolah
                            </td>
                            <td><textarea class="form-control" name="alamat">{{$sekolah->alamat}}</textarea></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> SIMPAN</button>
                            </td>
                        </tr>
                        </form>
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
            $('form#ubahsekolah').submit();
        });
    });
</script>
@endsection