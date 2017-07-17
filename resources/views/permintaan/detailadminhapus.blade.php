@extends('layouts.lumino')

@section('content')
<section class="content-header">
      <h1>
        Detail Data
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/semua">Data Request Barang yang Belum Selesai</a></li>
        <li class="active">Detail Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Pembatalan</h3><br><br>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form action="{{ url('adminhapus/lihat', $jebret->ID_PERMINTAAN) }}" method="POST">
            		<input type="hidden" name="_method" value="PUT">
			    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
              <table style="width: 40%; float: left; margin: 5%;" class="table table-bordered table-hover">
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">ID Permintaan</th>
              		<td style="vertical-align: middle; width: 20%;">{{ $jebret->ID_PERMINTAAN }}</td>
              	</tr>
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">Nomor Tiket</th>
              		<td style="vertical-align: middle; width: 20%;">{{ $jebret->NOMOR_TICKET }}</td>
              	</tr>
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">Tanggal Permintaan</th>
              		<td style="vertical-align: middle; width: 20%;">{{ $jebret->TGL_PERMINTAAN }}</td>
              	</tr>
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">Nama Requester</th>
              		<td style="vertical-align: middle; width: 20%;">{{ $jebret->NAMA_REQUESTER }}</td>
              	</tr>
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">Bagian</th>
              		<td style="vertical-align: middle; width: 20%;">{{ $jebret->BAGIAN }}</td>
              	</tr>
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">Divisi</th>
              		<td style="vertical-align: middle; width: 20%;">{{ $jebret->DIVISI }}</td>
              	</tr>
              </table>
              <table style="width: 40%; float: right; margin: 5%;" class="table table-bordered table-hover">
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">Barang Permintaan</th>
              		<td style="vertical-align: middle; width: 20%;">{{ $jebret->BARANG_PERMINTAAN }}</td>
              	</tr>
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">Deskripsi Barang</th>
              		<td style="vertical-align: middle; width: 20%;">{{ $jebret->DESKRIPSI }}</td>
              	</tr>
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">Tanggal Permintaan</th>
              		<td style="vertical-align: middle; width: 20%;">{{ $jebret->TGL_PEMBATALAN }}</td>
              	</tr>
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">Alasan Pembatalan</th>
              		<td style="vertical-align: middle; width: 20%;">{{ $jebret->ALASAN_PEMBATALAN }}</td>
              	</tr>
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">File Pembatalan</th>
              		<td style="vertical-align: middle; width: 20%;"><a href="{{ URL::asset($jebret->FILE_PEMBATALAN) }}" class="btn btn-app" download=""><i class="glyphicon glyphicon-download-alt"></i>Download File</a>
                  {{-- <img id="myImg" src="{{ URL::asset($jebret->FILE_PEMBATALAN) }}" height="100px" width="auto"></td> --}}
              	</tr>
              	<tr>
              		<th style="vertical-align: middle; width: 15%;">Status Pembatalan</th>
              		<td style="vertical-align: middle; width: 20%;">{{ $jebret->STATUS_PEMBATALAN }}</td>
              	</tr>
              </table>
              @if( $jebret->STATUS_PEMBATALAN === "done")

              @else
                <button style="margin: 5% 0 5% 0" type="submit" name="tidak" value="tidak" class="btn btn-danger pull-right">Cancel Pembatalan</button>
                <button style="margin: 5% 0 5% 0" type="submit" name="yaa" value="yaa" class="btn btn-primary pull-right">Setujui Pembatalan</button>
              @endif
              </form>
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
