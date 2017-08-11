@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        Data Peminjaman
        <small>Lihat Semua Data Peminjam</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Peminjaman</li>

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
            @endif
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Peminjaman</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                        <th style="text-align: center; vertical-align: middle; ">No</th>
                        <th style="text-align: center; vertical-align: middle; ">No. Ticket</th>
                        <th style="text-align: center; vertical-align: middle; ">Nama Peminjam</th>
                        <th style="text-align: center; vertical-align: middle; ">Perangkat</th>
                        <th style="text-align: center; vertical-align: middle; ">Nomor Registrasi</th>
                        <th style="text-align: center; vertical-align: middle; ">Tanggal Peminjaman</th>
                        <th style="text-align: center; vertical-align: middle; ">Tanggal Pengembalian</th>
                        <th style="text-align: center; vertical-align: middle; ">Catatan</th>
                        <th style="text-align: center; vertical-align: middle; ">Sisa Hari</th>
                        <th style="text-align: center; vertical-align: middle; ">Action</th>
                </tr>
                </thead>
                <tbody>

                <!-- buat index di kolom "NO" -->
                <?php
                  // dd($data);
                  $indexNo=1;
                  $indexTemp=0;
                ?>
                @for ($i = 0 ; $i < $count ; $i++)
                    <tr>
                      <td style="text-align: center; vertical-align: middle; ">{{ $indexNo++ }}</td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $peminjaman[$i]->NOMOR_TICKET }}</td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $peminjaman[$i]->NAMA_PEMINJAM }}</td>

                      <?php /* //kalo di database peminjaman, value perangkat tidak NULL. atau merupakan hasil inputan manual dari user */
                        if (!is_null($peminjaman[$i]->PERANGKAT)) { ?>
                          <td style="text-align: center; vertical-align: middle; ">{{ $peminjaman[$i]->PERANGKAT }}</td>
                          <td style="text-align: center; vertical-align: middle; ">{{ $peminjaman[$i]->NOMOR_REGISTRASI }}</td>                          
                      <?php
                        } else /* kalo di database peminjaman, value perangkat NULL. atau merupakan hasil inputan dari tabel barang. maka nomor regis & nama barang diambil dari tabel barang sesuai dengan id barangnya */ { ?>
                          <td style="text-align: center; vertical-align: middle; ">{{ $data[$indexTemp]->NAMA_BARANG }}</td>
                          <td style="text-align: center; vertical-align: middle; ">{{ $data[$indexTemp]->q }}</td>
                      <?php
                          $indexTemp++;
                        }
                      ?>

                      <td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y', strtotime($peminjaman[$i]->TGL_PEMINJAMAN)) ?></td>
                      <td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y', strtotime($peminjaman[$i]->TGL_PENGEMBALIAN)) ?></td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $peminjaman[$i]->CATATAN_PEMINJAMAN }}</td>
                      <?php
                            $datenow=date_create();
                            $datefinish=date_create($peminjaman[$i]->TGL_PENGEMBALIAN);
                            $new = date_add($datefinish,date_interval_create_from_date_string("1 days"));
                            $diff=date_diff($datenow,$new);
                            $print = $diff->format('%R%a Hari');
                            if($print == 0){
                                $print = $diff->format('%a Hari');
                            }
                            $printInt = (int)$print;
                            $printplus = $print+1;
                        ?>

                        @if($print > 0 && ($peminjaman[$i]->KETERANGAN) == "progress")
                          <td style="background-color: green; color: white; text-align: center; vertical-align: middle; ">{{ $print }}</td>
                        @elseif ($print <= 0 && ($peminjaman[$i]->KETERANGAN) == "progress")
                          <td style="background-color: red; color: white; text-align: center; vertical-align: middle; ">{{ $print }}</td>
                        @elseif (($peminjaman[$i]->KETERANGAN) == "done")
                          <td style="background-color: green; color: white; text-align: center; vertical-align: middle; ">DONE</td>
                        @endif

                      <td style="text-align: center; vertical-align: middle; ">
                        <input type="hidden" name="method" value="DELETE">
                        <a class="btn btn-block btn-primary" href="/peminjaman/edit/{{ $peminjaman[$i]->ID_PEMINJAMAN }}"><b class="material-icons">Edit Data</b>
                      </td>
                    </tr>
                @endfor
                </tbody>
              </table>
              @if(\Request::is('peminjaman/show'))
                <a href="/export/peminjaman" class="btn btn-primary pull-left">Download Excel File</a>
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
