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
            
            <div class="box-body">
              <div class="col-xs-12">
                <div class="col-xs-6">
                  <table class="table">
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
              <a href="{{ URL::to('repair/show/edit', $data->ID_PERBAIKAN) }}"><button style="margin-right: 10%; margin-bottom: 5%;" type="button" class="btn btn-primary btn-lg pull-right">EDIT</button></a>
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
