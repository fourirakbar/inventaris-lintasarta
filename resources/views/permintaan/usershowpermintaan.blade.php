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
              <h3 >Data barang yang anda minta</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            @foreach($showdata as $jebret)
            <table class="table">
                <thead>
          <tr>
              <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Nomor Ticket</th>
              <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
              <td colspan="5">{{ $jebret->NOMOR_TICKET }}</td>
          </tr>
          <tr>
              <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Nama Requester</th>
              <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
              <td colspan="5">{{ $jebret->NAMA_REQUESTER }}</td>
          </tr>
          <tr>
              <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Bagian</th>
              <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
              <td colspan="5">{{ $jebret->BAGIAN }}</td>
          </tr>
          <tr>
              <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Divisi</th>
              <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
              <td colspan="5">{{ $jebret->DIVISI }}</td>
          </tr>
          <tr>
              <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Tanggal Permintaan</th>
              <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
              <td colspan="5"><?php echo date('d F Y', strtotime($jebret->TGL_PERMINTAAN)); ?></td>
          </tr>
          <tr>
              <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Barang yang Diminta</th>
              <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
              <td colspan="5">{{ $jebret->BARANG_PERMINTAAN }}</td>
          </tr>
          <tr>
              <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Deskripsi</th>
              <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
              <td colspan="5">{{ $jebret->DESKRIPSI }}</td>
          </tr>
          <tr>
              <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">No FPBJ</th>
              <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
              <td colspan="5">{{ $jebret->NO_FPBJ }}</td>
          </tr>
          <tr>
              <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Tanggal Target Selesai</th>
              <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
              <td colspan="5"><?php echo date('d F Y', strtotime($jebret->TGL_DEADLINE)); ?></td>
          </tr>
          <tr>
              <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Keterangan</th>
              <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
              <td colspan="5">{{ $jebret->KETERANGAN }}</td>
          </tr>
          <tr>
              <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Status</th>
              <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
              <td colspan="5">
                <?php
                  if (($jebret->STATUS) == "batal") {
                    echo "Permintaan Berhasil Dibatalkan";
                  }
                  else if (($jebret->STATUS) == "in progress" && !isset($jebret->ALASAN_REJECT)) {
                    echo "Permintaan Sedang Dalam Proses";
                  }
                  else if (($jebret->STATUS) == "done") {
                    echo "Permintaan Selesai Sampai Titik Proses Terakhir";
                  }
                  else if (($jebret->STATUS) == "in progress" && isset($jebret->ALASAN_REJECT)) {
                    echo "Permintaan Pembatalan Di Reject";
                  }
                ?>
              </td>
          </tr>
          <?php
            if (isset($jebret->ALASAN_REJECT)) { ?>
              <tr>
                  <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Alasan Reject</th>
                  <th style="width: 1px; text-align: center; vertical-align: middle;">:</th>
                  <td colspan="5">{{ $jebret->ALASAN_REJECT }}</td>
              </tr>
          <?php
            }
          ?>

          <tr border="0">
              <td border="0">
                  <br>
              </td>
          </tr>

           <tr>
            <th style="text-align: center; vertical-align: middle; background-color: gray; color: white;">Nama Proses</th>
            <th style="text-align: center; vertical-align: middle; background-color: gray; color: white;">Tgl Input</th>
            <th style="text-align: center; vertical-align: middle; background-color: gray; color: white;">Tgl Selesai (Seharusnya)</th>
            <th style="text-align: center; vertical-align: middle; background-color: gray; color: white;">Tgl Selesai (Kenyataan)</th>
            <th style="text-align: center; vertical-align: middle; background-color: gray; color: white;">Status</th>
            <th style="text-align: center; vertical-align: middle; background-color: gray; color: white;">Durasi Waktu</th>
          </tr>

          <tr>

          <?php
            for ($i=0; $i <($count) ; $i++) {
              if ($i == 0) { ?>
                <td style="text-align: center; vertical-align: middle; ">{{ $jebret2[$i]->TIKPRO_NAMA }}</td>
                <td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y', strtotime($jebret->TGL_PERMINTAAN)) ?></td>
                <td style="text-align: center; vertical-align: middle; ">
                  <?php
                    $now = ($jebret->TGL_PERMINTAAN);
                    $plus = ($jebret2[$i]->DEADLINE);
                    $hasil = date('d F Y', strtotime($now."+".$plus."days"));
                    echo $hasil;
                  ?>
                </td>
                <td style="text-align: center; vertical-align: middle; ">
                  <?php
                    if ($boi[$i]->TGL_SELESAI) {
                      echo date('d F Y', strtotime($boi[$i]->TGL_SELESAI));
                    }
                  ?>
                </td>
                <td style="text-align: center; vertical-align: middle; ">
                  <?php
                    //tanggal hari ini
                    $sekarang = new Datetime();

                    //tanggal input
                    $tglInputBoi = new Datetime(($jebret->TGL_PERMINTAAN));

                    //tanggal selesai (seharusnya)
                    $hasil_date = new Datetime($hasil);

                    //tanggal selesai (kenyataan)
                    $kuy = new Datetime(($boi[$i]->TGL_SELESAI));

                    //dikurangin antara tanggal selesai (seharusnya) dengan tanggal input
                    $druga = date_diff($tglInputBoi, $hasil_date);
                    $newDruga = $druga->format("%a");

                    //dikurangin antara tanggal selesai kenyataan dengan tanggal input
                    $merlinRTA = date_diff($tglInputBoi, $kuy);
                    $newMerlinRTA = $merlinRTA->format("%a");

                    if (empty(($boi[$i]->TGL_SELESAI))) {
                      echo "In Progress";
                    }
                    elseif ($newDruga+1 >= $newMerlinRTA+1) {
                      echo "On Target";
                      // echo $newDruga, "+" ,$newMerlinRTA;
                    }
                    else {
                      echo "Overdue";
                      // echo $print, "+" ,$print_kuy;
                    }
                  ?>
                </td>
                <td style="text-align: center; vertical-align: middle; ">
                  <?php
                    echo ($jebret2[$i]->DEADLINE. " Hari Proses");
                  ?>
                </td>
              <?php
                }
                elseif ($i != 0) {
                  if (!empty($boi[$i-1]->TGL_SELESAI)) { ?>
                    <tr>
                      <td style="text-align: center; vertical-align: middle; ">{{ $jebret2[$i]->TIKPRO_NAMA }}</td>
                      <td style="text-align: center; vertical-align: middle; "><?php echo date('d F Y', strtotime($boi[$i-1]->TGL_SELESAI)) ?></td>
                      <td style="text-align: center; vertical-align: middle; ">
                        <?php
                          $baruboi = ($boi[$i-1]->TGL_SELESAI);
                          $plus = ($jebret2[$i]->DEADLINE);
                          $hasil = date('d F Y', strtotime($baruboi."+".$plus."days"));
                          echo $hasil;
                        ?>
                      </td>
                      <td style="text-align: center; vertical-align: middle; ">
                        <?php
                          if ($boi[$i]->TGL_SELESAI) {
                            echo date('d F Y', strtotime($boi[$i]->TGL_SELESAI));
                          }
                        ?>
                      </td>
                      <td style="text-align: center; vertical-align: middle; ">
                        <?php
                          //tanggal hari ini
                          $sekarang = new Datetime();

                          //tanggal input
                          $tglInputBoi = new Datetime(($boi[$i-1]->TGL_SELESAI));

                          //tanggal selesai (seharusnya)
                          $hasil_date = new Datetime($hasil);

                          //tanggal selesai (kenyataan)
                          $kuy = new Datetime(($boi[$i]->TGL_SELESAI));

                          //dikurangin antara tanggal selesai (seharusnya) dengan tanggal input
                          $druga = date_diff($tglInputBoi, $hasil_date);
                          $newDruga = $druga->format("%a");

                          //dikurangin antara tanggal selesai kenyataan dengan tanggal input
                          $merlinRTA = date_diff($tglInputBoi, $kuy);
                          $newMerlinRTA = $merlinRTA->format("%a");

                          if (empty(($boi[$i]->TGL_SELESAI))) {
                            echo "In Progress";
                          }
                          elseif ($newDruga+1 >= $newMerlinRTA+1) {
                            echo "On Target";
                            // echo $newDruga, "+" ,$newMerlinRTA;
                          }
                          else {
                            echo "Overdue";
                            // echo $print, "+" ,$print_kuy;
                          }
                        ?>
                      </td>
                      <td style="text-align: center; vertical-align: middle; ">
                        <?php
                          echo ($jebret2[$i]->DEADLINE. " Hari Proses");
                        ?>
                      </td>
                    </tr>
                <?php
                  }
                }
              ?>
          <?php
            }
          ?>
          </tr>
          </thead>
              </table>
            @endforeach
            <a href="{{URL::to('user-search')}}"><button type="button" class="btn btn-primary btn-lg pull-left" data-toggle="modal" data-target="#myModal">Cari Lagi</button></a>
            @if($jebret->STATUS == "in progress")
              <button type="button" class="btn btn-danger btn-lg pull-right" data-toggle="modal" data-target="#myModal">Batalkan Permintaan</button>
            @endif
            </div>
            <!-- /.box-body -->
          </div>

          <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Detail Permintaan</h4>
            </div>
            <form action="{{ url('/semua/hapus', $jebret->ID_PERMINTAAN) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="modal-body">
                <div class="form-group col-md-6">
                  <label>Nomor Ticket</label>
                  <input class="form-control" value="{{ $jebret->NOMOR_TICKET }}" name="NOMOR_TICKET" disabled="">
                </div>

                <div class="form-group col-md-6">
                  <label>Barang yang Diminta</label>
                  <input class="form-control" value="{{ $jebret->BARANG_PERMINTAAN }}" name="BARANG_PERMINTAAN" disabled="">
                </div>

                <div class="form-group col-md-6">
                  <label>Nama Requester</label>
                  <input class="form-control" value="{{ $jebret->NAMA_REQUESTER }}" name="NAMA_REQUESTER" disabled="">
                </div>

                <div class="form-group col-md-6">
                  <label>Deskirpsi</label>
                  <textarea class="form-control" name="DESKRIPSI" disabled="">{{ $jebret->DESKRIPSI }}</textarea>
                </div>

                <div class="clearfix hidden-md"></div>

                <div class="form-group col-md-6">
                  <label>Bagian</label>
                  <input class="form-control" value="{{ $jebret->BAGIAN }}" name="BAGIAN" disabled="">
                </div>

                <div class="form-group col-md-6">
                  <label>Alasan Pembatalan</label>
                  <textarea class="form-control" name="ALASAN_PEMBATALAN" required=""></textarea>
                </div>

                <div class="clearfix hidden-md"></div>

                <div class="form-group col-md-6">
                  <label>Divisi</label>
                  <input class="form-control" value="{{ $jebret->DIVISI }}" name="DIVISI" disabled="">
                </div>

                <div class="form-group col-md-6">
                  <label>Upload File Pembatalan</label>
                  <input type="file" name="FILE_PEMBATALAN" enctype="multipart/form-data" required="">
                </div>

                <div class="clearfix hidden-md"></div>

                <div class="form-group col-md-6">
                  <label>Tanggal Permintaan</label>
                  <input class="form-control" value="{{ $jebret->TGL_PERMINTAAN }} " name="TGL_PERMINTAAN" disabled="">
                </div>

                <div class="clearfix hidden-md"></div>

                <button type="submit" class="btn btn-primary pull-right ">Batalkan Permintaan</button>
              </div>
            </form>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Form Pengajuan Pembatalan</h4>
              </div>
              <div class="modal-body">
                <form action="{{ url('/semua/hapus', $jebret->ID_PERMINTAAN) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                <div class="box-body" style="padding-right: 10%; padding-left: 10%; padding-bottom: 5%">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group col-md-6">
                          <label>Nomor Ticket</label>
                          <input class="form-control" value="{{ $jebret->NOMOR_TICKET }}" name="NOMOR_TICKET" readonly="">
                        </div>

                        <div class="form-group col-md-6">
                          <label>Barang yang Diminta</label>
                          <input class="form-control" value="{{ $jebret->BARANG_PERMINTAAN }}" name="BARANG_PERMINTAAN" readonly="">
                        </div>

                        <div class="form-group col-md-6">
                          <label>Nama Requester</label>
                          <input class="form-control" value="{{ $jebret->NAMA_REQUESTER }}" name="NAMA_REQUESTER" readonly="">
                        </div>

                        <div class="form-group col-md-6">
                          <label>Deskirpsi</label>
                          <textarea class="form-control" name="DESKRIPSI" readonly="">{{ $jebret->DESKRIPSI }}</textarea>
                        </div>

                        <div class="clearfix hidden-md"></div>

                        <div class="form-group col-md-6">
                          <label>Bagian</label>
                          <input class="form-control" value="{{ $jebret->BAGIAN }}" name="BAGIAN" readonly="">
                        </div>

                        <div class="form-group col-md-6">
                          <label>Alasan Pembatalan</label>
                          <textarea class="form-control" name="ALASAN_PEMBATALAN" required=""></textarea>
                        </div>

                        <div class="clearfix hidden-md"></div>

                        <div class="form-group col-md-6">
                          <label>Divisi</label>
                          <input class="form-control" value="{{ $jebret->DIVISI }}" name="DIVISI" readonly="">
                        </div>

                        <div class="form-group col-md-6">
                          <label>Upload File Pembatalan</label>
                          <input type="file" name="FILE_PEMBATALAN" enctype="multipart/form-data" required="">
                        </div>

                        <div class="clearfix hidden-md"></div>

                        <div class="form-group col-md-6">
                          <label>Tanggal Permintaan</label>
                          <input class="form-control" value="{{ $jebret->TGL_PERMINTAAN }} " name="TGL_PERMINTAAN" readonly="">
                        </div>

                        <div class="clearfix hidden-md"></div>

                        <button type="submit" class="btn btn-primary pull-right batalkan-permintaan">Batalkan Permintaan</button>
                      </div>
                    </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
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
  <script type="text/javascript">
  $("button.batalkan-permintaan").click(function() {
      swal({
        title: 'Apakah Anda Yakin?',
        text: "Anda hanya bisa melakukannya sekali saja",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, batalkan ini!'
      }).then(function () {
        window.location.href = "{{ URL::to('/user-search') }}";
      })
  });
  </script>
@endsection
