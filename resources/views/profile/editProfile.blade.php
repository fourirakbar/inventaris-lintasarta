@extends('layouts.lumino')
@section('content')
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <b>Edit Profile</b>
  </div>

  <div class="register-box-body">
    @if ($message = Session::get('sukses'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
    @elseif ($message = Session::get('gagal'))
      <div class="alert alert-danger">
        <p>{{ $message }}</p>
      </div>
    @endif

    <form action="{{ URL::to('/editprofile/edit', $profile[0]->ID_REQUESTER) }}" method="POST">
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" value="{{ $profile[0]->NAMA_REQUESTER }}" name="NAMA_REQUESTER">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" value="{{ $profile[0]->username }}" name="username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password Lama" name="password_lama" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password Baru" name="password" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Update Profile</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="{{ URL::to('home') }}" class="text-center">Back to Home Page</a>
  </div>
  <!-- /.form-box -->
</div>
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