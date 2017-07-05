@if(Session::has('msg'))
<div class="alert alert-{{Session::get('type')}}">{!!Session::get('msg')!!}</div>
@endif
@if(Request::has('sklh_id'))
<div class="alert alert-info">Sekolah terpilih : <strong>{{$sklh->nama}}</strong></div>
@endif
@if(Request::has('opsi'))
<div class="alert alert-success">Menampilkan hasil untuk : "<strong>{{Request::input('q')}}</strong>"</div>
@endif
@if(Request::has('tahun'))
    <div class="alert alert-info">Menampilkan data Tahun - <strong>{{Request::get('tahun')}}</strong></div>
@endif