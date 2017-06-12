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
			<!-- <div class="col-lg-12"> -->
			<div style="width: 250%;">
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
								<!-- <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc"> -->


								    <thead>	
								    <tr>
								    	<th style="text-align: center; vertical-align: middle; width: 1%;">ID Requester</th>
								    	<th style="text-align: center; vertical-align: middle; width: 5%; ">Nama Requester</th>
								    	<th style="text-align: center; vertical-align: middle; width: 5%; ">Tanggal Permintaan</th>
								    	<th style="text-align: center; vertical-align: middle; width: 5%; ">Barang yang Diminta</th>
								    	<th style="text-align: center; vertical-align: middle; width: 7%; ">No FPBJ</th>
								    	<th style="text-align: center; vertical-align: middle; width: 5%; ">Tanggal Input FPBJ</th>
								    	<th style="text-align: center; vertical-align: middle; width: 5%; ">Tanggal Target Selesai</th>
								    	<th style="text-align: center; vertical-align: middle; width: 20%; ">Keterangan</th>
								    	<th style="text-align: center; vertical-align: middle; width: 5%; ">Tanggal Tindak Lanjut Akhir</th>
								    	<th style="text-align: center; vertical-align: middle; width: 5%; ">Status</th>
								    	<th style="text-align: center; vertical-align: middle; width: 5%; ">FPB</th>
								    	<th style="text-align: center; vertical-align: middle; width: 5%; ">RFQ</th>
								    	<th style="text-align: center; vertical-align: middle; width: 5%; ">SPK</th>
								    	<th style="text-align: center; vertical-align: middle; width: 5%; ">Delivery Order</th>
								    	<th style="text-align: center; vertical-align: middle; width: 5%; ">BAST</th>
								    </tr>
								    <tr>
								    	<td style="text-align: center; ">{{ $jebret->ID_PERMINTAAN }}</td>
								    	<td style="text-align: center; ">{{ $jebret->NAMA_REQUESTER }}</td>
								    	<td style="text-align: center; "><?php echo date('d F Y H:i:s', strtotime($jebret->TGL_PERMINTAAN)) ?> </td>
								    	
								    	<td style="text-align: center; ">{{ $jebret->BARANG_PERMINTAAN }}</td>
								    	<td style="text-align: center; ">{{ $jebret->NO_FPBJ }}</td>
								    	<td style="text-align: center; "><?php echo date('d F Y', strtotime($jebret->TGL_INPUT_FPBJ)) ?> </td>
										<td style="text-align: center; "><?php echo date('d F Y', strtotime($jebret->TARGET_SELESAI)) ?> </td>
								    	<td style="text-align: center; ">{{ $jebret->KETERANGAN }}</td>
								    	<td style="text-align: center; "><?php echo date('d F Y', strtotime($jebret->TINDAK_LANJUT_AKHIR)) ?> </td>
								    	<td style="text-align: center; ">{{ $jebret->STATUS }}</td>
								    	<td style="text-align: center; "><?php echo date('d F Y', strtotime($jebret->FPB)) ?> </td>
								    	<td style="text-align: center; "><?php echo date('d F Y', strtotime($jebret->RFQ)) ?> </td>
								    	<td style="text-align: center; "><?php echo date('d F Y', strtotime($jebret->SPK)) ?> </td>
								    	<td style="text-align: center; "><?php echo date('d F Y', strtotime($jebret->DO)) ?> </td>
								    	<td style="text-align: center; "><?php echo date('d F Y', strtotime($jebret->BAST)) ?> </td>
								    </tr>
								    <!-- <tr>
								        <th width="200px">ID Permintaan</th>
								        <td>{{ $jebret->ID_PERMINTAAN }}</td>
								    </tr>
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
								        <td>{{ $jebret->NO_FPBJ }}</td>
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
								    </tr> -->
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
