@extends('layouts.lumino')

@section('content')

@stop

	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Semua Permintaan Barang</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Permintaan Barang</div>
					<div class="panel-body">
						<table class="table table-bordered">
						    <thead>	
						    <tr>
						        <th style="text-align: center; vertical-align: middle; ">No</th>
						        <th style="text-align: center; vertical-align: middle; ">No Registrasi</th>
						        <th style="text-align: center; vertical-align: middle; ">Nama Barang</th>
						        <th style="text-align: center; vertical-align: middle; ">Jumlah</th>
						        <th style="text-align: center; vertical-align: middle; ">Keterangan</th>
						        <th style="text-align: center; vertical-align: middle; ">Lokasi</th>
						        <th style="text-align: center; vertical-align: middle; ">Rack</th>
						        <th style="text-align: center; vertical-align: middle; ">Alokasi Gudang</th>
						        <th style="text-align: center; vertical-align: middle; ">Status Pemindahan</th>
						    </tr>
						    @foreach ($data as $key)
						    <tr>
						    	<td style="text-align: center; vertical-align: middle; ">{{ $key->ID_PERMINTAAN }}</td>
						    	<td>{{ $key->NAMA_REQUESTER }}</td>
						    	<td style="text-align: center; vertical-align: middle; ">{{ $key->TGL_PERMINTAAN }}</td>
						    	<td>{{ $key->BARANG_PERMINTAAN }}</td>
						    	<td style="text-align: center; vertical-align: middle; ">
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
		</div><!--/.row-->	
		
		
		
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
