<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> SI MONITORING DAN DOKUMENTASI TI INFRATRUKTUR </title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- daterange picker -->
	<link rel="stylesheet" href="{{URL::asset('plugins/daterangepicker/daterangepicker.css')}}">
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="{{URL::asset('plugins/datepicker/datepicker3.css')}}">
	<link rel="stylesheet" href="{{URL::asset('plugins/datatables/dataTables.bootstrap.css')}}">
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="{{URL::asset('plugins/iCheck/all.css')}}">
	<!-- Bootstrap Color Picker -->
	<link rel="stylesheet" href="{{URL::asset('plugins/colorpicker/bootstrap-colorpicker.min.css')}}">
	<!-- Bootstrap time Picker -->
	<link rel="stylesheet" href="{{URL::asset('plugins/timepicker/bootstrap-timepicker.min.css')}}">
	<!-- Select -->
	<link rel="stylesheet" href="{{URL::asset('plugins/select2/select2.min.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{URL::asset('dist/css/AdminLTE.min.css')}}">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
	   folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="{{URL::asset('dist/css/skins/_all-skins.min.css')}}">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<header class="main-header">
		@include('includes.header')
	</header>
	
	<aside class="main-sidebar">
		@include('includes.sidebar')
	</aside>
	
	<div class="content-wrapper"> 
		@yield('content')
	</div>
	
</div>
	<div class="control-sidebar-bg"></div>
	<script src="{{URL::asset('plugins/jQuery/jquery-3.1.1.min.js')}}"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
	<!-- SlimScroll -->
	<script src="{{URL::asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
	<!-- iCheck 1.0.1 -->
	<script src="{{URL::asset('plugins/iCheck/icheck.min.js')}}"></script>
	<!-- FastClick -->
	<script src="{{URL::asset('plugins/fastclick/fastclick.js')}}"></script>
	<!-- AdminLTE App -->
	<script src="{{URL::asset('dist/js/adminlte.min.js')}}"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="{{URL::asset('dist/js/demo.js')}}"></script>
	<!-- page script -->
	<div>
		@yield('javas')
	</div>
</body>
</html>
