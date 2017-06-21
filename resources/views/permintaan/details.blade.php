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
              <a href="/semua/lihat/edit/{{ $jebret->ID_PERMINTAAN }}"><button type="button" class="btn btn-primary btn-lg">EDIT</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Nomor Ticket</th>
			        <td>{{ $jebret->NOMOR_TICKET }}</td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Nama Requester</th>
			        <td>{{ $jebret->NAMA_REQUESTER }}</td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Bagian</th>
			        <td>{{ $jebret->BAGIAN }}</td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Divisi</th>
			        <td>{{ $jebret->DIVISI }}</td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Tanggal Permintaan</th>
			        <td><?php echo date('d F Y', strtotime($jebret->TGL_PERMINTAAN)) ?></td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Barang yang Diminta</th>
			        <td>{{ $jebret->BARANG_PERMINTAAN }}</td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Deskripsi</th>
			        <td>{{ $jebret->DESKRIPSI }}</td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">No FPBJ</th>
			        <td>{{ $jebret->NO_FPBJ }}</td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Tanggal Target Selesai</th>
			        <td>
			        	<?php
			        		if ($jebret->TARGET_SELESAI) {
			        			echo date('d F Y', strtotime($jebret->TARGET_SELESAI));
			        		}
			        	?>
			        </td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Keterangan</th>
			        <td>{{ $jebret->KETERANGAN }}</td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Tanggal Tindak Lanjut Akhir</th>
			        <td>
			        	<?php
			        		if ($jebret->TINDAK_LANJUT_AKHIR) {
			        			echo date('d F Y', strtotime($jebret->TINDAK_LANJUT_AKHIR));
			        		}
			        	?>
			        </td>
			    </tr>

			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Titik Proses</th>
			        <td>{{ $query[0]->NAMA_TIKPRO }}</td>
			    </tr>

			     <tr>
		    		<th style="text-align: center; vertical-align: middle; ">Nama Proses</th>
		    		<th style="text-align: center; vertical-align: middle; ">Tgl Input</th>
		    		<th style="text-align: center; vertical-align: middle; ">Tgl Selesai (Seharusnya)</th>
		    		<th style="text-align: center; vertical-align: middle; ">Tgl Selesai (Kenyataan)</th>
		    		<th style="text-align: center; vertical-align: middle; ">Status</th>
		    		<th style="text-align: center; vertical-align: middle; ">Durasi Waktu</th>
		    	</tr>

		    	<tr>
		    		<td style="text-align: center; vertical-align: middle; ">{{ $jebret2[0]->NAMA_TIKPRO }}</td>
		    		<td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y', strtotime($jebret->TGL_PERMINTAAN)) ?></td>
		    		<td style="text-align: center; vertical-align: middle; ">
		    			<?php
		    				$now = ($jebret->TGL_PERMINTAAN);
		    				$plus = ($jebret2[0]->DEADLINE);
		    				$hasil = date('d F Y', strtotime($now."+".$plus."days"));
		    				echo $hasil;
		    			?>
		    		</td>
		    		<td style="text-align: center; vertical-align: middle; ">
              <?php
                if ($boi[0]->TGL_SELESAI) {
                  echo date('d F Y', strtotime($boi[0]->TGL_SELESAI));
                }
              ?>
            </td>
		    		<td style="text-align: center; vertical-align: middle; ">
		    			<?php
		    				$sekarang = new Datetime();
		    				$hasil_date = new Datetime($hasil);
		    				$kuy = new Datetime(($boi[0]->TGL_SELESAI));
		    				$diff = date_diff($sekarang,$hasil_date);
		    				$diff_kuy = date_diff($sekarang,$kuy);
		    				$print = $diff->format("%a");
		    				$print_kuy = $diff_kuy->format("%a");
		    				if ($print+1 < 0 && $print+1 < $print_kuy+1) {
		    					echo "Overdue";
		    				}
		    				elseif ($print+1 > 0 && empty(($boi[0]->TGL_SELESAI))) {
		    					echo "In Progress";
		    				}
		    				elseif ($print+1 > 0 && $print+1 > $print_kuy+1) {
		    					echo "On Target";
		    				}
		    			?>
		    		</td>
		    		<td style="text-align: center; vertical-align: middle; ">
		    			<?php
		    				echo ($jebret2[0]->DEADLINE. " Hari Proses");
		    			?>
		    		</td>
		    	</tr>

          <?php
            if (!empty($boi[0]->TGL_SELESAI)) { ?>
              <tr>
                <td style="text-align: center; vertical-align: middle; ">{{ $jebret2[1]->NAMA_TIKPRO }}</td>
                <td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y', strtotime($boi[0]->TGL_SELESAI)) ?></td>
                <td style="text-align: center; vertical-align: middle; ">
    		    			<?php
                    $baruboi = ($boi[0]->TGL_SELESAI);
    		    				$plus = ($jebret2[1]->DEADLINE);
    		    				$hasil = date('d F Y', strtotime($baruboi."+".$plus."days"));
    		    				echo $hasil;
    		    			?>
    		    		</td>
                <td style="text-align: center; vertical-align: middle; ">
                  <?php
                    if ($boi[1]->TGL_SELESAI) {
                      echo date('d F Y', strtotime($boi[1]->TGL_SELESAI));
                    }
                  ?>
                </td>
                <td style="text-align: center; vertical-align: middle; ">
    		    			<?php
                    //tanggal hari ini
    		    				$sekarang = new Datetime();

                    //tanggal selesai (seharusnya)
    		    				$hasil_date = new Datetime($hasil);

                    //tanggal selesai (kenyataan)
    		    				$kuy = new Datetime(($boi[1]->TGL_SELESAI));

                    //dikurangin antara tanggal selesai seharusnya dengan tanggal hari ini
    		    				$diff = date_diff($sekarang,$hasil_date);

                    //dikurangin antara tanggal selesai kenyataan dengan tanggal hari ini
    		    				$diff_kuy = date_diff($sekarang,$kuy);

                    //print jumlah harinya saja dari variable $diff
    		    				$print = $diff->format("%a");

                    //print jumlah harinya saja dari varibale $diff_kuy
    		    				$print_kuy = $diff_kuy->format("%a");

    		    				if ($print+1 > 0 && empty(($boi[1]->TGL_SELESAI))) {
    		    					echo "In Progress";
    		    				}
    		    				elseif ($print+1 > 0 && $print+1 > $print_kuy+1 || $print+1 == $print_kuy+1) {
    		    					echo "On Target";
    		    				}
                    else {
    		    					echo "Overdue";
                      // echo $print, "+", $print_kuy;
    		    				}
    		    			?>
    		    		</td>
                <td style="text-align: center; vertical-align: middle; ">
    		    			<?php
    		    				echo ($jebret2[1]->DEADLINE. " Hari Proses");
    		    			?>
    		    		</td>
              </tr>

              <?php
                if (!empty($boi[1]->TGL_SELESAI)) { ?>
                  <tr>
                    <td style="text-align: center; vertical-align: middle; ">{{ $jebret2[2]->NAMA_TIKPRO }}</td>
                    <td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y', strtotime($boi[1]->TGL_SELESAI)) ?></td>
                    <td style="text-align: center; vertical-align: middle; ">
        		    			<?php
                        //tanggal input di tabel
                        $baruboi = ($boi[1]->TGL_SELESAI);

                        //deadlie dari jebret2[2]->NAMA_TIKPRO
        		    				$plus = ($jebret2[2]->DEADLINE);

                        //hasil untuk tanggal selesai (seharusnya)
        		    				$hasil = date('d F Y', strtotime($baruboi."+".$plus."days"));
        		    				echo $hasil;
        		    			?>
        		    		</td>
                    <td style="text-align: center; vertical-align: middle; ">
                      <?php
                        if ($boi[2]->TGL_SELESAI) {
                          echo date('d F Y', strtotime($boi[2]->TGL_SELESAI));
                        }
                      ?>
                    </td>
                    <td style="text-align: center; vertical-align: middle; ">
        		    			<?php
                        //tanggal hari ini
        		    				$sekarang = new Datetime();

                        //tanggal selesai (seharusnya)
        		    				$hasil_date = new Datetime($hasil);

                        //tanggal selesai (kenyataan)
        		    				$kuy = new Datetime(($boi[2]->TGL_SELESAI));

                        //dikurangin antara tanggal selesai seharusnya dengan tanggal hari ini
        		    				$diff = date_diff($sekarang,$hasil_date);

                        //dikurangin antara tanggal selesai kenyataan dengan tanggal hari ini
        		    				$diff_kuy = date_diff($sekarang,$kuy);

                        //print jumlah harinya saja dari variable $diff
        		    				$print = $diff->format("%a");

                        //print jumlah harinya saja dari varibale $diff_kuy
        		    				$print_kuy = $diff_kuy->format("%a");

        		    				if ($print+1 > 0 && empty(($boi[2]->TGL_SELESAI))) {
        		    					echo "In Progress";
        		    				}
        		    				elseif ($print+1 > 0 && $print+1 > $print_kuy+1 || $print+1 == $print_kuy+1) {
        		    					echo "On Target";
        		    				}
                        else {
        		    					echo "Overdue";
                          // echo $print, "+", $print_kuy;
        		    				}
        		    			?>
        		    		</td>
                    <td style="text-align: center; vertical-align: middle; ">
        		    			<?php
        		    				echo ($jebret2[2]->DEADLINE. " Hari Proses");
        		    			?>
        		    		</td>
                  </tr>

                  <?php
                    if (!empty($boi[2]->TGL_SELESAI)) { ?>
                      <tr>
                        <td style="text-align: center; vertical-align: middle; ">{{ $jebret2[3]->NAMA_TIKPRO }}</td>
                        <td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y', strtotime($boi[2]->TGL_SELESAI)) ?></td>
                        <td style="text-align: center; vertical-align: middle; ">
            		    			<?php
                            //tanggal input di tabel
                            $baruboi = ($boi[2]->TGL_SELESAI);

                            //deadlie dari jebret2[2]->NAMA_TIKPRO
            		    				$plus = ($jebret2[3]->DEADLINE);

                            //hasil untuk tanggal selesai (seharusnya)
            		    				$hasil = date('d F Y', strtotime($baruboi."+".$plus."days"));
            		    				echo $hasil;
            		    			?>
            		    		</td>
                        <td style="text-align: center; vertical-align: middle; ">
                          <?php
                            if ($boi[3]->TGL_SELESAI) {
                              echo date('d F Y', strtotime($boi[3]->TGL_SELESAI));
                            }
                          ?>
                        </td>
                        <td style="text-align: center; vertical-align: middle; ">
            		    			<?php
                            //tanggal hari ini
            		    				$sekarang = new Datetime();

                            //tanggal selesai (seharusnya)
            		    				$hasil_date = new Datetime($hasil);

                            //tanggal selesai (kenyataan)
            		    				$kuy = new Datetime(($boi[3]->TGL_SELESAI));

                            //dikurangin antara tanggal selesai seharusnya dengan tanggal hari ini
            		    				$diff = date_diff($sekarang,$hasil_date);

                            //dikurangin antara tanggal selesai kenyataan dengan tanggal hari ini
            		    				$diff_kuy = date_diff($sekarang,$kuy);

                            //print jumlah harinya saja dari variable $diff
            		    				$print = $diff->format("%a");

                            //print jumlah harinya saja dari varibale $diff_kuy
            		    				$print_kuy = $diff_kuy->format("%a");

            		    				if ($print+1 > 0 && empty(($boi[3]->TGL_SELESAI))) {
            		    					echo "In Progress";
            		    				}
            		    				elseif ($print+1 > 0 && $print+1 > $print_kuy+1 || $print+1 == $print_kuy+1) {
            		    					echo "On Target";
            		    				}
                            else {
            		    					echo "Overdue";
                              // echo $print, "+", $print_kuy;
            		    				}
            		    			?>
            		    		</td>
                        <td style="text-align: center; vertical-align: middle; ">
            		    			<?php
            		    				echo ($jebret2[3]->DEADLINE. " Hari Proses");
            		    			?>
            		    		</td>
                      </tr>

                      <?php
                        if (!empty($boi[3]->TGL_SELESAI)) { ?>
                          <tr>
                            <td style="text-align: center; vertical-align: middle; ">{{ $jebret2[4]->NAMA_TIKPRO }}</td>
                            <td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y', strtotime($boi[3]->TGL_SELESAI)) ?></td>
                            <td style="text-align: center; vertical-align: middle; ">
                		    			<?php
                                //tanggal input di tabel
                                $baruboi = ($boi[3]->TGL_SELESAI);

                                //deadlie dari jebret2[2]->NAMA_TIKPRO
                		    				$plus = ($jebret2[4]->DEADLINE);

                                //hasil untuk tanggal selesai (seharusnya)
                		    				$hasil = date('d F Y', strtotime($baruboi."+".$plus."days"));
                		    				echo $hasil;
                		    			?>
                		    		</td>
                            <td style="text-align: center; vertical-align: middle; ">
                              <?php
                                if ($boi[4]->TGL_SELESAI) {
                                  echo date('d F Y', strtotime($boi[4]->TGL_SELESAI));
                                }
                              ?>
                            </td>
                            <td style="text-align: center; vertical-align: middle; ">
                		    			<?php
                                //tanggal hari ini
                		    				$sekarang = new Datetime();

                                //tanggal selesai (seharusnya)
                		    				$hasil_date = new Datetime($hasil);

                                //tanggal selesai (kenyataan)
                		    				$kuy = new Datetime(($boi[4]->TGL_SELESAI));

                                //dikurangin antara tanggal selesai seharusnya dengan tanggal hari ini
                		    				$diff = date_diff($sekarang,$hasil_date);

                                //dikurangin antara tanggal selesai kenyataan dengan tanggal hari ini
                		    				$diff_kuy = date_diff($sekarang,$kuy);

                                //print jumlah harinya saja dari variable $diff
                		    				$print = $diff->format("%a");

                                //print jumlah harinya saja dari varibale $diff_kuy
                		    				$print_kuy = $diff_kuy->format("%a");

                		    				if ($print+1 > 0 && empty(($boi[4]->TGL_SELESAI))) {
                		    					echo "In Progress";
                		    				}
                		    				elseif ($print+1 > 0 && $print+1 > $print_kuy+1 || $print+1 == $print_kuy+1) {
                		    					echo "On Target";
                		    				}
                                else {
                		    					echo "Overdue";
                                  // echo $print, "+", $print_kuy;
                		    				}
                		    			?>
                		    		</td>
                            <td style="text-align: center; vertical-align: middle; ">
                		    			<?php
                		    				echo ($jebret2[4]->DEADLINE. " Hari Proses");
                		    			?>
                		    		</td>
                          </tr>

                          <?php
                            if (!empty($boi[4]->TGL_SELESAI)) { ?>
                              <tr>
                                <td style="text-align: center; vertical-align: middle; ">{{ $jebret2[5]->NAMA_TIKPRO }}</td>
                                <td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y', strtotime($boi[4]->TGL_SELESAI)) ?></td>
                                <td style="text-align: center; vertical-align: middle; ">
                    		    			<?php
                                    //tanggal input di tabel
                                    $baruboi = ($boi[4]->TGL_SELESAI);

                                    //deadlie dari jebret2[2]->NAMA_TIKPRO
                    		    				$plus = ($jebret2[5]->DEADLINE);

                                    //hasil untuk tanggal selesai (seharusnya)
                    		    				$hasil = date('d F Y', strtotime($baruboi."+".$plus."days"));
                    		    				echo $hasil;
                    		    			?>
                    		    		</td>
                                <td style="text-align: center; vertical-align: middle; ">
                                  <?php
                                    if ($boi[5]->TGL_SELESAI) {
                                      echo date('d F Y', strtotime($boi[5]->TGL_SELESAI));
                                    }
                                  ?>
                                </td>
                                <td style="text-align: center; vertical-align: middle; ">
                    		    			<?php
                                    //tanggal hari ini
                    		    				$sekarang = new Datetime();

                                    //tanggal selesai (seharusnya)
                    		    				$hasil_date = new Datetime($hasil);

                                    //tanggal selesai (kenyataan)
                    		    				$kuy = new Datetime(($boi[5]->TGL_SELESAI));

                                    //dikurangin antara tanggal selesai seharusnya dengan tanggal hari ini
                    		    				$diff = date_diff($sekarang,$hasil_date);

                                    //dikurangin antara tanggal selesai kenyataan dengan tanggal hari ini
                    		    				$diff_kuy = date_diff($sekarang,$kuy);

                                    //print jumlah harinya saja dari variable $diff
                    		    				$print = $diff->format("%a");

                                    //print jumlah harinya saja dari varibale $diff_kuy
                    		    				$print_kuy = $diff_kuy->format("%a");

                    		    				if ($print+1 > 0 && empty(($boi[5]->TGL_SELESAI))) {
                    		    					echo "In Progress";
                    		    				}
                    		    				elseif ($print+1 > 0 && $print+1 > $print_kuy+1 || $print+1 == $print_kuy+1) {
                    		    					echo "On Target";
                    		    				}
                                    else {
                    		    					echo "Overdue";
                                      // echo $print, "+", $print_kuy;
                    		    				}
                    		    			?>
                    		    		</td>
                                <td style="text-align: center; vertical-align: middle; ">
                    		    			<?php
                    		    				echo ($jebret2[5]->DEADLINE. " Hari Proses");
                    		    			?>
                    		    		</td>
                              </tr>

                              <?php
                                if (!empty($boi[5]->TGL_SELESAI)) { ?>
                                  <tr>
                                    <td style="text-align: center; vertical-align: middle; ">{{ $jebret2[6]->NAMA_TIKPRO }}</td>
                                    <td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y', strtotime($boi[5]->TGL_SELESAI)) ?></td>
                                    <td style="text-align: center; vertical-align: middle; ">
                        		    			<?php
                                        //tanggal input di tabel
                                        $baruboi = ($boi[5]->TGL_SELESAI);

                                        //deadlie dari jebret2[2]->NAMA_TIKPRO
                        		    				$plus = ($jebret2[6]->DEADLINE);

                                        //hasil untuk tanggal selesai (seharusnya)
                        		    				$hasil = date('d F Y', strtotime($baruboi."+".$plus."days"));
                        		    				echo $hasil;
                        		    			?>
                        		    		</td>
                                    <td style="text-align: center; vertical-align: middle; ">
                                      <?php
                                        if ($boi[6]->TGL_SELESAI) {
                                          echo date('d F Y', strtotime($boi[6]->TGL_SELESAI));
                                        }
                                      ?>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle; ">
                        		    			<?php
                                        //tanggal hari ini
                        		    				$sekarang = new Datetime();

                                        //tanggal selesai (seharusnya)
                        		    				$hasil_date = new Datetime($hasil);

                                        //tanggal selesai (kenyataan)
                        		    				$kuy = new Datetime(($boi[6]->TGL_SELESAI));

                                        //dikurangin antara tanggal selesai seharusnya dengan tanggal hari ini
                        		    				$diff = date_diff($sekarang,$hasil_date);

                                        //dikurangin antara tanggal selesai kenyataan dengan tanggal hari ini
                        		    				$diff_kuy = date_diff($sekarang,$kuy);

                                        //print jumlah harinya saja dari variable $diff
                        		    				$print = $diff->format("%a");

                                        //print jumlah harinya saja dari varibale $diff_kuy
                        		    				$print_kuy = $diff_kuy->format("%a");

                        		    				if ($print+1 > 0 && empty(($boi[6]->TGL_SELESAI))) {
                        		    					echo "In Progress";
                        		    				}
                        		    				elseif ($print+1 > 0 && $print+1 > $print_kuy+1 || $print+1 == $print_kuy+1) {
                        		    					echo "On Target";
                        		    				}
                                        else {
                        		    					echo "Overdue";
                                          // echo $print, "+", $print_kuy;
                        		    				}
                        		    			?>
                        		    		</td>
                                    <td style="text-align: center; vertical-align: middle; ">
                        		    			<?php
                        		    				echo ($jebret2[6]->DEADLINE. " Hari Proses");
                        		    			?>
                        		    		</td>
                                  </tr>

                                  <?php
                                    if (!empty($boi[6]->TGL_SELESAI)) { ?>
                                      <tr>
                                        <td style="text-align: center; vertical-align: middle; ">{{ $jebret2[7]->NAMA_TIKPRO }}</td>
                                        <td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y', strtotime($boi[6]->TGL_SELESAI)) ?></td>
                                        <td style="text-align: center; vertical-align: middle; ">
                            		    			<?php
                                            //tanggal input di tabel
                                            $baruboi = ($boi[6]->TGL_SELESAI);

                                            //deadlie dari jebret2[2]->NAMA_TIKPRO
                            		    				$plus = ($jebret2[7]->DEADLINE);

                                            //hasil untuk tanggal selesai (seharusnya)
                            		    				$hasil = date('d F Y', strtotime($baruboi."+".$plus."days"));
                            		    				echo $hasil;
                            		    			?>
                            		    		</td>
                                        <td style="text-align: center; vertical-align: middle; ">
                                          <?php
                                            if ($boi[7]->TGL_SELESAI) {
                                              echo date('d F Y', strtotime($boi[7]->TGL_SELESAI));
                                            }
                                          ?>
                                        </td>
                                        <td style="text-align: center; vertical-align: middle; ">
                            		    			<?php
                                            //tanggal hari ini
                            		    				$sekarang = new Datetime();

                                            //tanggal selesai (seharusnya)
                            		    				$hasil_date = new Datetime($hasil);

                                            //tanggal selesai (kenyataan)
                            		    				$kuy = new Datetime(($boi[7]->TGL_SELESAI));

                                            //dikurangin antara tanggal selesai seharusnya dengan tanggal hari ini
                            		    				$diff = date_diff($sekarang,$hasil_date);

                                            //dikurangin antara tanggal selesai kenyataan dengan tanggal hari ini
                            		    				$diff_kuy = date_diff($sekarang,$kuy);

                                            //print jumlah harinya saja dari variable $diff
                            		    				$print = $diff->format("%a");

                                            //print jumlah harinya saja dari varibale $diff_kuy
                            		    				$print_kuy = $diff_kuy->format("%a");

                            		    				if ($print+1 > 0 && empty(($boi[7]->TGL_SELESAI))) {
                            		    					echo "In Progress";
                            		    				}
                            		    				elseif ($print+1 > 0 && $print+1 > $print_kuy+1 || $print+1 == $print_kuy+1) {
                            		    					echo "On Target";
                            		    				}
                                            else {
                            		    					echo "Overdue";
                                              // echo $print, "+", $print_kuy;
                            		    				}
                            		    			?>
                            		    		</td>
                                        <td style="text-align: center; vertical-align: middle; ">
                            		    			<?php
                            		    				echo ($jebret2[7]->DEADLINE. " Hari Proses");
                            		    			?>
                            		    		</td>
                                      </tr>

                                      <?php
                                        if (!empty($boi[7]->TGL_SELESAI)) { ?>
                                          <tr>
                                            <td style="text-align: center; vertical-align: middle; ">{{ $jebret2[8]->NAMA_TIKPRO }}</td>
                                            <td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y', strtotime($boi[7]->TGL_SELESAI)) ?></td>
                                            <td style="text-align: center; vertical-align: middle; ">
                                		    			<?php
                                                //tanggal input di tabel
                                                $baruboi = ($boi[7]->TGL_SELESAI);

                                                //deadlie dari jebret2[2]->NAMA_TIKPRO
                                		    				$plus = ($jebret2[8]->DEADLINE);

                                                //hasil untuk tanggal selesai (seharusnya)
                                		    				$hasil = date('d F Y', strtotime($baruboi."+".$plus."days"));
                                		    				echo $hasil;
                                		    			?>
                                		    		</td>
                                            <td style="text-align: center; vertical-align: middle; ">
                                              <?php
                                                if ($boi[8]->TGL_SELESAI) {
                                                  echo date('d F Y', strtotime($boi[8]->TGL_SELESAI));
                                                }
                                              ?>
                                            </td>
                                            <td style="text-align: center; vertical-align: middle; ">
                                		    			<?php
                                                //tanggal hari ini
                                		    				$sekarang = new Datetime();

                                                //tanggal selesai (seharusnya)
                                		    				$hasil_date = new Datetime($hasil);

                                                //tanggal selesai (kenyataan)
                                		    				$kuy = new Datetime(($boi[8]->TGL_SELESAI));

                                                //dikurangin antara tanggal selesai seharusnya dengan tanggal hari ini
                                		    				$diff = date_diff($sekarang,$hasil_date);

                                                //dikurangin antara tanggal selesai kenyataan dengan tanggal hari ini
                                		    				$diff_kuy = date_diff($sekarang,$kuy);

                                                //print jumlah harinya saja dari variable $diff
                                		    				$print = $diff->format("%a");

                                                //print jumlah harinya saja dari varibale $diff_kuy
                                		    				$print_kuy = $diff_kuy->format("%a");

                                		    				if ($print+1 > 0 && empty(($boi[8]->TGL_SELESAI))) {
                                		    					echo "In Progress";
                                		    				}
                                		    				elseif ($print+1 > 0 && $print+1 > $print_kuy+1 || $print+1 == $print_kuy+1) {
                                		    					echo "On Target";
                                		    				}
                                                else {
                                		    					echo "Overdue";
                                                  // echo $print, "+", $print_kuy;
                                		    				}
                                		    			?>
                                		    		</td>
                                            <td style="text-align: center; vertical-align: middle; ">
                                		    			<?php
                                		    				echo ($jebret2[8]->DEADLINE. " Hari Proses");
                                		    			?>
                                		    		</td>
                                          </tr>
                                      <?php
                                        }
                                      ?>

                                  <?php
                                    }
                                  ?>
                              <?php
                                }
                              ?>

                          <?php
                            }
                          ?>

                      <?php
                        }
                      ?>

                  <?php
                    }
                  ?>
              <?php
                }
              ?>

          <?php
            }
          ?>


			    </thead>
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
