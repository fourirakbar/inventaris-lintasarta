@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        History Barang Keluar
        <small>Lihat Semua Data Barang Keluar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">History Barang Keluar</li>

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
              <h3 class="box-title">Data Barang Keluar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align: center; vertical-align: middle; ">No</th>
                  <th style="text-align: center; vertical-align: middle; ">No. Registrasi</th>
                  <th style="text-align: center; vertical-align: middle; ">Nama Barang</th>
                  <th style="text-align: center; vertical-align: middle; ">Nama User</th>
                  <th style="text-align: center; vertical-align: middle; ">Keterangan</th>
                  <th style="text-align: center; vertical-align: middle; ">Tanggal Keluar</th>
                </tr>
                </thead>
                <tbody>

                <!-- buat index di kolom "NO" -->
                <?php
                  // dd($data);
                  $indexNo=1;
                  $indexTemp=0
                ?>
                @for ($i = 0 ; $i < $count ; $i++)
                    <tr>
                      <td style="text-align: center; vertical-align: middle; ">{{ $indexNo++ }}</td>

                      <?php
                        if (!is_null($show[$i]->PERANGKAT)) { ?>
                          <td style="text-align: center; vertical-align: middle; ">{{ $show[$i]->NOMOR_REGISTRASI }}</td>
                          <td style="text-align: center; vertical-align: middle; ">{{ $show[$i]->PERANGKAT }}</td>
                      <?php
                        } else { ?>
                          <td style="text-align: center; vertical-align: middle; ">{{ $data[$indexTemp]->q }}</td>
                          <td style="text-align: center; vertical-align: middle; ">{{ $data[$indexTemp]->NAMA_BARANG }}</td>
                          <?php
                            $indexTemp++;
                        }
                      ?>

                      <td style="text-align: center; vertical-align: middle; ">{{ $show[$i]->NAMA_USER }}</td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $show[$i]->KETERANGAN }}</td>
                      <td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y', strtotime($show[$i]->TGL_KELUAR)) ?></td>
                    </tr>
                @endfor
                </tbody>
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
  <script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
  <script>
    $(function () {
      $('#example1').DataTable();
    });
  </script>
@endsection
