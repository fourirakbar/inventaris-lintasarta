@extends('layouts.lumino')
@section('content')

@endsection
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Detail Request Barang</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Detail Request Barang</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					
					<div class="panel-body">
						<div class="col-md-12">
							<div class="panel panel-default">
							<div class="panel-heading">Data Permintaan dari User</div>
							<div class="panel-body">
								<table class="table table-bordered">
								    <thead>	
								    <tr>
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
