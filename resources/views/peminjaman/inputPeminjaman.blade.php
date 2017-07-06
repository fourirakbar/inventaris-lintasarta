@extends('layouts.lumino') 
@section('content')
<section class="content-header">
      <h1>
        Form Input Data Peminjaman
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Form Input Data Peminjaman</li>
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
              <h3 class="box-title">Form Input Data Peminjaman</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" role="form" action="{{ URL::to('peminjaman2') }}" onclick="getdate()">
              <div class="box-body">
                <div class="form-group"> 
                  <label>Nama Peminjam</label> 
                  <input class="form-control" placeholder="Nama Peminjam" name="NAMA_PEMINJAM"> 
                </div> 
                {{csrf_field()}} 

                <div class="form-group"> 
                  <label>Perangkat</label> 
                  <input class="form-control" placeholder="Perangkat" name="PERANGKAT"> 
                </div> 
                {{csrf_field()}}

                <div class="form-group"> 
                  <label>No. Registrasi</label> 
                  <input class="form-control" placeholder="Nomor Registarsi" name="NOMOR_REGISTRASI"> 
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
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
@endsection
@section('javas')
<!-- date-range-picker -->
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
@endsection