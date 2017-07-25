@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        Edit Data
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/semua">Data Request Barang yang Belum Selesai</a></li>
        <li class="active">Edit Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data</h3>
            </div>

        <form action="{{ url('/showbarang/edit', $barang->ID_BARANG) }}" method="POST">
			    <div class="box-body" style="padding-right: 10%; padding-left: 10%; padding-bottom: 5%">
			    	<input type="hidden" name="_method" value="PUT">
			    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                <div class="form-group">
	                  <label>Nomor Registrasi</label>
	                  <input class="form-control" value="{{ $barang->NOMOR_REGISTRASI }}" name="NOMOR_REGISTRASI">
	                </div>

	                <div class="form-group">
	                  <label>Nama Barang</label>
	                  <input class="form-control" value="{{ $barang->NAMA_BARANG }}" name="NAMA_BARANG">
	                </div>

	                <div class="form-group">
	                  <label>Jumlah</label>
	                  <input class="form-control" value="{{ $barang->JUMLAH }}" name="JUMLAH">
	                </div>

	                <div class="form-group">
	                  <label>Keterangan</label>
	                  <input class="form-control" value="{{ $barang->KETERANGAN }}" name="KETERANGAN">
	                </div>

	                <div class="form-group">
	                  <label>Status Barang</label>
	                  <input class="form-control" value="{{ $barang->STATUS_BARANG }} " name="STATUS_BARANG">
	                </div>
	                <button type="submit" class="btn btn-primary pull-right">Update</button>&nbsp;&nbsp;
	                <button type="reset" class="btn btn-default pull-right">Reset</button>&nbsp;&nbsp;
	              </div>
	            </form>
            <!-- /.box-header -->
            <!-- form start -->

          	</div>

            </div>
            <!-- /.box-body -->
          </div>
    </section>
@endsection
