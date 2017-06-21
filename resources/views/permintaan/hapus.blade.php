@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        Pembatalan Permintaan
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/semua">Data Request Barang yang Belum Selesai</a></li>
        <li><a href="{{ url('/semua/lihat', $jebret->ID_PERMINTAAN) }}">Details Data</a></li>
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
              <h3 class="box-title">Form Pengajuan Pembatalan Permintaan</h3>
            </div>
            
              <form action="{{ url('/semua/hapus', $jebret->ID_PERMINTAAN) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                <div class="box-body" style="padding-right: 10%; padding-left: 10%; padding-bottom: 5%">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group col-md-6"> 
                          <label>Nomor Ticket</label> 
                          <input class="form-control" value="{{ $jebret->NOMOR_TICKET }}" name="NOMOR_TICKET" disabled=""> 
                        </div>

                        <div class="form-group col-md-6"> 
                          <label>Barang yang Diminta</label> 
                          <input class="form-control" value="{{ $jebret->BARANG_PERMINTAAN }}" name="BARANG_PERMINTAAN" disabled=""> 
                        </div>

                        <div class="form-group col-md-6"> 
                          <label>Nama Requester</label> 
                          <input class="form-control" value="{{ $jebret->NAMA_REQUESTER }}" name="NAMA_REQUESTER" disabled=""> 
                        </div>
                        
                        <div class="form-group col-md-6"> 
                          <label>Deskirpsi</label> 
                          <textarea class="form-control" value="{{ $jebret->DESKRIPSI }}" name="DESKRIPSI" disabled=""></textarea>
                        </div>

                        <div class="clearfix hidden-md"></div>

                        <div class="form-group col-md-6"> 
                          <label>Bagian</label> 
                          <input class="form-control" value="{{ $jebret->BAGIAN }}" name="BAGIAN" disabled=""> 
                        </div>

                        <div class="form-group col-md-6"> 
                          <label>Alasan Pembatalan</label> 
                          <textarea class="form-control" value="{{ $jebret->NAMA_REQUESTER }}" name="ALASAN_PEMBATALAN"></textarea> 
                        </div>

                        <div class="clearfix hidden-md"></div>

                        <div class="form-group col-md-6"> 
                          <label>Divisi</label> 
                          <input class="form-control" value="{{ $jebret->DIVISI }}" name="DIVISI" disabled=""> 
                        </div> 

                        <div class="form-group col-md-6"> 
                          <label>Upload File Pembatalan</label> 
                          <input type="file" name="FILE_PEMBATALAN" enctype="multipart/form-data"> 
                        </div>                  

                        <div class="clearfix hidden-md"></div>
                        
                        <div class="form-group col-md-6"> 
                          <label>Tanggal Permintaan</label> 
                          <input class="form-control" value="{{ $jebret->TGL_PERMINTAAN }} " name="TGL_PERMINTAAN" disabled=""> 
                        </div> 

                        <div class="clearfix hidden-md"></div>

                        <button type="submit" class="btn btn-primary pull-right">Update</button>  
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
@section('javas')
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{URL::asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{URL::asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript">
function getdate() {
  var tt = document.getElementById('datepicker').value;

  var date = new Date(tt);
  var newdate = new Date(date);

  newdate.setDate(newdate.getDate() + 60);

  var dd = newdate.getDate();
  var mm = newdate.getMonth() + 1;
  var y = newdate.getFullYear();
  console.log(dd)
  console.log(mm)
  console.log(y)

  var FormattedDate = y + '-' + mm + '-' + dd;
    document.getElementById('datedead').value = FormattedDate;
}
$(function () {
      $('#daterange-btn').daterangepicker(
          {
            ranges: {
              'Today': [moment(), moment()],
              'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days': [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month': [moment().startOf('month'), moment().endOf('month')],
              'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
          },
          function (start, end) {
            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
          }
      );

      //Date picker
      $('.calendar1').datepicker({
        format: 'yyyy-mm-dd',
        changeMonth: true,
        changeYear: true,
        autoclose: true
      });
});
</script>
@endsection