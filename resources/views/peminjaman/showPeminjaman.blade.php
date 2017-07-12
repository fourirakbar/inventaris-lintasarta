@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        Show Data Peminjam
        <small>Lihat Semua Data Peminjam</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Show Data Peminjam</li>
        
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
              <h3 class="box-title">Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                        <th style="text-align: center; vertical-align: middle; ">No</th>
                        <th style="text-align: center; vertical-align: middle; ">Nama Peminjam</th>
                        <th style="text-align: center; vertical-align: middle; ">Perangkat</th>
                        <th style="text-align: center; vertical-align: middle; ">Nomor Registrasi</th>
                        <th style="text-align: center; vertical-align: middle; ">Tanggal Peminjaman</th>
                        <th style="text-align: center; vertical-align: middle; ">Tanggal Pengembalian</th>
                        <th style="text-align: center; vertical-align: middle; ">Sisa Hari</th>
                        <th style="text-align: center; vertical-align: middle; ">Action</th>
                </tr>
                </thead>
                <tbody>
                
                <!-- buat index di kolom "NO" -->
                <?php
                  $indexNo=1;
                ?>
                @foreach ($peminjaman as $index)
                    <tr>
                      <td style="text-align: center; vertical-align: middle; ">{{ $indexNo++ }}</td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $index->NAMA_PEMINJAM }}</td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $index->PERANGKAT }}</td>
                      <td style="text-align: center; vertical-align: middle; ">{{ $index->NOMOR_REGISTRASI }}</td>
                      <td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y', strtotime($index->TGL_PEMINJAMAN)) ?></td>
                      <td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y', strtotime($index->TGL_PENGEMBALIAN)) ?></td>
                      <?php $sisa = $index->DEADLINE - $index->SISA_HARI;
                       ?>
                      @if ($index->SISA_HARI > 0 AND $index->KETERANGAN == "progress")
                        <td style="background-color: green; color: white; text-align: center; vertical-align: middle;">{{ $index->SISA_HARI }} <?php echo " Hari"; ?></td>  
                      @elseif ($index->SISA_HARI <= 0 AND $index->KETERANGAN == "progress")
                        <td style="background-color: red; color: white; text-align: center; vertical-align: middle;">{{ $index->SISA_HARI }} <?php echo " Hari"; ?></td>  
                      @elseif ($index->KETERANGAN == "done")
                        <td style="background-color: green; color: white; text-align: center; vertical-align: middle;">DONE</td>  
                      @endif
                      
                      <td style="text-align: center; vertical-align: middle; ">
                        <input type="hidden" name="method" value="DELETE">
                        <a class="btn btn-block btn-primary" href="/peminjaman/edit/{{ $index->ID_PEMINJAMAN }}"><b class="material-icons">Edit Data</b>
                      </td>
                    </tr>
                @endforeach
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
