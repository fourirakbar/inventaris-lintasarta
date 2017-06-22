@extends('layouts.lumino')

@section('additionalcss')
<style>
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
@endsection

@section('content')
<section class="content-header">
      <h1>
        Detail Data
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/semua">Data Request Barang yang Belum Selesai</a></li>
        <li class="active">Detail Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Pembatalan</h3><br><br>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form action="{{ url('adminhapus/lihat', $jebret->ID_PERMINTAAN) }}" method="POST">
            		<input type="hidden" name="_method" value="PUT">
			    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
              <table style="width: 40%; float: left; margin: 5%;" class="table table-bordered table-hover">
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">ID Permintaan</th>
              		<td style="vertical-align: middle; width: 20%;">{{ $jebret->ID_PERMINTAAN }}</td>
              	</tr>
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">Nomor Tiket</th>
              		<td style="vertical-align: middle; width: 20%;">{{ $jebret->NOMOR_TICKET }}</td>
              	</tr>
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">Tanggal Permintaan</th>
              		<td style="vertical-align: middle; width: 20%;">{{ $jebret->TGL_PERMINTAAN }}</td>
              	</tr>
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">Nama Requester</th>
              		<td style="vertical-align: middle; width: 20%;">{{ $jebret->NAMA_REQUESTER }}</td>
              	</tr>
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">Bagian</th>
              		<td style="vertical-align: middle; width: 20%;">{{ $jebret->BAGIAN }}</td>
              	</tr>
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">Divisi</th>
              		<td style="vertical-align: middle; width: 20%;">{{ $jebret->DIVISI }}</td>
              	</tr>
              </table>
              <table style="width: 40%; float: right; margin: 5%;" class="table table-bordered table-hover">
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">Barang Permintaan</th>
              		<td style="vertical-align: middle; width: 20%;">{{ $jebret->BARANG_PERMINTAAN }}</td>
              	</tr>
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">Deskripsi Barang</th>
              		<td style="vertical-align: middle; width: 20%;">{{ $jebret->DESKRIPSI }}</td>
              	</tr>
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">Tanggal Permintaan</th>
              		<td style="vertical-align: middle; width: 20%;">{{ $jebret->TGL_PEMBATALAN }}</td>
              	</tr>
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">Alasan Pembatalan</th>
              		<td style="vertical-align: middle; width: 20%;">{{ $jebret->ALASAN_PEMBATALAN }}</td>
              	</tr>
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">File Pembatalan</th>
              		<td style="vertical-align: middle; width: 20%;"><img id="myImg" src="{{ URL::asset($jebret->FILE_PEMBATALAN) }}" height="100px" width="auto"></td>
              	</tr>
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">Status Pembatalan</th>
              		<td style="vertical-align: middle; width: 20%;">{{ $jebret->STATUS_PEMBATALAN }}</td>
              	</tr>
              </table>
              @if( $jebret->STATUS_PEMBATALAN === "done")
              @else
                <button style="margin: 5% 0 5% 0" type="submit" class="btn btn-danger pull-right">Setujui Pembatalan</button>
              @endif
              </form>
            </div>
            <div onclick="closefunction()" id="myModal" class="modal">
				  <img class="modal-content" id="img01">
				  <div id="caption"></div>
				</div>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

@endsection
@section('javas')
<script type="text/javascript">
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
function closefunction() { 
    modal.style.display = "none";
}
</script>
@endsection