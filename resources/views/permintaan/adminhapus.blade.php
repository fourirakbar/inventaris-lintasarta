@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        Pembatalan Permintaan
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/semua">Data Request Barang yang Belum Selesai</a></li>
        <li><a href="{{ url('/semua/lihat') }}">Details Data</a></li>
        <li class="active">Edit Data</li>
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
              <h3 class="box-title">Data</h3>
            </div>
            <!-- /.box-header -->
            <div style="margin: 0 10% 0 10%;" class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                        <th style="text-align: center; vertical-align: middle; ">No</th>
                        <th style="text-align: center; vertical-align: middle; ">Nomor Ticket</th>
                        <th style="text-align: center; vertical-align: middle; ">Nama Requester</th>
                        <th style="text-align: center; vertical-align: middle; ">Status Pembatalan</th>
                        <th style="text-align: center; vertical-align: middle; ">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $indexNo=1; ?>
                @foreach ($jebret as $key)
                    <tr>
                      <td style="text-align: center; vertical-align: middle; ">{{ $indexNo++ }}</td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $key->NOMOR_TICKET }}</td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $key->NAMA_REQUESTER }}</td>
                      @if($key->STATUS_PEMBATALAN === "done")
                        <td style="text-align: center; vertical-align: middle; background-color: green; color: white;">{{ $key->STATUS_PEMBATALAN }}</td>
                      @else
                        <td style="text-align: center; vertical-align: middle; background-color: red; color: white;">{{ $key->STATUS_PEMBATALAN }}</td>
                      @endif
                      <td style="text-align: center; vertical-align: middle; ">
                        <input type="hidden" name="method" value="DELETE">
                        <a class="btn btn-block btn-primary" href="{{ URL::to('/adminhapus/lihat', $key->ID_PERMINTAAN) }}"><b class="material-icons">Show Details</b></a>
                      </td>
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
