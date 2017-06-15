@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
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
              <h3 class="box-title">Quick Example</h3>
            </div>

            <form action="{{ url('/semua/lihat/edit', $jebret->ID_PERMINTAAN) }}" method="POST">
			    <div class="box-body" style="padding-right: 10%; padding-left: 10%; padding-bottom: 5%">
			    	<input type="hidden" name="_method" value="PUT">
			    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                <div class="form-group"> 
	                  <label>Nomor Ticket</label> 
	                  <input class="form-control" value="{{ $jebret->NOMOR_TICKET }}" name="NOMOR_TICKET" disabled=""> 
	                </div> 
	                
	                <div class="form-group"> 
	                  <label>Nama Requester</label> 
	                  <input class="form-control" value="{{ $jebret->NAMA_REQUESTER }}" name="NAMA_REQUESTER" disabled=""> 
	                </div> 
	                
	                <div class="form-group"> 
	                  <label>Tanggal Permintaan</label> 
	                  <input class="form-control" value="{{ $jebret->TGL_PERMINTAAN }} " name="TGL_PERMINTAAN" disabled=""> 
	                </div> 
	                
	                <div class="form-group"> 
	                  <label>Barang yang Diminta</label> 
	                  <input class="form-control" value="{{ $jebret->BARANG_PERMINTAAN }}" name="BARANG_PERMINTAAN" disabled=""> 
	                </div> 
	                
	                <div class="form-group"> 
	                  <label>No FPBJ</label> 
	                  <input class="form-control" placeholder="No FPBJ" name="NO_FPBJ" value="{{ $jebret->NO_FPBJ }}"> 
	                </div> 
	                
	                <div class="form-group"> 
	                  <label>Target Selesai</label> 
	                  <input type="date" class="form-control calendar1" name="TARGET_SELESAI" placeholder="Tanggal Target Selesai" value="{{ $jebret->TARGET_SELESAI }}"> 
	                </div> 
	                
	                <div class="form-group"> 
	                  <label>Keterangan</label>
	                  <textarea class="form-control" rows="3" name="KETERANGAN" value="{{ $jebret->KETERANGAN }}" placeholder="Keterangan"></textarea>
	                </div> 
	                
	                <div class="form-group"> 
	                  <label>Target Tindak Lanjut Akhir</label> 
	                  <input type="date" class="form-control calendar1" name="TINDAK_LANJUT_AKHIR" placeholder="Tanggal Target Selesai" value="{{ $jebret->TINDAK_LANJUT_AKHIR }}"> 
	                </div> 
	                
	                <div class="form-group"> 
	                  <label>Status</label> 
	                  <input class="form-control" placeholder="Status" name="STATUS" value="{{ $jebret->STATUS }}"> 
	                </div> 
	                
	                <div class="form-group"> 
	                  <label>FPB</label> 
	                  <input type="date" class="form-control calendar1" name="FPB" placeholder="FPB" value="{{ $jebret->FPB }}"> 
	                </div> 
	                
	                <div class="form-group"> 
	                  <label>RFQ</label> 
	                  <input type="date" class="form-control calendar1" name="RFQ" placeholder="RFQ" value="{{ $jebret->RFQ }}"> 
	                </div> 
	                
	                <div class="form-group"> 
	                  <label>SPK</label> 
	                  <input type="date" class="form-control calendar1" name="SPK" placeholder="SPK" value="{{ $jebret->SPK }}"> 
	                </div> 
	                
	                <div class="form-group"> 
	                  <label>Delivery Order</label> 
	                  <input type="date" class="form-control calendar1" name="DO" placeholder="Delivery Order" value="{{ $jebret->DO }}"> 
	                </div> 
	                
	                <div class="form-group"> 
	                  <label>BAST</label> 
	                  <input type="date" class="form-control calendar1" name="BAST" placeholder="BAST" value="{{ $jebret->BAST }}"> 
	                </div> 

	                <div class="form-group"> 
	                  <label>Titik Proses</label> 
	                  <input type="hidden" name="_method" value="PUT">
	                  <select class="form-control" name="titik_proses">
	                  	<option value="Input FPBJ">Input FPBJ</option>
	                  	<option value="Approval GM">Approval GM</option>
	                  	<option value="Approve Budget">Approve Budget</option>
	                  	<option value="RFQ">RFQ</option>
	                  	<option value="SPK">SPK</option>
	                  	<option value="Delivery Order">Delivery Order</option>
	                  	<option value="Pembuatan No. Registrasi">Pembuatan No. Registrasi</option>
	                  	<option value="FMB">FMB</option>
	                  	<option value="Pengiriman ke User">Pengiriman ke User</option>
	                  </select>
	                </div> 
	                
	                <button type="submit" class="btn btn-primary">Update</button>&nbsp;&nbsp; 
	                <button type="reset" class="btn btn-default">Reset</button> 
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