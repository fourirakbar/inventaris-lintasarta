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
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Status</th>
			        <td>{{ $jebret->STATUS }}</td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">FPB</th>
			        <td>
			        	<?php
			        		if ($jebret->FPB) {
			        			echo date('d F Y', strtotime($jebret->FPB));
			        		}
			        	?>
			        </td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">RFQ</th>
			        <td>
			        	<?php
			        		if ($jebret->RFQ) {
			        			echo date('d F Y', strtotime($jebret->RFQ));
			        		}
			        	?>
			        </td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">SPK</th>
			        <td>
			        	<?php
			        		if ($jebret->SPK) {
			        			echo date('d F Y', strtotime($jebret->SPK));
			        		}
			        	?>
			        </td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Delivery Order</th>
			        <td>
			        	<?php
			        		if ($jebret->DO) {
			        			echo date('d F Y', strtotime($jebret->DO));
			        		}
			        	?>
			        </td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">BAST</th>
			        <td>
			        	<?php
			        		if ($jebret->BAST) {
			        			echo date('d F Y', strtotime($jebret->BAST));
			        		}
			        	?>
			        </td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Titik Proses</th>
			        <td>{{ $query[0]->NAMA_TIKPRO }}</td>
			    </tr>
			    </thead>
              </table>
            </div>

            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
			    	<tr>
			    		<th style="text-align: center; vertical-align: middle; ">Nama Proses</th>
			    		<th style="text-align: center; vertical-align: middle; ">Tgl Input</th>
			    		<th style="text-align: center; vertical-align: middle; ">Tgl Selesai (Seharusnya)</th>
			    		<th style="text-align: center; vertical-align: middle; ">Status</th>
			    		<th style="text-align: center; vertical-align: middle; ">Durasi Waktu</th>
			    	</tr>
			    	@foreach($jebret2 as $key)
			    	<tr>
			    		<td style="text-align: center; vertical-align: middle; ">{{ $key->NAMA_TIKPRO }}</td>
			    		<td style="text-align: center; vertical-align: middle; ">
			    			
			    		</td>
			    		<td style="text-align: center; vertical-align: middle; ">
			    			<?php
			    				$now = $jebret->TGL_PERMINTAAN;
			    				$plus = $key->DEADLINE;
			    				// echo $plus;
			    				echo date('Y-m-d', strtotime($now. ' + ' .$plus. 'days'));
			    			?>
			    		</td>
			    		<td></td>
			    		<TD></TD>
			    	</tr>
			    	@endforeach
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

