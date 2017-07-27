@extends('layouts.lumino')
@section('content')
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <b>SISTEM DOKUMENTASI</b><br>DAN MONITORING<br><b>TI INFRASTRUKTUR</b>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
    @elseif ($message = Session::get('error'))
      <div class="alert alert-danger">
        <p>{{ $message }}</p>
      </div>
    @endif

    <form action="{{URL::to('register')}}" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Full name" name="nama" required="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      {{csrf_field()}}
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username" required="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      {{csrf_field()}}
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      {{csrf_field()}}
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="{{ URL::to('home') }}" class="text-center">Back to Home Page</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
</body>
    <!-- ./col -->
  </div>

</section>
@endsection
@section('javas')
<!-- jQuery 3.1.1 -->
<script src="{{ URL::asset('plugins/jQuery/jquery-3.1.1.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ URL::asset('plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
@endsection
