@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        Show Rack 
        <small>Lihat Semua Data Repair</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Show Repair</li>
        
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
                            <th style="text-align: center; vertical-align: middle; ">No.</th>
                            <th style="text-align: center; vertical-align: middle; ">Nama Barang</th>
                            <th style="text-align: center; vertical-align: middle; ">No. Registrasi</th>
                            <th style="text-align: center; vertical-align: middle; ">Problem</th>
                            <th style="text-align: center; vertical-align: middle; ">Vendor</th>
                            <th style="text-align: center; vertical-align: middle; ">Sisa Hari</th>
                            <th style="text-align: center; vertical-align: middle; ">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $indexNo=1;
                  ?>
                  @foreach ($repair as $index)
                      <tr>
                        <td style="text-align: center; vertical-align: middle; ">{{ $indexNo++ }}</td>
                        <td style="text-align: center; vertical-align: middle; ">{{ $index->NAMA_BARANG}}</td>
                        <td style="text-align: center; vertical-align: middle; ">{{ $index->NOMOR_REGISTRASI }}</td>
                        <td style="text-align: center; vertical-align: middle; ">{{ $index->PROBLEM }}</td>
                        <td style="text-align: center; vertical-align: middle; ">{{ $index->VENDOR }}</td>
                        <?php
                            $datenow=date_create();
                            $datefinish=date_create($index->PERKIRAAN_SELESAI);
                            $diff=date_diff($datenow,$datefinish);
                            $print = $diff->format('%R%a Hari');
                            $printInt = (int)$print;
                        ?>
                        @if($print > 3)
                          <td style="background-color: green; color: white; text-align: center; vertical-align: middle; ">{{ $print }}</td>
                        @elseif ($print <= 3)
                          <td style="background-color: yellow; color: white; text-align: center; vertical-align: middle; ">{{ $print }}</td>
                        @else
                          <td style="background-color: red; color: white; text-align: center; vertical-align: middle; ">{{ $print }}</td>
                        @endif
                        <td style="text-align: center; vertical-align: middle; ">
                          <a class="btn btn-info" href="/repair/show/detail/{{ $index->ID_PERBAIKAN }}">
                            <i class="fa fa-search"></i> Detail
                          </a>
                          @if ($index->STATUS_REPAIR !== "Done")
                            <a class="btn btn-primary" href="/repair/selesai/{{ $index->ID_PERBAIKAN }}">
                              <i class="fa fa-check"></i> Selesai
                            </a>
                          @else
                            
                          @endif
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
