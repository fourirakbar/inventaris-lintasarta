@extends('layouts.lumino')

@section('additionalcss')
<style type="text/css">
	#classModal {}

	.modal-body {
	  overflow-x: auto;
	}
</style>
@endsection

@section('content')
<section class="content-header">
      <h1>
        Form Input Repair
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Form Input Repair</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
            @endif
            <div class="box-header with-border">
              <h3 class="box-title">Form Input Repair</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
         	<div class="box-body">
         	<form action="{{ url('/repair/show/edit', $data->ID_PERBAIKAN) }}" method="POST">
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
         	<div class="col-xs-12">
				
				    <div class="col-xs-6">
			      		<div class="form-group"> 
			              <label>Nama Barang</label> 
			              <input class="form-control" placeholder="Masukkan Nama Barang" name="NAMA_BARANG" id="nambar" value="{{ $data->NAMA_BARANG }}"> 
			            </div> 
			            {{csrf_field()}}
			            <div class="form-group"> 
			              <label>No. Registrasi</label> 
			              <input class="form-control" placeholder="Masukkan No. Registrasi" name="NOMOR_REGISTRASI" id="noreg" value="{{ $data->NOMOR_REGISTRASI }}"> 
			            </div> 
			            {{csrf_field()}}
			            <div class="form-group"> 
			              <label>Problem</label> 
			              <textarea class="form-control" placeholder="Jelaskan Masalah yang Dialami" name="PROBLEM" id="problem" value="{{ $data->PROBLEM }}"></textarea> 
			            </div> 
			            {{csrf_field()}} 
			            <div class="form-group"> 
			              <label>Vendor</label> 
			              <input class="form-control" placeholder="masukkan Vendor" name="VENDOR" id="vendor" value="{{ $data->VENDOR }}"> 
			            </div> 
			            {{csrf_field()}}
			            <div class="form-group"> 
			              <label>Keterangan Barang</label> 
			              <input class="form-control" placeholder="masukkan Vendor" name="ID_BARANG" id="ketbar" value="{{ $data->KETERANGAN_REPAIR }}"> 
			            </div> 
			            {{csrf_field()}}
			            <div class="form-group"> 
			              <label>Catatan</label> 
			              <textarea class="form-control" placeholder="Masukkan catatan. contoh: 'diperbaiki 1 buah' dan sebagainya. Kosongkan jika tidak ada catatan." name="CATATAN_REPAIR" id="catrep" value="{{ $data->CATATAN_REPAIR }}"></textarea>
			            </div> 
			            {{csrf_field()}}
			    	</div>

				    <div class="col-xs-6">
					    <div class="form-group">
				          <label>Tanggal Barang Diperbaiki (YYYY-MM-DD)</label>
				          <div class="input-group date">
				            <div class="input-group-addon">
				              <i class="fa fa-calendar"></i>
				            </div>
				            <input type="date" class="form-control pull-right" id="datestart" name="TANGGAL_REPAIR" value="{{ $data->TANGGAL_REPAIR }}">
				          </div>
				        </div> 
				        {{csrf_field()}}
				        <div class="form-group">
				          <label>Tanggal Perkiraan Barang Selesai (YYYY-MM-DD)</label>
				          <div class="input-group date">
				            <div class="input-group-addon">
				              <i class="fa fa-calendar"></i>
				            </div>
				            <input type="date" class="form-control pull-right" id="datefinish" name="PERKIRAAN_SELESAI" value="{{ $data->PERKIRAAN_SELESAI }}">
				          </div>
				        </div> 
				        {{csrf_field()}}
				    </div>
				
			</div>
              <button style="margin-right: 10%; margin-bottom: 5%;" type="submit" class="btn btn-primary btn-lg pull-right">Update</button>
            </form>
            </div>
              <!-- /.box-body -->
          	</div>
        </div>
      </div>
    </section>
@endsection
@section('javas')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="{{ URL::asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
  <!-- bootstrap datepicker -->
  <script src="{{ URL::asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
  <script type="text/javascript">
  
  $(function () {
        //Date picker
        $('#datestart').datepicker({
          format: 'yyyy-mm-dd',
          changeMonth: true,
          changeYear: true,
          autoclose: true
        });
  });
  $(function () {
        //Date picker
        $('#datefinish').datepicker({
          format: 'yyyy-mm-dd',
          changeMonth: true,
          changeYear: true,
          autoclose: true
        });
  });
  </script>
@endsection