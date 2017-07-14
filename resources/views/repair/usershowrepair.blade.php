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
              <h3 >Data barang yang direpair oleh vendor</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-xs-12">
                <div class="col-xs-6">
                  <table class="table">
                    <tr>
                      <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">No. Ticket</th>
                      <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
                      <td>{{ $data->NOMOR_TICKET }}</td>
                    </tr>
                    <tr>
                      <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Nama Barang</th>
                      <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
                      <td>{{ $data->NAMA_BARANG }}</td>
                    </tr>
                    <tr>
                      <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Nomor Registrasi</th>
                      <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
                      <td>{{ $data->NOMOR_REGISTRASI }}</td>
                    </tr>
                    <tr>
                      <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Problem</th>
                      <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
                      <td>{{ $data->PROBLEM }}</td>
                    </tr>
                    <tr>
                      <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Vendor</th>
                      <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
                      <td>{{ $data->VENDOR }}</td>
                    </tr>
                    <tr>
                      <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Keterangan</th>
                      <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
                      <td>{{ $data->KETERANGAN_REPAIR }}</td>
                    </tr>
                    <tr>
                      <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Catatan</th>
                      <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
                      <td>{{ $data->CATATAN_REPAIR }}</td>
                    </tr>
                  </table>
                </div>
                <div class="col-xs-6">
                  <table class="table">
                    <tr>
                      <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Tanggal Mulai Diperbaiki</th>
                      <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
                      <td>{{ $data->TANGGAL_REPAIR }}</td>
                    </tr>
                    <tr>
                      <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Tangga Perkiraan Selesai</th>
                      <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
                      <td>{{ $data->PERKIRAAN_SELESAI }}</td>
                    </tr>
                    <tr>
                      <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Status Repair</th>
                      <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
                      <td>{{ $data->STATUS_REPAIR }}</td>
                    </tr>
                  </table>
                </div>
              </div>
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

