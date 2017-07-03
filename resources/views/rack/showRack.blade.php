@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        Show Rack 
        <small>Lihat Semua Data Rack</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Show Rack</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
        <div class="box box-primary">
            @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
            @endif

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                        <th style="text-align: center; vertical-align: middle; ">ID Rack</th>
                        <th style="text-align: center; vertical-align: middle; ">Nama Rack</th>
                        <th style="text-align: center; vertical-align: middle; ">Lokasi Rack</th>
                        <th style="text-align: center; vertical-align: middle; ">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($rack as $index)
                    <tr>
                      <td style="text-align: center; vertical-align: middle; ">{{ $index->ID_RACK }}</td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $index->NAMA_RACK }}</td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $index->LOKASI_RACK }}</td>
                      <td style="text-align: center; vertical-align: middle; "><input type="hidden" name="method" value="DELETE">
                        <a class="btn btn-block btn-primary" href="/rack/edit/{{ $index->ID_RACK }}"><b class="material-icons">Edit Rack</b>
                        <input type="hidden" name="method" value="DELETE">
                        <a class="btn btn-block btn-danger" href="/deleterack/{{ $index->ID_RACK }}"><b class="material-icons">Hapus Rack</b></td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
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
