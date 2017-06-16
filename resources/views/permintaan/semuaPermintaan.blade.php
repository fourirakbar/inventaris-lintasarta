@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        Request Barang 
        <small>yang Belum Selesai</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Request Barang yang Belum Selesai</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data</h3>
            </div>
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
                    <tr id="datete">
                      <td style="text-align: center; vertical-align: middle; ">{{ $key->NOMOR_TICKET }}</td>
                      <td>{{ $key->NAMA_REQUESTER }}</td>
                      <td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y', strtotime($key->TGL_PERMINTAAN)) ?></td>
                      <td>{{ $key->BARANG_PERMINTAAN }}</td>
                      <td>
                        <?php
                          //tanggal hari ini
                          $tanggala = date_create();

                          //tanggal input permintaan
                          $tanggalb = date_create($key->TGL_PERMINTAAN);

                          //tanggal input permintaan + deadline
                          $tanggalc = date('d F Y', strtotime("+".$key->DEADLINE."Days"));
                          echo $tanggalc

                          //buat ditampilin di kolom sisa bari
                          
                        ?>
                      </td>
                      
                      <td style="text-align: center; vertical-align: middle; ">{{ $key->NAMA_TIKPRO }}</td>
                      <td style="text-align: center; vertical-align: middle; ">
                        <input type="hidden" name="method" value="DELETE">
                        <a class="btn btn-primary" href="/semua/lihat/{{ $key->ID_PERMINTAAN }}"><b class="material-icons" title="Ubah pengumuman">Show Details</b></a>
                      </td>
                    </tr>
                @endforeach
                </tbody>
                {{-- <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot> --}}
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
	<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script>
	  $(function () {
	    $('#example1').DataTable({
	      "paging": true,
	    });
	  });
	</script>
@endsection
