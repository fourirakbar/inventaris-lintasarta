@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        Edit Data
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
              <h3 class="box-title">Data</h3>
            </div>

        <form action="{{ url('/semua/lihat/edit', $jebret->ID_PERMINTAAN) }}" method="POST">
			    <div class="box-body" style="padding-right: 10%; padding-left: 10%; padding-bottom: 5%">
			    	<input type="hidden" name="_method" value="PUT">
			    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                <div class="form-group"> 
	                  <label>Nomor Ticket</label> 
	                  <input class="form-control" value="{{ $jebret->NOMOR_TICKET }}" name="NOMOR_TICKET"> 
	                </div> 
	                
	                <div class="form-group"> 
	                  <label>Nama Requester</label> 
	                  <input class="form-control" value="{{ $jebret->NAMA_REQUESTER }}" name="NAMA_REQUESTER"> 
	                </div>

	                <div class="form-group"> 
	                  <label>Bagian</label> 
	                  <input class="form-control" value="{{ $jebret->BAGIAN }}" name="BAGIAN"> 
	                </div>

	                <div class="form-group"> 
	                  <label>Divisi</label> 
	                  <input class="form-control" value="{{ $jebret->DIVISI }}" name="DIVISI"> 
	                </div> 	                
	                
	                <div class="form-group"> 
	                  <label>Tanggal Permintaan</label> 
	                  <input class="form-control" value="{{ $jebret->TGL_PERMINTAAN }} " name="TGL_PERMINTAAN"> 
	                </div> 
	                
	                <div class="form-group"> 
	                  <label>Barang yang Diminta</label> 
	                  <input class="form-control" value="{{ $jebret->BARANG_PERMINTAAN }}" name="BARANG_PERMINTAAN"> 
	                </div>

	                <div class="form-group"> 
	                  <label>Deskirpsi</label> 
	                  <input class="form-control" value="{{ $jebret->DESKRIPSI }}" name="DESKRIPSI"> 
	                </div>
	                
	                <div class="form-group"> 
	                  <label>No FPBJ</label> 
	                  <input class="form-control" placeholder="No FPBJ" name="NO_FPBJ" value="{{ $jebret->NO_FPBJ }}"> 
	                </div> 

	                <div class="form-group"> 
	                  <label>Tanggal Input FPBJ</label> 
	                  <input type="date" class="form-control calendar1" name="TGL_INPUT_FPBJ" placeholder="Tanggal Input FPBJ" value="{{ $jebret->TGL_INPUT_FPBJ }}"> 
	                </div> 

	                <div class="form-group"> 
	                  <label>Target Selesai</label> 
	                  <input type="date" class="form-control calendar1" name="TARGET_SELESAI" placeholder="Tanggal Target Selesai" value="{{ $jebret->TARGET_SELESAI }}"> 
	                </div>

	                <div class="form-group"> 
	                  <label>Keterangan</label>
	                  <textarea class="form-control" rows="3" name="KETERANGAN" value="{{ $jebret->KETERANGAN }}" placeholder="Keterangan"></textarea>
	                </div> 
	                
	                <?php
	                	if (!empty($jebret->NO_FPBJ) && !empty($jebret->TGL_INPUT_FPBJ) && !empty($jebret->TARGET_SELESAI) && !empty($jebret->KETERANGAN)) { ?>
			                <div class="form-group"> 
			                  <label>Target Tindak Lanjut Akhir</label> 
			                  <input type="date" class="form-control calendar1" name="TINDAK_LANJUT_AKHIR" placeholder="Tanggal Target Selesai" value="{{ $jebret->TINDAK_LANJUT_AKHIR }}"> 
			                </div>

			                <?php
			                	if (!empty($jebret->TINDAK_LANJUT_AKHIR)) { ?>
			                		<div class="form-group"> 
					                  <label>FPB</label> 
					                  <input type="date" class="form-control calendar1" name="FPB" placeholder="FPB" value="{{ $jebret->FPB }}"> 
					                </div>

					                <?php
					                	if (!empty($jebret->FPB)) { ?>
					                		<div class="form-group"> 
							                  <label>RFQ</label> 
							                  <input type="date" class="form-control calendar1" name="RFQ" placeholder="RFQ" value="{{ $jebret->RFQ }}"> 
							                </div>

							                <?php
							                	if (!empty($jebret->RFQ)) { ?>
							                		<div class="form-group"> 
									                  <label>SPK</label> 
									                  <input type="date" class="form-control calendar1" name="SPK" placeholder="SPK" value="{{ $jebret->SPK }}"> 
									                </div> 

									                <?php
									                	if (!empty($jebret->SPK)) { ?>
									                		<div class="form-group"> 
											                  <label>Delivery Order</label> 
											                  <input type="date" class="form-control calendar1" name="DO" placeholder="Delivery Order" value="{{ $jebret->DO }}"> 
											                </div> 

											                <?php
											                	if (!empty($jebret->DO)) { ?>
											                		<div class="form-group"> 
													                  <label>BAST</label> 
													                  <input type="date" class="form-control calendar1" name="BAST" placeholder="BAST" value="{{ $jebret->BAST }}"> 
													                </div>
											                <?php
											                	}
											                ?>
									                <?php
									                	}
									                ?>
							                <?php
							                	}
							                ?> 
					                <?php
					                	}
					                ?>
			                <?php
			                	}
			                ?>
	                <?php
	                	}
	                ?>

	                <div class="form-group"> 
	                  <label>Titik Proses</label> 
	                  <input type="hidden" name="_method" value="PUT">
	                  <select class="form-control" name="TIKPRO_ID">
	                  	<option value=""><b>Pilih Menu Dibawah</b></option>
	                  	<option value="1">Input FPBJ</option>
	                  	<option value="2">Approval GM</option>
	                  	<option value="3">Approve Budget</option>
	                  	<option value="4">RFQ</option>
	                  	<option value="5">SPK</option>
	                  	<option value="6">Delivery Order</option>
	                  	<option value="7">Pembuatan No. Registrasi</option>
	                  	<option value="8">FMB</option>
	                  	<option value="9">Pengiriman ke User</option>
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