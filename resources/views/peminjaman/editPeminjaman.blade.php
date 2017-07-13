@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        Edit Detail Peminjaman
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/show/peminjaman">Data Semua Peminjaman</a></li>
        <li class="active">Edit Peminjaman</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            @if ($message = Session::get('error'))
              <div class="alert alert-danger">
                <p>{{ $message }}</p>
              </div>
            @endif
            <div class="box-header with-border">
              <h3 class="box-title">Data</h3>
            </div>
        <div class="box-body" style="padding-right: 10%; padding-left: 10%; padding-bottom: 5%">    
          <form action="{{ url('/peminjaman/edit', $peminjaman->ID_PEMINJAMAN) }}" method="POST">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label>Nomor Ticket</label>
                <input class="form-control" value="{{ $peminjaman->NOMOR_TICKET }}" name="NOMOR_TICKET">
              </div>
              
              <div class="form-group">
                <label>Nama Peminjam</label>
                <input class="form-control" value="{{ $peminjaman->NAMA_PEMINJAM }}" name="NAMA_PEMINJAM">
              </div>

              <div class="form-group">
                <label>Perangkat</label>
                <input class="form-control" value="{{ $peminjaman->PERANGKAT }}" name="PERANGKAT">
              </div>

              <div class="form-group">
                <label>Nomor Registrasi</label>
                <input class="form-control" value="{{ $peminjaman->NOMOR_REGISTRASI }}" name="NOMOR_REGISTRASI">
              </div>

              <div class="form-group">
                <label>Tanggal Peminjaman</label>
                <input type="date" class="form-control calendar1" id="datepicker" name="TGL_PEMINJAMAN" placeholder="Tanggal Peminjaman" value="{{ $peminjaman->TGL_PEMINJAMAN }}"</div>
              </div>

              <div class="form-group">
                <label>Tanggal Pengembalian</label>
                <input type="date" class="form-control calendar1" name="TGL_PENGEMBALIAN" placeholder="Tanggal Pengembalian" id="datepicker1" value="{{ $peminjaman->TGL_PENGEMBALIAN }}"</div>
              </div>

              <div class="form-group">
                <label>Status</label>
                <input type="hidden" name="_method" value="PUT">
                <select class="form-control" name="KETERANGAN">
                  <option disabled selected value><b>-- Pilih Menu DIbawah --</b></option>
                  <option value="in progress">In Progress</option>
                  <option value="done">Done</option>
                </select>
              </div>
              
              <button type="submit" class="btn btn-primary pull-right">Update</button>&nbsp;
          </form>
          <div>
            <div>
              <br>
              <button class="btn btn-danger pull-right delete-peminjaman">Hapus Data Peminjaman</button>  
            </div>
          </div>
        </div>
            <!-- /.box-header -->
            <!-- form start -->

            </div>

            </div>
            <!-- /.box-body -->
          </div>
    </section>
@endsection
@section('javas')
<script type="text/javascript">
$("button.delete-peminjaman").click(function() {
    swal({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then(function () {
      window.location.href = "{{ URL::to('/peminjaman/delete', $peminjaman->ID_PEMINJAMAN) }}";
    })
});
</script>
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
