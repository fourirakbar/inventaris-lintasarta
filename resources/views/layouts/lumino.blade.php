<!DOCTYPE html>
<html>
<head>
	@include('includes.head')

	<title></title>
</head>
<body>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="js/sweetalert2.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<script>
		$('#calendar').datepicker({
		});

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

	<div class="container">
		<header class="row">
			@include('includes.header')
		</header>

		<div id="main" class="row">
			<div id="sidebar" class="col-md-4">
				@include('includes.sidebar')
			</div>
			<div id="main" class="row"> 
				@yield('content')
			</div>
		</div>

		
	</div>

</body>
</html>