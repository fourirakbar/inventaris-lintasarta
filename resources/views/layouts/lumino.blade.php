<!DOCTYPE html>
<html>
<head>
	<title> SI MONITORING DAN DOKUMENTASI TI INFRATRUKTUR </title>
	@include('includes.head')
</head>
<body>
	<div class="container">
		@include('includes.header')
	</div>
	<div id="sidebar">
		@include('includes.sidebar')
	</div>
	<div id="main"> 
		@yield('content')
	</div>
	
	<script type="text/javascript" src="{{ URL::asset('/js/jquery-1.11.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('/js/chart.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('/js/chart-data.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('/js/easypiechart.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('/js/easypiechart-data.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('/js/bootstrap-datepicker.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('/js/coba.js') }}"></script>
	
	<script type="text/javascript">
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
	<script type="text/javascript">
		$(document).on("click", ".open-myModal", function () {
		    var myBookId = $(this).data('id');
		    console.log(myBookId);
		    $(".modal-body #bookId").text( myBookId );
		    $('#addBookDialog').modal('show');
		});
	</script>

</body>
</html>