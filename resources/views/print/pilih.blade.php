@extends('layouts.app')
@section('site_title', 'Laporan')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Apa yang ingin anda Cetak ?</div>
                <div class="panel-body">
                    <form action="{{route('print.data')}}" method="get">
                    {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="radio" name="type_cetak" value="data_guru"> REKAP DATA GURU
                        </div>
                        <div class="form-group">
                            <input type="radio" name="type_cetak" value="r_sekolah"> REKAP DATA SEKOLAH
                        </div>
                        <div class="form-group">
                            <input type="radio" name="type_cetak" value="r_penerima"> REKAP DATA PENERIMA
                        </div>
                        <div class="form-group">
                            <label for="">Pilih Tahun</label>
                            <select name="tahun" id="" class="form-control">
                                @for($i=date("Y")+1; $i >= (date("Y")-70); $i--)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-default"><i class="fa fa-print"></i> Lanjutkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
