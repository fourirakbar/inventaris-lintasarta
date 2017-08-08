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
                  /* id permintaan & deadline dari tiap-tiap tikrpo dimasukkan ke dalam array deadline */
                  array_push($deadline, ["idpermintaan" => $value->ID_PERMINTAAN, "deadline" => $value->DEADLINE, "idtikpro" => $value->TIKPRO_ID]);
                }
                array_push($deadline2, $deadline); /* isi dari array deadline dimasukkan ke dalam array deadline2 */
                $deadline = array(); /* array deadline dikosongkan kembali */

              }
              for ($i=1; $i <= count($deadline2) ; $i++) {
                for ($j=1; $j <= count($deadline2[$i-1]) ; $j++) {

                  if (empty($deadline3)) { /* digunakan saat iterasi pertama */
                    array_push($deadline3, ["idpermintaan" => $deadline2[$i-1][$j-1]["idpermintaan"], "deadline" => $deadline2[$i-1][$j-1]["deadline"], "idtikpro" => $deadline2[$i-1][$j-1]["idtikpro"]]); /* idpermintaan dan dedline yang sudah berjalan dari tiap-tiap permintaan dimasukkan ke dalam array deadline3 */
                  }
                  else{ /* digunakan untuk iterasi kedua sampai selesai */
                    array_push($deadline3, ["idpermintaan" => $deadline2[$i-1][$j-1]["idpermintaan"], "deadline" => $deadline2[$i-1][$j-1]["deadline"]+ $deadline3[$j-2]["deadline"], "idtikpro" => $deadline2[$i-1][$j-1]["idtikpro"]]); /* idpermintaan dan dedline yang sudah berjalan dari tiap-tiap permintaan dimasukkan ke dalam array deadline3 */
                  }
                }
                array_push($deadline4, $deadline3); /* isi dari array deadline3 dimasukkan ke dalam array deadline4 */
                $deadline3 = array(); /* array deadline3 dikosongkan kembali */
              }

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
                      <td style="text-align: center; vertical-align: middle; ">{{ $key->NAMA_REQUESTER }}</td>
                      <td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y', strtotime($key->TGL_PERMINTAAN)) ?></td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $key->BARANG_PERMINTAAN }}</td>
                      <?php
                        $arraytglselesai = array();
                        foreach ($tglselesai as $index) {
                          if ($index->PERMINTAAN_ID == $key->ID_PERMINTAAN) { /* dicocokkan dengan id permintaan yg sama */
                            array_push($arraytglselesai, $index->TGL_SELESAI); /* diambil value dari kolom tgl selesai dan dimasukkan ke arraytglselesai */
                          }
                        }
                        
                        foreach ($arraytglselesai as $index) {
                          if($index != NULL){
                            $tglselesaiterakhir = $index;
                          }
                        }

                         if ($key->STATUS == "in progress") {
                             
                             $deadlinebaru = array_reverse($deadline4);
                             foreach ($deadlinebaru as $jumlaharray) {
                              for ($i=1; $i <= count($jumlaharray) ; $i++) {
                                if ($key->TIKPRO_ID == $i && $key->ID_PERMINTAAN == $jumlaharray[$i-1]["idpermintaan"]) {
                                  if ($key->TIKPRO_ID == 1) { /* untuk iterasi pertama */
                                    $date1=date_create(); /* ambil tanggal hari ini */
                                    $date2=date_create($key->TGL_PERMINTAAN); /* ambil value dari kolom tgl_permintaan */
                                    $deaddead = $key->DEADLINE;
                                    $new = date_add($date2,date_interval_create_from_date_string((string)((int)$deaddead)." days")); /* jumlah hari di variabel date2 ditambahkan dengan variabel deaddead */
                                    $diff=date_diff($date1,$new); /* dicari perbandingan hari dari tanggal hari ini di variabel date1 dengan tgl permintaan yg sudah ditambah dengan deaddead */
                                    $jam = $diff->format('%R%h'); /* untuk melihat "hours"nya */
                                    $print = $diff->format('%R%a'); /* print perbandingan harinya dengan format tertentu */
                                    if($print == 0){
                                      $print = $diff->format('%a');
                                    }
                                    
                                    if($jam >0) /* kalo hari > 0 tetepi jamnya < 0, maka hari ditambah 1 */
                                    {
                                    echo '<td style="background-color: green; color: white; text-align: center; vertical-align: middle;" >',$print+1,' Hari','</td>';
                                    }
                                    else
                                    {
                                    echo '<td style="background-color: red; color: white; text-align: center; vertical-align: middle;" >',$print,' Hari','</td>';
                                    }
                                  }
                                  else{ /* untuk iterasi kedua sampai selesai */
                                    $date1=date_create(); /* ambil tanggal hari ini */
                                    $date2=date_create($tglselesaiterakhir); /* value dari tglselesaiterakhir dijadikan tanggal */
                                    $deaddead = $key->DEADLINE;
                                    $new = date_add($date2,date_interval_create_from_date_string((string)((int)$deaddead)." days")); /* jumlah hari di variabel date2 ditambahkan dengan variabel deaddead */
                                    $diff=date_diff($date1,$new); /* dicari perbandingan hari dari tanggal hari ini di variabel date1 dengan tgl permintaan yg sudah ditambah dengan deaddead */
                                    $jam = $diff->format('%R%h'); /* untuk melihat "hours"nya */
                                    $print = $diff->format('%R%a'); /* print perbandingan harinya dengan format tertentu */
                                    if($print == 0){
                                      $print = $diff->format('%a');
                                    }
                                    
                                    if($jam >0) /* kalo hari > 0 tetepi jamnya < 0, maka hari ditambah 1 */
                                    {
                                    echo '<td style="background-color: green; color: white; text-align: center; vertical-align: middle;" >',$print+1,' Hari','</td>';
                                    }
                                    else
                                    {
                                    echo '<td style="background-color: red; color: white; text-align: center; vertical-align: middle;" >',$print,' Hari','</td>';
                                    }
                                  }
                                }
                              }
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
