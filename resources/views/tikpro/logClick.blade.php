@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        Log Update Titik Proses
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Log Update Titik Proses</li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
          @elseif ($message = Session::get('gagal'))
            <div class="alert alert-warning">
                <p>{{ $message }}</p>
              </div>
            @endif
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Log Update Titik Proses</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                            <th style="text-align: center; vertical-align: middle; ">NO</th>
                            <th style="text-align: center; vertical-align: middle; ">Log Update</th>
                            <th style="text-align: center; vertical-align: middle; ">Tanggal - Jam</th>
                            <th style="text-align: center; vertical-align: middle; ">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                      $count = 1;
                    ?>
                    @foreach ($isi as $key)
                    <tr>
                      <td style="text-align: center; vertical-align: middle; ">{{ $count++ }}</td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $key->ISI }}</td>
                      <td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y - H:i:s', strtotime($key->updated_at)) ?></td>
                      <td style="text-align: center; vertical-align: middle; ">
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><b class="material-icons">Show Detail Perubahan</b></button> -->
                        <a href="/log_click/details/{{ $key->ID_LOG }}"><button type="button" class="btn btn-primary btn-lg pull-right">Show Detail Perubahan</button></a>
                      </td>
                    </tr>
                    @endforeach
                    </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.row -->
    </section>

@endsection
@section('javas')
<!-- DataTables -->
  <script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
  <script>
    $(function () {
      $('#example1').DataTable();
    });
  </script>
@endsection
