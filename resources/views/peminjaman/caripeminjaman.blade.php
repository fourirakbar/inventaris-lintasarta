@extends('layouts.lumino')
@section('content')
<section class="content">
<div class="col-xs-3"></div>
<div style="margin-top: 15%;" class="col-xs-6">
	<h1><span class="fa fa-search"></span> Cari data barang yang anda pinjam disini</h1>
	<form role="form" method="POST" role="form" action="{{ URL::to('caripeminjaman') }}" class="search-form">
    <div class="input-group">
      <input type="text" name="ID_PEMINJAMAN" class="form-control" placeholder="Masukkan nomor ID peminjaman anda disini">
      {{csrf_field()}}

      <div class="input-group-btn">
        <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
        </button>
      </div>
    </div>
</form>
</div>
<div class="col-xs-3"></div>
  <!-- /.error-page -->
</section>
@endsection
