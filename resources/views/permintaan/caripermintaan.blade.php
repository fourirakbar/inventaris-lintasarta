@extends('layouts.lumino')
@section('content')
<section class="content">
<div class="row">
  <div class="col-xs-12">
    @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
          @elseif ($message = Session::get('gagal'))
            <div class="alert alert-warning">
                <p>{{ $message }}</p>
              </div>
            @endif
  </div>
</div>
<div class="col-xs-3"></div>
<div style="margin-top: 15%;" class="col-xs-6">

	<h1><span class="fa fa-search"></span> Cari Permintaan Anda Disini</h1>
	<form role="form" method="POST" role="form" action="{{ URL::to('caripermintaan') }}" class="search-form">
    <div class="input-group">
      <input type="text" name="NO_TIKET" class="form-control" placeholder="Masukkan Nomor Tiket Anda Disini">
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
