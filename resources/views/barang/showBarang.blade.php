@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        Lihat Semua Barang
        <small>Lihat Semua Data Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Lihat Semua Barang</li>

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
            @endif
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Semua Barang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                        <th style="text-align: center; vertical-align: middle; ">No</th>
                        <th style="text-align: center; vertical-align: middle; ">No. Registrasi</th>
                        <th style="text-align: center; vertical-align: middle; ">Nama Barang</th>
                        <th style="text-align: center; vertical-align: middle; ">Harga</th>
                        <th style="text-align: center; vertical-align: middle; ">Keterangan</th>
                        <th style="text-align: center; vertical-align: middle; ">Nama Rack</th>
                        <th style="text-align: center; vertical-align: middle; ">Lokasi Rack</th>
                        <th style="text-align: center; vertical-align: middle; ">Status</th>
                        <th style="text-align: center; vertical-align: middle; ">Action</th>
                </tr>
                </thead>
                <tbody>

                <!-- buat index di kolom "NO" -->
                <?php
                  $indexNo=1;
                ?>
                @foreach ($barang as $index)
                    <tr>
                      <td style="text-align: center; vertical-align: middle; ">{{ $indexNo++ }}</td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $index->NOMOR_REGISTRASI }}</td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $index->NAMA_BARANG }}</td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $index->HARGA_BARANG }}</td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $index->KETERANGAN }}</td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $index->NAMA_RACK }}</td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $index->LOKASI_RACK }}</td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $index->STATUS_BARANG }}</td>
                      <td style="text-align: center; vertical-align: middle; ">
                        <input type="hidden" name="method" value="DELETE">
                        <a class="btn btn-block btn-primary" href="/showbarang/edit/{{ $index->ID_BARANG }}"><b class="material-icons">EDIT</b></td>
                    </tr>
                @endforeach
                </tbody>
              </table>
              @if(\Request::is('showbarang'))
                <a href="/export/barang" class="btn btn-primary pull-left">Download Excel File</a>
              @endif
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
