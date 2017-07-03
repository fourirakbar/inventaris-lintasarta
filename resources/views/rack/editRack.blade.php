@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        Edit Detail Rack
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/showrack">Data Semua Rack</a></li>
        <li class="active">Edit Rack</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data</h3>
            </div>

        <form action="{{ url('/rack/edit', $rack->ID_RACK) }}" method="POST">
          <div class="box-body" style="padding-right: 10%; padding-left: 10%; padding-bottom: 5%">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <label>Nama Rack</label>
                    <input class="form-control" value="{{ $rack->NAMA_RACK }}" name="NAMA_RACK">
                  </div>

                  <div class="form-group">
                    <label>Lokasi Rack</label>
                    <input class="form-control" value="{{ $rack->LOKASI_RACK }}" name="LOKASI_RACK">
                  </div>

                  <button type="submit" class="btn btn-primary pull-right">Update</button>&nbsp;&nbsp;
                  <button type="reset" class="btn btn-default pull-right">Reset</button>&nbsp;&nbsp;
                </div>
              </form>
            <!-- /.box-header -->
            <!-- form start -->

            </div>

            </div>
            <!-- /.box-body -->
          </div>
    </section>
@endsection
@section('javas')
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{URL::asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{URL::asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript">
function getdate() {
  var tt = document.getElementById('datepicker').value;

  var date = new Date(tt);
  var newdate = new Date(date);

  newdate.setDate(newdate.getDate() + 60);

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
      $('.calendar1').datepicker({
        format: 'yyyy-mm-dd',
        changeMonth: true,
        changeYear: true,
        autoclose: true
      });
});
</script>
@endsection
