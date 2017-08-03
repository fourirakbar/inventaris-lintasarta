@extends('layouts.user')
@section('additionalcss')

@endsection
@section('content')
<section class="content-header">
    <!-- Main content -->
    <section class="content-header">
      <div class="row">
        <div class="col-xs-12">
          @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
            @endif
          <div class="box">
            <div class="box-header">
              <h3 >Data barang yang anda pinjam</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            @foreach($peminjaman as $index)
              <table style="width: 40%; float: left; margin: 5%;" class="table">
                <tr>
                  <th style="text-align: left; vertical-align: middle; ">No. Ticket</th>
                  <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
                  <td style="text-align: left; vertical-align: middle; ">{{ $index->NOMOR_TICKET }}</td>
                </tr>
                <tr>
                  <th style="text-align: left; vertical-align: middle; ">Nama Peminjam</th>
                  <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
                  <td style="text-align: left; vertical-align: middle; ">{{ $index->NAMA_PEMINJAM }}</td>
                </tr>
                <tr>
                  <th style="text-align: left; vertical-align: middle; ">Perangkat</th>
                  <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
                  <td style="text-align: left; vertical-align: middle; ">{{ $index->PERANGKAT }}</td>
                </tr>
                <tr>
                  <th style="text-align: left; vertical-align: middle; ">Nomor Registrasi</th>
                  <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
                  <td style="text-align: left; vertical-align: middle; ">{{ $index->NOMOR_REGISTRASI }}</td>
                </tr>
              </table>
              <table style="width: 40%; float: right; margin: 5%;" class="table">
                <tr>
                  <th style="text-align: left; vertical-align: middle; ">Tanggal Peminjaman</th>
                  <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
                  <td style="text-align: left; vertical-align: middle; "><?php echo date('d F Y', strtotime($index->TGL_PEMINJAMAN)); ?></td>
                </tr>
                <tr>
                  <th style="text-align: left; vertical-align: middle; ">Tanggal Pengembalian</th>
                  <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
                  <td style="text-align: left; vertical-align: middle; "><?php echo date('d F Y', strtotime($index->TGL_PENGEMBALIAN)); ?></td>
                </tr>

                <tr>
                  <th style="text-align: left; vertical-align: middle; ">Catatan Peminjaman</th>
                  <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
                  <td style="text-align: left; vertical-align: middle; ">{{ $index->CATATAN_PEMINJAMAN }}</td>
                </tr>

                <tr>
                  <th style="text-align: left; vertical-align: middle; ">Sisa Hari</th>
                  <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
                  <?php
                      $datenow=date_create();
                      $datefinish=date_create($index->TGL_PENGEMBALIAN);
                      $new = date_add($datefinish,date_interval_create_from_date_string("1 days"));
                      $diff=date_diff($datenow,$new);
                      $print = $diff->format('%R%a Hari');
                      if($print == 0){
                          $print = $diff->format('%a Hari');
                      }
                      $printInt = (int)$print;
                  ?>
                  @if($print > 0 && ($index->KETERANGAN) == "progress")
                    <td tyle="text-align: left; vertical-align: middle; ">{{ $print }}</td>
                  @elseif ($print <= 0 && ($index->KETERANGAN) == "progress")
                    <td tyle="text-align: left; vertical-align: middle; ">{{ $print }}</td>
                  @elseif (($index->KETERANGAN) == "done")
                    <td tyle="text-align: left; vertical-align: middle; ">Done</td>
                  @endif
                </tr>
              </table>
              @endforeach
            </div>
            <h3><a href="{{URL::to('user-search')}}"><span style="color: #3C8DBC; margin-bottom: 3%; margin-left: 3%;" class="fa fa-arrow-circle-o-left" aria-hidden="true">Cari Lagi</a></h3>
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
      $('#example1').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
    });
  </script>
@endsection
