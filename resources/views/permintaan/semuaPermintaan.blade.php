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
                      <?php 
                         
                         $date1=date_create();
                         $date2=date_create($key->TGL_PERMINTAAN);
                         $deadline = $key->DEADLINE;
                         $new = date_add($date2,date_interval_create_from_date_string($deadline." days"));
                         $diff=date_diff($date1,$new);
                         $print = $diff->format('%R%a Hari');
                         $printInt = (int)$print;
                         if ($printInt < 0) {
                          $print = "0 Hari";
                          $_SESSION['kirim'] = $print;
                         }
                         if($print <=60 && $print > 10)
                         {
                          echo '<td style="background-color: green; color: white; text-align: center; vertical-align: middle;" >',$diff->format('%a Hari'),'</td>';
                         }
                         elseif($print <=10 && $print >=1)
                         {
                          echo '<td style="background-color: yellow; color: black; text-align: center; vertical-align: middle;" >',$diff->format('%a Hari'),'</td>';
                         }
                         else
                         {
                          echo '<td style="background-color: red; color: white; text-align: center; vertical-align: middle;" >',$print,'</td>';
                         }
                         
                       ?>
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
