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
              <table class="table table-bordered table-hover">
                <thead>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Nomor Ticket</th>
			        <td colspan="5">{{ $jebret->NOMOR_TICKET }}</td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Nama Requester</th>
			        <td colspan="5">{{ $jebret->NAMA_REQUESTER }}</td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Bagian</th>
			        <td colspan="5">{{ $jebret->BAGIAN }}</td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Divisi</th>
			        <td colspan="5">{{ $jebret->DIVISI }}</td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Tanggal Permintaan</th>
			        <td colspan="5"><?php echo date('d F Y', strtotime($jebret->TGL_PERMINTAAN)) ?></td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Barang yang Diminta</th>
			        <td colspan="5">{{ $jebret->BARANG_PERMINTAAN }}</td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Deskripsi</th>
			        <td colspan="5">{{ $jebret->DESKRIPSI }}</td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">No FPBJ</th>
			        <td colspan="5">{{ $jebret->NO_FPBJ }}</td>
			    </tr>
			    <tr>
              <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Tanggal Target Selesai</th>
              <td colspan="5"><?php echo date('d F Y', strtotime($jebret->TGL_DEADLINE)); ?></td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Keterangan</th>
			        <td colspan="5">{{ $jebret->KETERANGAN }}</td>
			    </tr>

          <tr border="0">
              <td border="0">
                  <br>
              </td>
          </tr>

			     <tr>
            <th style="text-align: center; vertical-align: middle; background-color: gray; color: white;">Nama Proses</th>
            <th style="text-align: center; vertical-align: middle; background-color: gray; color: white;">Nama</th>
            <th style="text-align: center; vertical-align: middle; background-color: gray; color: white;">Tgl Input</th>
		    		<th style="text-align: center; vertical-align: middle; background-color: gray; color: white;">Tgl Selesai (Seharusnya)</th>
		    		<th style="text-align: center; vertical-align: middle; background-color: gray; color: white;">Tgl Selesai (Kenyataan)</th>
		    		<th style="text-align: center; vertical-align: middle; background-color: gray; color: white;">Status</th>
		    		<th style="text-align: center; vertical-align: middle; background-color: gray; color: white;">Durasi Waktu</th>
		    	</tr>

		    	<tr>

          <?php
            for ($i=0; $i <($count) ; $i++) {
              if ($i == 0) { ?>
                <td style="text-align: center; vertical-align: middle; ">{{ $jebret2[$i]->TIKPRO_NAMA }}</td>
                <td>{{ $jebret2[$i]->NAMA }}</td>
                <td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y', strtotime($jebret->TGL_PERMINTAAN)) ?></td>    
                <td style="text-align: center; vertical-align: middle; ">
                  <?php
                    $now = ($jebret->TGL_PERMINTAAN);
                    $plus = ($jebret2[$i]->DEADLINE);
                    $hasil = date('d F Y', strtotime($now."+".$plus."days"));
                    echo $hasil;
                  ?>
                </td>
                <td style="text-align: center; vertical-align: middle; ">
                  <?php
                    if ($boi[$i]->TGL_SELESAI) {
                      echo date('d F Y', strtotime($boi[$i]->TGL_SELESAI));
                    }
                  ?>
                </td>
                <td style="text-align: center; vertical-align: middle; ">
                  <?php
                    //tanggal hari ini
                    $sekarang = new Datetime();

                    //tanggal input
                    $tglInputBoi = new Datetime(($jebret->TGL_PERMINTAAN));

                    //tanggal selesai (seharusnya)
                    $hasil_date = new Datetime($hasil);

                    //tanggal selesai (kenyataan)
                    $kuy = new Datetime(($boi[$i]->TGL_SELESAI));

                    //dikurangin antara tanggal selesai (seharusnya) dengan tanggal input
                    $druga = date_diff($tglInputBoi, $hasil_date);
                    $newDruga = $druga->format("%a");

                    //dikurangin antara tanggal selesai kenyataan dengan tanggal input
                    $merlinRTA = date_diff($tglInputBoi, $kuy);
                    $newMerlinRTA = $merlinRTA->format("%a");

                    if (empty(($boi[$i]->TGL_SELESAI))) {
                      echo "In Progress";
                    }
                    elseif ($newDruga+1 >= $newMerlinRTA+1) {
                      echo "On Target";
                      // echo $newDruga, "+" ,$newMerlinRTA;
                    }
                    else {
                      echo "Overdue";
                      // echo $print, "+" ,$print_kuy;
                    }
                  ?>
                </td>
                <td style="text-align: center; vertical-align: middle; ">
                  <?php
                    echo ($jebret2[$i]->DEADLINE. " Hari Proses");
                  ?>
                </td>
              <?php
                }
                elseif ($i != 0) {
                  if (!empty($boi[$i-1]->TGL_SELESAI)) { ?>
                    <tr>
                      <td style="text-align: center; vertical-align: middle; ">{{ $jebret2[$i]->TIKPRO_NAMA }}</td>
                      <td>{{ $jebret2[$i]->NAMA }}</td>
                      <td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y', strtotime($boi[$i-1]->TGL_SELESAI)) ?></td>
                      <td style="text-align: center; vertical-align: middle; ">
                        <?php
                          $baruboi = ($boi[$i-1]->TGL_SELESAI);
                          $plus = ($jebret2[$i]->DEADLINE);
                          $hasil = date('d F Y', strtotime($baruboi."+".$plus."days"));
                          echo $hasil;
                        ?>
                      </td>
                      <td style="text-align: center; vertical-align: middle; ">
                        <?php
                          if ($boi[$i]->TGL_SELESAI) {
                            echo date('d F Y', strtotime($boi[$i]->TGL_SELESAI));
                          }
                        ?>
                      </td>
                      <td style="text-align: center; vertical-align: middle; ">
                        <?php
                          //tanggal hari ini
                          $sekarang = new Datetime();

                          //tanggal input
                          $tglInputBoi = new Datetime(($boi[$i-1]->TGL_SELESAI));

                          //tanggal selesai (seharusnya)
                          $hasil_date = new Datetime($hasil);

                          //tanggal selesai (kenyataan)
                          $kuy = new Datetime(($boi[$i]->TGL_SELESAI));

                          //dikurangin antara tanggal selesai (seharusnya) dengan tanggal input
                          $druga = date_diff($tglInputBoi, $hasil_date);
                          $newDruga = $druga->format("%a");

                          //dikurangin antara tanggal selesai kenyataan dengan tanggal input
                          $merlinRTA = date_diff($tglInputBoi, $kuy);
                          $newMerlinRTA = $merlinRTA->format("%a");

                          if (empty(($boi[$i]->TGL_SELESAI))) {
                            echo "In Progress";
                          }
                          elseif ($newDruga+1 >= $newMerlinRTA+1) {
                            echo "On Target";
                            // echo $newDruga, "+" ,$newMerlinRTA;
                          }
                          else {
                            echo "Overdue";
                            // echo $print, "+" ,$print_kuy;
                          }
                        ?>
                      </td>
                      <td style="text-align: center; vertical-align: middle; ">
                        <?php
                          echo ($jebret2[$i]->DEADLINE. " Hari Proses");
                        ?>
                      </td>
                    </tr>
                <?php
                  }
                }
              ?>           
          <?php
            }
          ?>		    		
		    	</tr>
			    </thead>
              </table>
              @if (Auth::user()->jenis_user == 'admin')
              <div class="box-header">
                <a href="/semua/lihat/edit/{{ $jebret->ID_PERMINTAAN }}"><button type="button" class="btn btn-primary btn-lg pull-right">EDIT</button></a>
              </div>
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
  
@endsection
