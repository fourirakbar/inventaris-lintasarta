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
            <form role="form" method="POST" role="form" action="{{ URL::to('repair/input') }}">
              <div class="box-body">
              	<div class="form-group"> 
                  <label>Pilih Jenis Barang</label><br>
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"><b class="material-icons">Barang Dari Gudang</b></button>
                  <button type="button" class="btn btn-default" id="baranguser"><b class="material-icons">Barang Dari User</b></button>
                </div>
                <div class="form-group"> 
                  <label>Nomor Ticket</label> 
                  <input class="form-control" placeholder="Masukkan Nomor Ticket" name="NOMOR_TICKET" id="notik"> 
                </div> 
                {{csrf_field()}}
                <div class="form-group"> 
                  <label>Nama Barang</label> 
                  <input class="form-control" placeholder="Masukkan Nama Barang" name="NAMA_BARANG" id="nambar" readonly=""> 
                </div> 
                {{csrf_field()}}
                <div class="form-group"> 
                  <label>No. Registrasi</label> 
                  <input class="form-control" placeholder="Masukkan No. Registrasi" name="NOMOR_REGISTRASI" id="noreg" readonly=""> 
                </div> 
                {{csrf_field()}}
                <div class="form-group"> 
                  <label>Problem</label> 
                  <textarea class="form-control" placeholder="Jelaskan Masalah yang Dialami" name="PROBLEM" id="problem"></textarea> 
                </div> 
                {{csrf_field()}} 
                <div class="form-group"> 
                  <label>Vendor</label> 
                  <input class="form-control" placeholder="masukkan Vendor" name="VENDOR" id="vendor"> 
                </div> 
                {{csrf_field()}}
                <div class="form-group" hidden=""> 
                  <label>ID Barang</label> 
                  <input class="form-control" placeholder="masukkan Vendor" name="ID_BARANG" id="idbar"> 
                </div> 
                {{csrf_field()}}
                <div class="form-group"> 
                  <label>Catatan Jumlah Barang</label> 
                  <textarea class="form-control" placeholder="Masukkan catatan. contoh: 'diperbaiki 1 buah' dan sebagainya. Kosongkan jika tidak ada catatan jumlah." name="CATATAN_REPAIR" id="catrep"></textarea>
                </div> 
                {{csrf_field()}}
                <div class="form-group">
                  <label>Tanggal Barang Diperbaiki (YYYY-MM-DD)</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" class="form-control pull-right" id="datestart" name="TANGGAL_REPAIR">
                  </div>
                  <!-- /.input group -->
                </div> 
                {{csrf_field()}}
                <div class="form-group">
                  <label>Tanggal Perkiraan Barang Selesai (YYYY-MM-DD)</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" class="form-control pull-right" id="datefinish" name="PERKIRAAN_SELESAI">
                  </div>
                  <!-- /.input group -->
                </div> 
                {{csrf_field()}}
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>

              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Data Barang Dari Gudang</h4>
            </div>
            <div class="modal-body">
              <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                          <th style="text-align: center; vertical-align: middle; ">No</th>
                          <th style="text-align: center; vertical-align: middle; display: none;">ID Barang</th>
                          <th style="text-align: center; vertical-align: middle; ">No. Registrasi</th>
                          <th style="text-align: center; vertical-align: middle; ">Nama Barang</th>
                          <th style="text-align: center; vertical-align: middle; ">Jumlah Barang</th>
                          <th style="text-align: center; vertical-align: middle; ">Keterangan</th>
	                </tr>
	                </thead>
	                <tbody>
	                
	                <!-- buat index di kolom "NO" -->
	                <?php
	                  $indexNo=1;
	                ?>
	                @foreach ($barang as $index)
	                    <tr>
	                      <td style="text-align: center; vertical-align: middle;" data-dismiss="modal" >{{ $indexNo++ }}</td>
	                      <td style="text-align: center; vertical-align: middle; display: none;" data-dismiss="modal" >{{ $index->ID_BARANG }}</td>
	                      <td style="text-align: center; vertical-align: middle;" data-dismiss="modal" >{{ $index->NOMOR_REGISTRASI }}</td>
	                      <td style="text-align: center; vertical-align: middle;" data-dismiss="modal" >{{ $index->NAMA_BARANG }}</td>
	                      <td style="text-align: center; vertical-align: middle;" data-dismiss="modal" >{{ $index->JUMLAH }}</td>
	                      <td style="text-align: center; vertical-align: middle;" data-dismiss="modal" >{{ $index->KETERANGAN }}</td>
	                    </tr>
	                @endforeach
	                </tbody>
	              </table>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		      </div>
		    </div>
		  </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
@endsection
@section('javas')
<!-- DataTables -->
	<script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
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
	<script>
	  $(function () {
	    $('#example1').DataTable();
	  });

	  $("tbody tr").click(function(){
		   var noreg=$(this).find('td:eq(2)').text();
		   var nambar=$(this).find('td:eq(3)').text();
		   var idbar=$(this).find('td:eq(1)').text();
		   document.getElementById("nambar").value = nambar;
		   document.getElementById("noreg").value = noreg;
		   document.getElementById("idbar").value = idbar;
		   document.getElementById("nambar").readOnly = true;
		   document.getElementById("noreg").readOnly = true;
		   document.getElementById("idbar").disabled = false;
		   document.getElementById("idbar").readOnly = true;
	  		document.getElementById("problem").value = "";
	  		document.getElementById("vendor").value = "";
	  		document.getElementById("catrep").value = "";
		});

	  $("#baranguser").click(function(){
	  		document.getElementById("nambar").readOnly = false;
	  		document.getElementById("noreg").readOnly = false;
	  		document.getElementById("nambar").value = "";
	  		document.getElementById("idbar").disabled = true;
	  		document.getElementById("noreg").value = "";
	  		document.getElementById("problem").value = "";
	  		document.getElementById("vendor").value = "";
	  		document.getElementById("catrep").value = "";
	  });

	</script>
@endsection