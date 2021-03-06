@extends('layouts.lumino')
@section('additionalcss')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')

<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <!-- <div class="col-lg-4 col-xs-4">
      <a href={{ URL::to('adminhapus/request') }}>
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3 id="count1">Counting...</h3>

            <p>Permintaan pembatalan yang belum diproses</p>
          </div>
          <div class="icon">
            <i class="ion ion-android-mail"></i>
          </div>
        </div>
      </a>
    </div> -->
    <!-- ./col -->
    <div class="col-lg-4 col-xs-4">
      <!-- small box -->
      <a href={{ URL::to('semuabelum') }}>
        <div class="small-box bg-blue">
          <div class="inner">
            <h3 id="count5">Counting...</h3>

            <p>Permintaan yang sedang diproses</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </a>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-4">
      <!-- small box -->
      <a href={{ URL::to('peminjaman/show/belum') }}>
        <div class="small-box bg-olive">
          <div class="inner">
            <h3 id="count6">Counting...</h3>

            <p>Peminjaman yang sedang diproses</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </a>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-4">
      <!-- small box -->
      <a href={{ URL::to('repair/show/belum') }}>
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3 id="count7">Counting...</h3>

            <p>Perbaikan yang sedang diproses</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </a>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-4">
      <!-- small box -->
      <a href={{ URL::to('monitoring2') }}>
        <div class="small-box bg-green">
          <div class="inner">
            <h3 id="count2">Counting...</h3>

            <p>Permintaan yang prosesnya terlambat</p>
          </div>
          <div class="icon">
            <i class="ion ion-android-alarm-clock"></i>
          </div>
        </div>
      </a>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-4">
      <!-- small box -->
      <a href={{ URL::to('monitoring3') }}>
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3 id="count3">Counting...</h3>

            <p>Peminjaman lewat dari hari pengembalian</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-stopwatch-outline"></i>
          </div>
        </div>
      </a>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-4">
      <!-- small box -->
      <a href={{ URL::to('monitoring4') }}>
        <div class="small-box bg-red">
          <div class="inner">
            <h3 id="count4">Counting...</h3>

            <p>Perbaikan lewat dari tanggal perkiraan selesai</p>
          </div>
          <div class="icon">
            <i class="ion ion-android-time"></i>
          </div>
        </div>
      </a>
    </div>
    <!-- ./col -->
  </div>

</section>

@endsection
@section('javas')
<script type="text/javascript">
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
setInterval(function(){
  $.ajax({
    url: 'getmsg1',
    type: 'POST',
    data: {_token: CSRF_TOKEN},
    dataType: 'JSON',
    success: function (data) {
      console.log(data);
      $('#count1').text(data.batal);
    }
  });
  $.ajax({
    url: 'getmsg2',
    type: 'POST',
    data: {_token: CSRF_TOKEN},
    dataType: 'JSON',
    success: function (data) {
      console.log(data);
      $('#count2').text(data.minta);
    }
  });
  $.ajax({
    url: 'getmsg3',
    type: 'POST',
    data: {_token: CSRF_TOKEN},
    dataType: 'JSON',
    success: function (data) {
      console.log(data);
      $('#count3').text(data.pinjam);
    }
  });
  $.ajax({
    url: 'getmsg4',
    type: 'POST',
    data: {_token: CSRF_TOKEN},
    dataType: 'JSON',
    success: function (data) {
      console.log(data);
      $('#count4').text(data.repair);
    }
  });
  $.ajax({
    url: 'getmsg5',
    type: 'POST',
    data: {_token: CSRF_TOKEN},
    dataType: 'JSON',
    success: function (data) {
      console.log(data);
      $('#count5').text(data.minta);
    }
  });
  $.ajax({
    url: 'getmsg6',
    type: 'POST',
    data: {_token: CSRF_TOKEN},
    dataType: 'JSON',
    success: function (data) {
      console.log(data);
      $('#count6').text(data.pinjam);
    }
  });
  $.ajax({
    url: 'getmsg7',
    type: 'POST',
    data: {_token: CSRF_TOKEN},
    dataType: 'JSON',
    success: function (data) {
      console.log(data);
      $('#count7').text(data.repair);
    }
  });
},2000);
</script>
@endsection