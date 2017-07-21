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
        Form Input Peminjaman
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Form Input Peminjaman</li>
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
              <h3 class="box-title">Form Input Peminjaman</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" role="form" action="{{ URL::to('peminjaman2') }}">
              <div class="box-body">
                <div class="form-group"> 
                  <label>Pilih Jenis Barang</label><br>
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"><b class="material-icons">Barang Dari Gudang</b></button>
                </div>
                <div class="form-group"> 
                  <label>Nomor Ticket</label> 
                  <input class="form-control" placeholder="Masukkan Nomor Ticket" name="NOMOR_TICKET" id="nomorticket" autocomplete="off"> 
                </div> 
                {{csrf_field()}}
                <div class="form-group"> 
                  <label>Nama Peminjam</label> 
                  <input class="form-control" placeholder="Masukkan Nama Peminjam" name="NAMA_PEMINJAM" id="namapeminjam"> 
                </div> 
                {{csrf_field()}}
                <div class="form-group"> 
                  <label>Perangkat</label> 
                  <input class="form-control" placeholder="Masukkan Nama Perangkat" name="PERANGKAT" id="nambar" readonly=""> 
                </div> 
                {{csrf_field()}}
                <div class="form-group"> 
                  <label>No. Registrasi</label> 
                  <input class="form-control" placeholder="Masukkan Nomor Registrasi" name="NOMOR_REGISTRASI" id="noreg" readonly=""></input> 
                </div> 
                {{csrf_field()}}
                <div class="form-group" style="display: none;"> 
                  <label>ID_BARANG</label> 
                  <input class="form-control" placeholder="Masukkan ID BARANG" name="ID_BARANG" id="idbar" readonly=""></input> 
                </div> 
                {{csrf_field()}} 
                
                <div class="form-group">
                  <label>Tanggal Peminjaman</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" class="form-control pull-right" id="datepicker" name="TGL_PEMINJAMAN">
                  </div>
                  <!-- /.input group -->
                </div> 

                <div class="form-group">
                  <label>Tanggal Pengambalian</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="date" class="form-control pull-right" id="datepicker1" name="TGL_PENGEMBALIAN">
                  </div>
                  <!-- /.input group -->
                </div> 
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">

$(function () {
      $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        changeMonth: true,
        changeYear: true,
        autoclose: true
      });
      $('#datepicker1').datepicker({
        format: 'yyyy-mm-dd',
        changeMonth: true,
        changeYear: true,
        autoclose: true
      });
});
</script>
<script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
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