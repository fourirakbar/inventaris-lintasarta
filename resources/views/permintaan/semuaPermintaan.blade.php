@extends('layouts.lumino')
@section('content')
@endsection
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Semua Request Barang</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Semua Request Barang</h1>
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
								        <th>ID Permintaan</th>
								        <th>Tanggal Permintaan</th>
								        <th>Barang yang Diminta</th>
								        <!-- <th>NO FPBJ</th>
								        <th>Tgl Targe Selesai</th>
								        <th>Keterangan</th>
								        <th>Tgl Tindak Lanjut Terakhir</th>
								        <th>Status</th>
								        <th>FPB</th>
								        <th>RFQ</th>
								        <th>SPK</th>
								        <th>Delivery Order</th>
								        <th>Bast</th> -->
								        <th>Action</th>
								    </tr>
								    @foreach ($jebret as $key => $permintaan)
								    <tr>
								    	<td>{{ $permintaan->ID_PERMINTAAN }}</td>
								    	<td>{{ $permintaan->TGL_PERMINTAAN }}</td>
								    	<td>{{ $permintaan->BARANG_PERMINTAAN }}</td>
								    	<!-- <td>{{ $permintaan->NO_FPBJ }}</td>
								    	<td>{{ $permintaan->TARGET_SELESAI }}</td>
								    	<td>{{ $permintaan->KETERANGAN }}</td>
								    	<td>{{ $permintaan->TINDAK_LANJUT_AKHIR }}</td>
								    	<td>{{ $permintaan->STATUS }}</td>
								    	<TD>{{ $permintaan->FPB }}</TD>
								    	<TD>{{ $permintaan->RFQ }}</TD>
								    	<TD>{{ $permintaan->SPK }}</TD>
								    	<TD>{{ $permintaan->DO }}</TD>
								    	<TD>{{ $permintaan->BAST }}</TD> -->
								    	<td>
            								<input type="hidden" name="method" value="DELETE">
            								<a class="btn green" style="height: 20px; line-height: 10px; padding: 0 1rem;" href="/semua/lihat/{{ $jebret->ID_PERMINTAAN }}"><i class="material-icons" title="Ubah pengumuman" style=" width: 1rem; font-size: 1rem; line-height: 1.5rem; margin-right: 0px;">mode_edit</i></a>
								    	</td>
								    </tr>
								    @endforeach
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
