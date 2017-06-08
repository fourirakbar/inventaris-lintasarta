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
						<table data-toggle="table" data-url="tables/data2.json" >
						<!-- <table> -->
						    <thead>
						    <tr>
						    	<th>No</th>
						        <th>Request Id</th>
						        <th>Requester</th>
						        <th>Barang yang Dibutuhkan</th>
						        <th>Tanggal Request</th>
						        <th>No FPBJ</th>
						        <th>Tanggal Input FPBJ</th>
						        <th>Target Selesai FPBJ</th>
						        <th>Status Lanjutan</th>
						        <th>Tanggal Tindak Lanjut Terakhir</th>
						        <th>Status</th>
						        <th>FPB</th>
						        <th>RFQ</th>
						        <th>SPK</th>
						        <th>Delivery Order</th>
						        <th>Bast</th>
						    </tr>
						    
						    </thead>
						</table>
						
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
