 @extends('layouts.lumino')
@section('content')

<section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
            <a class="btn btn-app" href="/semua/lihat/edit/{{ $jebret->ID_PERMINTAAN }}">
                <i class="fa fa-edit"></i> Edit
              </a>
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
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Tanggal Permintaan</th>
			        <td><?php echo date('d F Y', strtotime($jebret->TGL_PERMINTAAN)) ?></td>
			    </tr>
			    <tr>
			        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Barang yang Diminta</th>
			        <td>{{ $jebret->BARANG_PERMINTAAN }}</td>
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
