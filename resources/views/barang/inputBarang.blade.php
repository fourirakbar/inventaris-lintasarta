@extends('layouts.lumino') 
@section('content')
<section class="content-header">
      <h1>
        Form Input Barang Baru
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Form Input Barang Baru</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
            @endif
            <div class="box-header with-border">
              <h3 class="box-title">Form Input Barang Baru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" role="form" action="{{ URL::to('barang2') }}" onclick="getdate()">
              <div class="box-body">
                <div class="form-group"> 
                  <label>Nomor Registrasi</label> 
                  <input class="form-control" placeholder="Nomor Registrasi" name="NOMOR_REGISTRASI"> 
                </div> 
                {{csrf_field()}} 
                <div class="form-group"> 
                  <label>Jumlah</label> 
                  <input class="form-control" placeholder="Jumlah" name="JUMLAH"> 
                </div> 
                {{csrf_field()}}
                <div class="form-group"> 
                  <label>Keterangan</label> 
                  <input class="form-control" placeholder="Keterangan" name="KETERANGAN"> 
                </div> 
                {{csrf_field()}}
                <div class="form-group"> 
                  <label>Lokasi</label> 
                  <input class="form-control" placeholder="Lokasi" name="LOKASI"> 
                </div> 
                {{csrf_field()}}
                <div class="form-group">
                  <label>RACk</label>
                  <input type="hidden" name="_method" value="POST">
                  <select class="form-control" name="RACK_ID">
                    <option disabled selected value><b>-- Pilih Menu DIbawah --</b></option>
                    <option value="1">A-1</option>
                    <option value="2">A-2</option>
                    <option value="3">A-3</option>
                    <option value="4">A-4</option>
                    <option value="5">B-1</option>
                    <option value="6">B-2</option>
                    <option value="7">B-3</option>
                    <option value="8">B-4</option>
                    <option value="9">C-1</option>
                    <option value="10">C-2</option>
                    <option value="11">C-3</option>
                    <option value="12">C-4</option>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>

              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
@endsection
@section('javas')
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">
function getdate() {
  var tt = document.getElementById('datepicker').value;

  var date = new Date(tt);
  var newdate = new Date(date);
  var deadline = "<?php echo Session::get('totaltikpro');?>"
  newdate.setDate(newdate.getDate() + parseInt(deadline));

  var dd = newdate.getDate();
  var mm = newdate.getMonth() + 1;
  var y = newdate.getFullYear();
  console.log(dd)
  console.log(mm)
  console.log(y)

  var FormattedDate = y + '-' + mm + '-' + dd;
    document.getElementById('datedead').value = FormattedDate;
}
$(function () {
      $('#daterange-btn').daterangepicker(
          {
            ranges: {
              'Today': [moment(), moment()],
              'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days': [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month': [moment().startOf('month'), moment().endOf('month')],
              'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
          },
          function (start, end) {
            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
          }
      );

      //Date picker
      $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        changeMonth: true,
        changeYear: true,
        autoclose: true
      });
});
</script>
@endsection