@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        Data Permintaan 
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Request Barang</li>
        
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
            <?php

              $deadline = array();
              for ($i = 1 ; $i <= count($jebret2) ; $i++){
                if (empty($deadline)) {
                  array_push($deadline, $jebret2[$i-1]->DEADLINE);
                }
                else{
                  array_push($deadline, $jebret2[$i-1]->DEADLINE + $deadline[$i-2]); 
                }
              }
            ?>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                        <th style="text-align: center; vertical-align: middle; ">No. Tiket</th>
                        <th style="text-align: center; vertical-align: middle; ">Nama Requester</th>
                        <th style="text-align: center; vertical-align: middle; ">Tanggal Permintaan</th>
                        <th style="text-align: center; vertical-align: middle; ">Barang yang Diminta</th>
                        <th style="text-align: center; vertical-align: middle; ">Sisa Hari</th>      
                        <th style="text-align: center; vertical-align: middle; ">Titik Proses</th>
                        <th style="text-align: center; vertical-align: middle; ">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($jebret as $key)
                    <tr>
                      <td style="text-align: center; vertical-align: middle; ">{{ $key->NOMOR_TICKET }}</td>
                      <td>{{ $key->NAMA_REQUESTER }}</td>
                      <td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y', strtotime($key->TGL_PERMINTAAN)) ?></td>
                      <td>{{ $key->BARANG_PERMINTAAN }}</td>
                      <?php 
                         
                         if ($key->STATUS == "in progress") {
                             $date1=date_create();
                             $date2=date_create($key->TGL_PERMINTAAN);
                             for ($i=1; $i<=count($deadline) ; $i++) {
                              if ($i == 1) {
                                if($key->TIKPRO_ID == $i){
                                  $deadline2 = $deadline[$i-1] + 1;
                                }
                              }
                              else{
                                if($key->TIKPRO_ID == $i){
                                  $deadline2 = $deadline[$i-1];
                                }
                              }
                             }
                             
                             $new = date_add($date2,date_interval_create_from_date_string($deadline2." days"));
                             $diff=date_diff($date1,$new);
                             $print = $diff->format('%R%a Hari');
                             $printInt = (int)$print;
                             if($print == 0){
                                $print = $diff->format('%a Hari');
                             }
                             if($print >0)
                             {
                              echo '<td style="background-color: green; color: white; text-align: center; vertical-align: middle;" >',$diff->format('%a Hari'),'</td>';
                             }
                             else
                             {
                              echo '<td style="background-color: red; color: white; text-align: center; vertical-align: middle;" >',$print,'</td>';
                             }
                         }               
                         elseif ($key->STATUS == "done") {
                               echo '<td style="background-color: green; color: white; text-align: center; vertical-align: middle;" >DONE</td>';
                          }    
                         elseif($key->STATUS == "Request untuk dibatalkan") {
                              echo '<td style="background-color: green; color: white; text-align: center; vertical-align: middle;" >Proses Pembatalan</td>';
                         }
                         elseif($key->STATUS == "batal") {
                              echo '<td style="background-color: green; color: white; text-align: center; vertical-align: middle;" >Permintaan Batal</td>';
                         }
                       ?>
                      <td style="text-align: center; vertical-align: middle; ">{{ $key->NAMA_TIKPRO }}</td>
                      
                      <td style="text-align: center; vertical-align: middle; ">
                        <input type="hidden" name="method" value="DELETE">
                        <a class="btn btn-block btn-primary" href="/semua/lihat/{{ $key->ID_PERMINTAAN }}"><b class="material-icons">Show Details</b>
                        @if ($key->STATUS_PEMBATALANH === "Request untuk dibatalkan")
                        
                        @else
                        <?php
                            if ($key->STATUS == "in progress") { ?>
                              <a class="btn btn-block btn-danger" href="/semua/hapus/{{ $key->ID_PERMINTAAN }}"><b class="material-icons">Cancel Request</b></a>      
                        <?php
                            }
                        ?>
                        
                        @endif
                      </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
              <a href="export/permintaan" class="btn btn-primary pull-left">Download Excel File</a>
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
