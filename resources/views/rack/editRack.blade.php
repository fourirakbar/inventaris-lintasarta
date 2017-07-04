@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        Edit Detail Rack
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/showrack">Data Semua Rack</a></li>
        <li class="active">Edit Rack</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            @if ($message = Session::get('error'))
              <div class="alert alert-danger">
                <p>{{ $message }}</p>
              </div>
            @endif
            <div class="box-header with-border">
              <h3 class="box-title">Data</h3>
              <button class="btn btn-danger pull-right delete-rack">Hapus Rack</button>
            </div>
        <div class="box-body" style="padding-right: 10%; padding-left: 10%; padding-bottom: 5%">    
          <form action="{{ url('/rack/edit', $rack->ID_RACK) }}" method="POST">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label>Nama Rack</label>
                <input class="form-control" value="{{ $rack->NAMA_RACK }}" name="NAMA_RACK">
              </div>

              <div class="form-group">
                <label>Lokasi Rack</label>
                <input class="form-control" value="{{ $rack->LOKASI_RACK }}" name="LOKASI_RACK">
              </div>

              <button type="submit" class="btn btn-primary pull-right">Update</button>&nbsp;&nbsp;
          </form>
        </div>
            <!-- /.box-header -->
            <!-- form start -->

            </div>

            </div>
            <!-- /.box-body -->
          </div>
    </section>
@endsection
@section('javas')
<script type="text/javascript">
$("button.delete-rack").click(function() {
    swal({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then(function () {
      window.location.href = "{{ URL::to('/rack/delete', $rack->ID_RACK) }}";
    })
});
</script>
@endsection
