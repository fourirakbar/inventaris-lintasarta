@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        Data Permintaan
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Permintaan</li>

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
              $deadline2 = array();
              $deadline3 = array();
              $deadline4 = array();
              foreach ($jebret2 as $key) {
                foreach ($key as $value) {
                  array_push($deadline, ["idpermintaan" => $value->ID_PERMINTAAN, "deadline" => $value->DEADLINE, "idtikpro" => $value->TIKPRO_ID]);
                }
                array_push($deadline2, $deadline);
                $deadline = array();

              }
              for ($i=1; $i <= count($deadline2) ; $i++) {
                for ($j=1; $j <= count($deadline2[$i-1]) ; $j++) {

                  if (empty($deadline3)) {
                    array_push($deadline3, ["idpermintaan" => $deadline2[$i-1][$j-1]["idpermintaan"], "deadline" => $deadline2[$i-1][$j-1]["deadline"], "idtikpro" => $deadline2[$i-1][$j-1]["idtikpro"]]);
                  }
                  else{
                    array_push($deadline3, ["idpermintaan" => $deadline2[$i-1][$j-1]["idpermintaan"], "deadline" => $deadline2[$i-1][$j-1]["deadline"]+ $deadline3[$j-2]["deadline"], "idtikpro" => $deadline2[$i-1][$j-1]["idtikpro"]]);
                  }
                }
                array_push($deadline4, $deadline3);
                $deadline3 = array();
              }
              // dd($deadline4);
              // foreach ($deadline4 as $jumlaharray) {
              //    foreach ($jumlaharray as $eacharray) {
              //      print_r($eacharray);
              //    }
              //  }

            ?>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                        <th style="text-align: center; vertical-align: middle; ">No</th>
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
                  <?php
                    $indexNo = 1;
                  ?>
                @foreach ($jebret as $key)

                    <tr>
                      <td style="text-align: center; vertical-align: middle; ">{{ $indexNo++ }}</td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $key->NOMOR_TICKET }}</td>
                      <td>{{ $key->NAMA_REQUESTER }}</td>
                      <td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y', strtotime($key->TGL_PERMINTAAN)) ?></td>
                      <td>{{ $key->BARANG_PERMINTAAN }}</td>
                      <?php

                         if ($key->STATUS == "in progress") {
                             $date1=date_create();
                             $date2=date_create($key->TGL_PERMINTAAN);
                             foreach ($deadline4 as $jumlaharray) {
                              for ($i=0; $i < count($jumlaharray) ; $i++) {
                                if ($key->TIKPRO_ID == $i && $key->ID_PERMINTAAN == $jumlaharray[$i]["idpermintaan"]) {
                                   $deaddead = $jumlaharray[$i]["deadline"];
                                  // echo "true";
                                  }
                              }
                            }
                             // echo '<td style="background-color: green; color: white; text-align: center; vertical-align: middle;" >',$deaddead,'</td>';
                             $new = date_add($date2,date_interval_create_from_date_string((string)((int)$deaddead-3)." days"));
                             $diff=date_diff($date1,$new);
                             $print = $diff->format('%R%a Hari');
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
                      <td style="text-align: center; vertical-align: middle; ">{{ $key->TIKPRO_NAMA }}</td>

                      <td style="text-align: center; vertical-align: middle; ">
                        <input type="hidden" name="method" value="DELETE">
                        <a class="btn btn-block btn-primary" href="/semua/lihat/{{ $key->ID_PERMINTAAN }}"><b class="material-icons">Show Details</b>
                        
                        <?php
                            if ($key->STATUS == "in progress") { ?>
                              <a class="btn btn-block btn-danger" href="/semua/hapus/{{ $key->ID_PERMINTAAN }}"><b class="material-icons">Cancel Request</b></a>
                        <?php
                            }
                        ?>

                        
                      </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
              @if(\Request::is('semua'))
                <a href="export/permintaan" class="btn btn-primary pull-left">Download Excel File</a>
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
