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
								        <th>Nama Requester</th>
								        <th>Tanggal Permintaan</th>
								        <th>Barang yang Diminta</th>
								        <th>Action</th>
								    </tr>
								    @foreach ($jebret as $key)
								    <tr>
								    	<td>{{ $key->ID_PERMINTAAN }}</td>
								    	<td>{{ $key->NAMA_REQUESTER }}</td>
								    	<td>{{ $key->TGL_PERMINTAAN }}</td>
								    	<td>{{ $key->BARANG_PERMINTAAN }}</td>
								    	<td>
            								<input type="hidden" name="method" value="DELETE">
            								<a class="btn btn-primary" href="/semua/lihat/{{ $key->ID_PERMINTAAN }}"><b class="material-icons" title="Ubah pengumuman">Show Details</b></a>
								    	</td>
								    </tr>
								    @endforeach
								    
								    </thead>
								</table>
								{!! $jebret->render() !!}
							</div>
						</div>
							
						</div>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->
