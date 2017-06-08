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
            								<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Show Detail</button>
								    	</td>
								    </tr>
								    @endforeach
								    </thead>
								    </table>
								    <div id="myModal" class="modal fade" role="dialog">
									  <div class="modal-dialog modal-lg">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal">&times;</button>
									        <h4 class="modal-title">Modal Header</h4>
									      </div>
									      <div class="modal-body">
									      <table class="table table-bordered">
									      	<thead>
										      <tr>
										      	<th width="100px">Id Permintaan</th>
										      	<td>{{ $key->ID_PERMINTAAN }}</td>
										      </tr>
										      <tr>
										      	<th>Nama Requester</th>
												<td>{{ $key->NAMA_REQUESTER }}</td>
										      </tr>
									      	</thead>
									      </table>  

									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									      </div>
									    </div>

									  </div>
									</div>
								{!! $jebret->render() !!}
							</div>
						</div>
							
						</div>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->
