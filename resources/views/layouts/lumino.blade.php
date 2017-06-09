<!DOCTYPE html>
<html>
<head>
	@include('includes.head')

	<title></title>
</head>
<body>
<!-- <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet"> -->
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