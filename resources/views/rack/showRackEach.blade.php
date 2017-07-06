@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        Show Details Rack
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/rack/show"><i class="fa fa-dashboard"></i> Show Rack</a></li>
        <li class="active">Show Details Rack</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                        <th style="text-align: center; vertical-align: middle; ">ID Barang</th>
                        <th style="text-align: center; vertical-align: middle; ">No. Registrasi</th>
                        <th style="text-align: center; vertical-align: middle; ">Nama Barang</th>
                        <th style="text-align: center; vertical-align: middle; ">Jumlah Barang</th>
                        <th style="text-align: center; vertical-align: middle; ">Keterangan</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($rack as $index)
                    <tr>
                      <td style="text-align: center; vertical-align: middle; ">{{ $index->ID_BARANG }}</td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $index->NOMOR_REGISTRASI }}</td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $index->NAMA_BARANG }}</td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $index->JUMLAH }}</td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $index->KETERANGAN }}</td>
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
