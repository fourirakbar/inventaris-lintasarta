 @extends('layouts.lumino')
@section('content')

<section class="content-header">
      <h1>
        Details Data
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/semua">Data Request Barang yang Belum Selesai</a></li>
        <li class="active">Details Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data</h3><br><br>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                      <th style="text-align: center; vertical-align: middle; background-color: gray; color: white;">No</th>
                      <th style="text-align: center; vertical-align: middle; background-color: gray; color: white;">Nama Proses (yang lama)</th>
                      <th style="text-align: center; vertical-align: middle; background-color: gray; color: white;">Deadline (yang lama)</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <!-- buat index di kolom "NO" -->
                  <?php
                    $indexNo=1;
                  ?>
                  @foreach ($jebret2 as $index)
                      <tr>
                        <td style="text-align: center; vertical-align: middle;" data-dismiss="modal" >{{ $indexNo++ }}</td>
                        <td style="text-align: center; vertical-align: middle;" data-dismiss="modal" >{{ $index->NAMA_TIKPRO_LAMA }}</td>
                        <td style="text-align: center; vertical-align: middle;" data-dismiss="modal" >{{ $index->DEADLINE_TIKPRO_LAMA }}</td>
                      </tr>
                  @endforeach
                  </tbody>
                </table>
                <table style="float: left;" id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                      <th style="text-align: center; vertical-align: middle; background-color: gray; color: white;">No</th>
                      <th style="text-align: center; vertical-align: middle; background-color: gray; color: white;">Nama Proses (yang baru)</th>
                      <th style="text-align: center; vertical-align: middle; background-color: gray; color: white;">Deadline (yang baru)</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <!-- buat index di kolom "NO" -->
                  <?php
                    $indexNo=1;
                  ?>
                  @foreach ($jebret3 as $index)
                      <tr>
                        <td style="text-align: center; vertical-align: middle; " data-dismiss="modal" >{{ $indexNo++ }}</td>
                        <td style="text-align: center; vertical-align: middle;" data-dismiss="modal" >{{ $index->NAMA_TIKPRO }}</td>
                        <td style="text-align: center; vertical-align: middle;" data-dismiss="modal" >{{ $index->DEADLINE }}</td>
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
  
@endsection
