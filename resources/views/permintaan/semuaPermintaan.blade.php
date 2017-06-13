@extends('layouts.lumino')
@section('content')
@endsection
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">Dashboard</a></li>
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
								        <th style="text-align: center; vertical-align: middle; ">No. Tiket</th>
								        <th style="text-align: center; vertical-align: middle; ">Nama Requester</th>
								        <th style="text-align: center; vertical-align: middle; ">Tanggal Permintaan</th>
								        <th style="text-align: center; vertical-align: middle; ">Barang yang Diminta</th>
								        <th style="text-align: center; vertical-align: middle; ">Status</th>
								        <th style="text-align: center; vertical-align: middle; ">Sisa Hari</th>
								        <th style="text-align: center; vertical-align: middle; ">Action</th>
								    </tr>
								    @foreach ($jebret as $key)
								    <tr id="datete">
								    	<td style="text-align: center; vertical-align: middle; ">{{ $key->NOMOR_TICKET }}</td>
								    	<td>{{ $key->NAMA_REQUESTER }}</td>
								    	<td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y', strtotime($key->TGL_PERMINTAAN)) ?></td>
								    	<td>{{ $key->BARANG_PERMINTAAN }}</td>
								    	<td style="text-align: center; vertical-align: middle; ">{{ $key->STATUS }}</td>
								    	<?php $date1=date_create();
						    				 $date2=date_create($key->TGL_DEADLINE);
						    				 $diff=date_diff($date1,$date2);

						    				 $print = $diff->format('%R%a Hari');
						    				 $printInt = (int)$print;

						    				 if ($printInt < 0) {
						    				 	$print = "0 Hari";
						    				 }

						    				 if($print <=60 && $print > 10)
						    				 {
						    				 	echo '<td style="background-color: green; color: white" >',$diff->format('%a Hari'),'</td>';
						    				 }
						    				 elseif($print <=10 && $print >=1)
						    				 {
						    				 	echo '<td style="background-color: yellow; color: black" >',$diff->format('%a Hari'),'</td>';
						    				 }
						    				 else
						    				 {
						    				 	echo '<td style="background-color: red; color: white" >',$print,'</td>';
						    				 }
								    	 ?>
								    	<td style="text-align: center; vertical-align: middle; ">

								    		<?php
								    			if ($print > 0) { ?>
								    			<input type="hidden" name="method" value="DELETE">
            									<a class="btn btn-primary" href="/semua/lihat/{{ $key->ID_PERMINTAAN }}"><b class="material-icons" title="Ubah pengumuman">Show Details</b></a>
								    		<?php
								    			}
								    		?>
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