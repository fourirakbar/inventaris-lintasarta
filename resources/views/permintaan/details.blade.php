@extends('layouts.lumino')
@section('content')

@endsection
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">Dashboard</a></li>
				<li><a href="/semua">Semua Request Barang</a></li>
				<li class="active">Detail Request Barang</li>
			</ol>
		</div><!--/.row-->

		@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@endif
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Detail Request Barang</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
			<div>
				<div class="panel panel-default">
					
					<div class="panel-body">
						<div class="col-md-12">
							<div class="panel panel-default">
							<div class="panel-heading">Data Permintaan dari User</div>
							<div class="panel-body">

									
								<input type="hidden" name="method">
            					<a class="btn btn-primary pull-left" href="/semua/lihat/edit/{{ $jebret->ID_PERMINTAAN }}"><b class="material-icons" title="Ubah pengumuman">Edit Keterangan</b></a>
								

								
            					<br>
            					<br>

            					<br>

								<table class="table table-bordered">

								    <thead>	
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Nomor Ticket</th>
								        <td>{{ $jebret->NOMOR_TICKET }}</td>
								    </tr>
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Nama Requester</th>
								        <td>{{ $jebret->NAMA_REQUESTER }}</td>
								    </tr>
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Tanggal Permintaan</th>
								        <td><?php echo date('d F Y', strtotime($jebret->TGL_PERMINTAAN)) ?></td>
								    </tr>
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Barang yang Diminta</th>
								        <td>{{ $jebret->BARANG_PERMINTAAN }}</td>
								    </tr>
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">No FPBJ</th>
								        <td>{{ $jebret->NO_FPBJ }}</td>
								    </tr>
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Tanggal Target Selesai</th>
								        <td>
								        	<?php
								        		if ($jebret->TARGET_SELESAI) {
								        			echo date('d F Y', strtotime($jebret->TARGET_SELESAI));
								        		}
								        	?>
								        </td>
								    </tr>
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Keterangan</th>
								        <td>{{ $jebret->KETERANGAN }}</td>
								    </tr>
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Tanggal Tindak Lanjut Akhir</th>
								        <td>
								        	<?php
								        		if ($jebret->TINDAK_LANJUT_AKHIR) {
								        			echo date('d F Y', strtotime($jebret->TINDAK_LANJUT_AKHIR));
								        		}
								        	?>
								        </td>
								    </tr>
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Status</th>
								        <td>{{ $jebret->STATUS }}</td>
								    </tr>
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">FPB</th>
								        <td>
								        	<?php
								        		if ($jebret->FPB) {
								        			echo date('d F Y', strtotime($jebret->FPB));
								        		}
								        	?>
								        </td>
								    </tr>
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">RFQ</th>
								        <td>
								        	<?php
								        		if ($jebret->RFQ) {
								        			echo date('d F Y', strtotime($jebret->RFQ));
								        		}
								        	?>
								        </td>
								    </tr>
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">SPK</th>
								        <td>
								        	<?php
								        		if ($jebret->SPK) {
								        			echo date('d F Y', strtotime($jebret->SPK));
								        		}
								        	?>
								        </td>
								    </tr>
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Delivery Order</th>
								        <td>
								        	<?php
								        		if ($jebret->DO) {
								        			echo date('d F Y', strtotime($jebret->DO));
								        		}
								        	?>
								        </td>
								    </tr>
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">BAST</th>
								        <td>
								        	<?php
								        		if ($jebret->BAST) {
								        			echo date('d F Y', strtotime($jebret->BAST));
								        		}
								        	?>
								        </td>
								    </tr>
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">BAST</th>
								        <td>{{ $jebret->titik_proses }}</td>
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
