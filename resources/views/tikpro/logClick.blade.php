@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        Log
        <small>Titik Proses</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Log Titik Proses</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Log Titik Proses</h3>
            </div>
            @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
            @endif
            <div class="box-body" style="padding-right: 30%">
              <table class="table table-bordered table-striped">
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
            <!-- /.box-header -->
            <!-- form start -->

            </div>

            </div>
            <!-- /.box-body -->
          </div>
          <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Detail Data Perubahan Titik Proses</h4>
            </div>
            <div class="modal-body">
              <!-- <table id="example1" class="table table-bordered table-hover"> -->
              <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                      <th style="text-align: center; vertical-align: middle; ">No</th>
                      <th style="text-align: center; vertical-align: middle; ">Nama Proses (yang lama)</th>
                      <th style="text-align: center; vertical-align: middle; ">Deadline (yang lama)</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <!-- buat index di kolom "NO" -->
                  <?php
                    $indexNo=1;
                  ?>
                  @foreach ($tikproLama as $index)
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
                      <th style="text-align: center; vertical-align: middle; ">No</th>
                      <th style="text-align: center; vertical-align: middle; ">Nama Proses (yang baru)</th>
                      <th style="text-align: center; vertical-align: middle; ">Deadline (yang baru)</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  <!-- buat index di kolom "NO" -->
                  <?php
                    $indexNo=1;
                  ?>
                  @foreach ($tikproBaru as $index)
                      <tr>
                        <td style="text-align: center; vertical-align: middle;" data-dismiss="modal" >{{ $indexNo++ }}</td>
                        <td style="text-align: center; vertical-align: middle;" data-dismiss="modal" >{{ $index->NAMA_TIKPRO }}</td>
                        <td style="text-align: center; vertical-align: middle;" data-dismiss="modal" >{{ $index->DEADLINE }}</td>
                      </tr>
                  @endforeach
                  </tbody>
                </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
@endsection
@section('javas')
<!-- DataTables -->
  <script src="{{URL::asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
@endsection
