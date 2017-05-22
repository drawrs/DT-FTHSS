@extends('layouts.app')
@section('site_title', 'Halaman Utama')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Pilih Tahun</div>

                <div class="panel-body" align="center">
                @include('includes.notif')
                   <div class="post">
                   <p>Silahkan pilih tahun data yang akan di rekap</p>
                       <form action="{{route('post.simpan_rekap_sk')}}" method="post">
                       {!! csrf_field() !!}
                       <div class="form-group">
                           <select name="tahun" id="" class="form-control" style="display: inline; width: 20%">
                               @for($i=date("Y")+1; $i >= (date("Y")-70) ; $i--)
                                <option value="{{$i}}">{{$i}}</option>
                               @endfor
                           </select>
                           <button class="btn btn-success"><i class="fa fa-save"></i> SIMPAN</button>
                       </div>
                   </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
