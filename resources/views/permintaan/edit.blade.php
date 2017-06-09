@extends('layouts.lumino')



<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Tindak Lanjut Request Barang</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tindak Lanjut Request Barang</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					
					<div class="panel-body">
						<div class="col-md-12">
							<div class="panel panel-default">
							<div class="panel-heading">Detail Request Barang</div>
							<div class="panel-body">
								<input type="hidden" name="method" value="DELETE">
            					<a class="btn btn-primary pull-right" href="/semua/lihat/edit/{{ $jebret->ID_PERMINTAAN }}"><b class="material-icons" title="Ubah pengumuman">Simpan</b></a>
            					<br>
            					<br>

            					<br>

								<table class="table table-bordered">
								    <thead>	
								    <!-- <tr>
								    	<th>ID Requester</th>
								    	<th>Nama Requester</th>
								    	<th>Tanggal Permintaan</th>
								    	<th>Barang yang Diminta</th>
								    	<th>No FPBJ</th>
								    	<th>Tanggal Target Selesai</th>
								    	<th>Keterangan</th>
								    	<th>Tanggal Tindak Lanjut Akhir</th>
								    	<th>Sttus</th>
								    	<th>FPB</th>
								    	<th>RFQ</th>
								    	<th>SPK</th>
								    	<th>Delivery Order</th>
								    	<th>BAST</th>
								    </tr>
								    <tr>
								    	<td>{{ $jebret->ID_PERMINTAAN }}</td>
								    	<td>{{ $jebret->NAMA_REQUESTER }}</td>
								    	<td>{{ $jebret->TGL_PERMINTAAN }}</td>
								    	<td>{{ $jebret->BARANG_PERMINTAAN }}</td>
								    	<td>{{ $jebret->NO_FPBJ }}</td>
								    	<td>{{ $jebret->TARGET_SELESAI }}</td>
								    	<td>{{ $jebret->KETERANGAN }}</td>
								    	<td>{{ $jebret->TINDAK_LANJUT_AKHIR }}</td>
								    	<td>{{ $jebret->STATUS }}</td>
								    	<td>{{ $jebret->FPB }}</td>
								    	<td>{{ $jebret->RFQ }}</td>
								    	<td>{{ $jebret->SPK }}</td>
								    	<td>{{ $jebret->DO }}</td>
								    	<td>{{ $jebret->BAST }}</td>
								    </tr> -->
								    <form method="POST" role="form" action="{{ URL::to('request2') }}"> 
						                <!-- div class="form-group"> 
						                  <label>ID Requester</label> 
						                  <input class="form-control" placeholder="" disabled=""> 
						                </div>  -->
						                <div class="form-group"> 
						                  <label>ID Permintaan</label> 
						                  <input class="form-control" placeholder="{{ $jebret->ID_PERMINTAAN }}" name="ID_PERMINTAAN" disabled=""> 
						                </div> 
						                {{csrf_field()}} 
						                <div class="form-group"> 
						                  <label>Nama Requester</label> 
						                  <input class="form-control" placeholder="{{ $jebret->NAMA_REQUESTER }}" name="NAMA_REQUESTER" disabled=""> 
						                </div> 
						                {{csrf_field()}}
						                <div class="form-group"> 
						                  <label>Tanggal Permintaan</label> 
						                  <input class="form-control" placeholder="{{ $jebret->TGL_PERMINTAAN }} " name="TGL_PERMINTAAN" disabled=""> 
						                </div> 
						                {{csrf_field()}}
						                <div class="form-group"> 
						                  <label>Barang yang Diminta</label> 
						                  <input class="form-control" placeholder="{{ $jebret->BARANG_PERMINTAAN }}" name="BARANG_PERMINTAAN" disabled=""> 
						                </div> 
						                {{csrf_field()}}
						                <div class="form-group"> 
						                  <label>No FPBJ</label> 
						                  <input class="form-control" placeholder="No FPBJ" name="NO_FPBJ"> 
						                </div> 
						                {{csrf_field()}}
						                <div class="form-group"> 
						                  <label>Target Selesai</label> 
						                  <input type="date" class="form-control" name="TARGET_SELESAI" placeholder="Tanggal Target Selesai" id="calendar"> 
						                </div> 
						                {{csrf_field()}}
						                <div class="form-group"> 
						                  <label>Keterangan</label> 
						                  <input class="form-control" placeholder="Keterangan" name="KETERANGAN"> 
						                </div> 
						                {{csrf_field()}}
						                <div class="form-group"> 
						                  <label>Target asd</label> 
						                  <input type="date" class="form-control" name="TARGET_SELESAI" placeholder="Tanggal Target Selesai" id="calendar1"> 
						                </div> 
						                {{csrf_field()}}
						                <div class="form-group"> 
						                  <label>Status</label> 
						                  <input class="form-control" placeholder="Status" name="STATUS"> 
						                </div> 
						                {{csrf_field()}}
						                <div class="form-group"> 
						                  <label>FPB</label> 
						                  <input type="date" class="form-control" name="FPB" placeholder="FPB" id="calendar"> 
						                </div> 
						                {{csrf_field()}}
						                <div class="form-group"> 
						                  <label>RFQ</label> 
						                  <input type="date" class="form-control" name="RFQ" placeholder="RFQ" id="calendar"> 
						                </div> 
						                {{csrf_field()}}
						                <div class="form-group"> 
						                  <label>SPK</label> 
						                  <input type="date" class="form-control" name="SPK" placeholder="SPK" id="calendar"> 
						                </div> 
						                {{csrf_field()}}
						                <div class="form-group"> 
						                  <label>Delivery Order</label> 
						                  <input type="date" class="form-control" name="DO" placeholder="Delivery Order" id="calendar"> 
						                </div> 
						                {{csrf_field()}}
						                <div class="form-group"> 
						                  <label>BAST</label> 
						                  <input type="date" class="form-control" name="BAST" placeholder="BAST" id="calendar"> 
						                </div> 
						                {{csrf_field()}}
						                <button type="submit" class="btn btn-primary">Submit</button> 
						                <button type="reset" class="btn btn-default">Reset</button> 
						              </div> 
						            </form> 
								    <tr>
								        <th>Nama Requester</th>
								        <td>{{ $jebret->NAMA_REQUESTER }}</td>
								    </tr>
								    <tr>
								        <th>Tanggal Permintaan</th>
								        <td>{{ $jebret->TGL_PERMINTAAN }}</td>
								    </tr>
								    <tr>
								        <th>Barang yang Diminta</th>
								        <td>{{ $jebret->BARANG_PERMINTAAN }}</td>
								    </tr>
								    <tr>
								        <th>No FPBJ</th>
								        <td></td>
								    </tr>
								    <tr>
								        <th>Tanggal Target Selesai</th>
								        <td>{{ $jebret->TARGET_SELESAI }}</td>
								    </tr>
								    <tr>
								        <th>Keterangan</th>
								        <td>{{ $jebret->KETERANGAN }}</td>
								    </tr>
								    <tr>
								        <th>Tanggal Tindak Lanjut Akhir</th>
								        <td>{{ $jebret->TINDAK_LANJUT_AKHIR }}</td>
								    </tr>
								    <tr>
								        <th>Status</th>
								        <td>{{ $jebret->STATUS }}</td>
								    </tr>
								    <tr>
								        <th>FPB</th>
								        <td>{{ $jebret->FPB }}</td>
								    </tr>
								    <tr>
								        <th>RFQ</th>
								        <td>{{ $jebret->RFQ }}</td>
								    </tr>
								    <tr>
								        <th>SPK</th>
								        <td>{{ $jebret->SPK }}</td>
								    </tr>
								    <tr>
								        <th>Delivery Order</th>
								        <td>{{ $jebret->DO }}</td>
								    </tr>
								    <tr>
								        <th>BAST</th>
								        <td>{{ $jebret->BAST }}</td>
								    </tr>
								    </thead>
								</table>
								
							</div>
						</div>
							
						</div>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->
  