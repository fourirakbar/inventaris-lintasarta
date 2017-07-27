@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        Edit Data
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/semua">Data Request Barang yang Belum Selesai</a></li>
        <li><a href="{{ url('/semua/lihat', $jebret->ID_PERMINTAAN) }}">Details Data</a></li>
        <li class="active">Edit Data</li>
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

        <form action="{{ url('/semua/lihat/edit', $jebret->ID_PERMINTAAN) }}" method="POST">
			    <div class="box-body" style="padding-right: 10%; padding-left: 10%; padding-bottom: 5%">
			    	<input type="hidden" name="_method" value="PUT">
			    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                <div class="form-group">
	                  <label>Nomor Ticket</label>
	                  <input class="form-control" value="{{ $jebret->NOMOR_TICKET }}" name="NOMOR_TICKET">
	                </div>

	                <div class="form-group">
	                  <label>Nama Requester</label>
	                  <input class="form-control" value="{{ $jebret->NAMA_REQUESTER }}" name="NAMA_REQUESTER">
	                </div>

	                <div class="form-group">
	                  <label>Bagian</label>
	                  <input class="form-control" value="{{ $jebret->BAGIAN }}" name="BAGIAN">
	                </div>

	                <div class="form-group">
	                  <label>Divisi</label>
	                  <input class="form-control" value="{{ $jebret->DIVISI }}" name="DIVISI">
	                </div>

	                <div class="form-group">
	                  <label>Tanggal Permintaan</label>
	                  <input class="form-control" value="{{ $jebret->TGL_PERMINTAAN }} " name="TGL_PERMINTAAN">
	                </div>

	                <div class="form-group">
	                  <label>Barang yang Diminta</label>
	                  <input class="form-control" value="{{ $jebret->BARANG_PERMINTAAN }}" name="BARANG_PERMINTAAN">
	                </div>

	                <div class="form-group">
	                  <label>Deskirpsi</label>
	                  <input class="form-control" value="{{ $jebret->DESKRIPSI }}" name="DESKRIPSI">
	                </div>

                  <div class="form-group">
                    <label>Harga Barang</label>
                    <input class="form-control numberOnly" autocomplete="off" maxlength="50"" value="{{ $jebret->HARGA_BARANG_PERMINTAAN }}" name="HARGA_BARANG_PERMINTAAN">
                  </div>

	                <div class="form-group">
	                  <label>No FPBJ</label>
	                  <input class="form-control" placeholder="No FPBJ" name="NO_FPBJ" value="{{ $jebret->NO_FPBJ }}">
	                </div>

	                <div class="form-group">
	                  <label>Keterangan</label>
	                  <textarea class="form-control" rows="3" name="KETERANGAN" value="{{ $jebret->KETERANGAN }}" placeholder="Keterangan"></textarea>
	                </div>
                  
	                <div class="form-group">
	                  <label>Titik Proses</label>
	                  <input type="hidden" name="_method" value="PUT">
	                  <select class="form-control" name="TIKPRO_ID">
	                   	<option disabled selected value><b>-- Pilih Menu Dibawah --</b></option>

                      @for ($i=0; $i < count($listtikpro); $i++)
                        @if ($listtikpro[$i]->TIKPRO_ID <= $jebret2->TIKPRO_ID)
                          @if ($listtikpro[$i]->TIKPRO_ID == $jebret2->TIKPRO_ID)
                            <option selected="" value="{{ $listtikpro[$i]->TIKPRO_ID }}">{{ $listtikpro[$i]->TIKPRO_NAMA }}</option>
                          @else
                            <option value="{{ $listtikpro[$i]->TIKPRO_ID }}">{{ $listtikpro[$i]->TIKPRO_NAMA }}</option>
                          @endif
                        @endif
                      @endfor
	                  </select>
	                </div>

                  <div class="form-group">
                    <label>Nama</label>
                    <input class="form-control" placeholder="Nama" name="NAMA" value="{{ $jebret->NAMA }}">
                  </div>

                  <div class="form-group">
                    <label>Tanggal Ganti Titik Proses</label>
                    <input type="date" class="form-control calendar1" name="TGL_SELESAI" placeholder="Tanggal Ganti Titik Proses" value="{{ $jebret->TGL_SELESAI }}">
                  </div>

                  <?php
                    if (($listtikpro[$hitungmin]->TGL_SELESAI)) { ?>
                      <div class="form-group">
                        <label>Status Akhir</label>
                        <input type="hidden" name="_method" value="PUT">
                        <select class="form-control" name="STATUS">
                          @if ($jebret->STATUS == "in progress")
                          <option selected="" value="in progress">In Progress</option>
                          <option value="done">Done</option>
                          @else
                          <option selected="" value="done">Done</option>
                          <option  value="in progress">In Progress</option>
                          @endif


                        </select>

                      </div>
                  <?php
                    }
                  ?>



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

$('.price > div').click(function(){
    $('.price > input:eq('+$('.price > div').index(this)+')').focus();
});

$('.numberOnly').on('keydown', function(e){
  
  if(this.selectionStart || this.selectionStart == 0){
  // selectionStart won't work in IE < 9
  
  var key = e.which;
  var prevDefault = true;
  
  var thouSep = " ";  // your seperator for thousands
  var deciSep = ",";  // your seperator for decimals
  var deciNumber = 2; // how many numbers after the comma
  
  var thouReg = new RegExp(thouSep,"g");
  var deciReg = new RegExp(deciSep,"g");
  
  function spaceCaretPos(val, cPos){
    /// get the right caret position without the spaces
    
    if(cPos > 0 && val.substring((cPos-1),cPos) == thouSep)
    cPos = cPos-1;
    
    if(val.substring(0,cPos).indexOf(thouSep) >= 0){
    cPos = cPos - val.substring(0,cPos).match(thouReg).length;
    }
    
    return cPos;
  }
  
  function spaceFormat(val, pos){
    /// add spaces for thousands
    
    if(val.indexOf(deciSep) >= 0){
      var comPos = val.indexOf(deciSep);
      var int = val.substring(0,comPos);
      var dec = val.substring(comPos);
    } else{
      var int = val;
      var dec = "";
    }
    var ret = [val, pos];
    
    if(int.length > 3){
      
      var newInt = "";
      var spaceIndex = int.length;
      
      while(spaceIndex > 3){
        spaceIndex = spaceIndex - 3;
        newInt = thouSep+int.substring(spaceIndex,spaceIndex+3)+newInt;
        if(pos > spaceIndex) pos++;
      }
      ret = [int.substring(0,spaceIndex) + newInt + dec, pos];
    }
    return ret;
  }
  
  $(this).on('keyup', function(ev){
    
    if(ev.which == 8){
      // reformat the thousands after backspace keyup
      
      var value = this.value;
      var caretPos = this.selectionStart;
      
      caretPos = spaceCaretPos(value, caretPos);
      value = value.replace(thouReg, '');
      
      var newValues = spaceFormat(value, caretPos);
      this.value = newValues[0];
      this.selectionStart = newValues[1];
      this.selectionEnd   = newValues[1];
    }
  });
  
  if((e.ctrlKey && (key == 65 || key == 67 || key == 86 || key == 88 || key == 89 || key == 90)) ||
     (e.shiftKey && key == 9)) // You don't want to disable your shortcuts!
    prevDefault = false;
  
  if((key < 37 || key > 40) && key != 8 && key != 9 && prevDefault){
    e.preventDefault();
    
    if(!e.altKey && !e.shiftKey && !e.ctrlKey){
    
      var value = this.value;
      if((key > 95 && key < 106)||(key > 47 && key < 58) ||
        (deciNumber > 0 && (key == 110 || key == 188 || key == 190))){
        
        var keys = { // reformat the keyCode
        48: 0, 49: 1, 50: 2, 51: 3,  52: 4,  53: 5,  54: 6,  55: 7,  56: 8,  57: 9,
        96: 0, 97: 1, 98: 2, 99: 3, 100: 4, 101: 5, 102: 6, 103: 7, 104: 8, 105: 9,
        110: deciSep, 188: deciSep, 190: deciSep
        };
        
        var caretPos = this.selectionStart;
        var caretEnd = this.selectionEnd;
        
        if(caretPos != caretEnd) // remove selected text
        value = value.substring(0,caretPos) + value.substring(caretEnd);
        
        caretPos = spaceCaretPos(value, caretPos);
        
        value = value.replace(thouReg, '');
        
        var before = value.substring(0,caretPos);
        var after = value.substring(caretPos);
        var newPos = caretPos+1;
        
        if(keys[key] == deciSep && value.indexOf(deciSep) >= 0){
          if(before.indexOf(deciSep) >= 0){ newPos--; }
          before = before.replace(deciReg, '');
          after = after.replace(deciReg, '');
        }
        var newValue = before + keys[key] + after;
        
        if(newValue.substring(0,1) == deciSep){
          newValue = "0"+newValue;
          newPos++;
        }
        
        while(newValue.length > 1 && 
          newValue.substring(0,1) == "0" && newValue.substring(1,2) != deciSep){
          newValue = newValue.substring(1);
          newPos--;
        }
        
        if(newValue.indexOf(deciSep) >= 0){
          var newLength = newValue.indexOf(deciSep)+deciNumber+1;
          if(newValue.length > newLength){
          newValue = newValue.substring(0,newLength);
          }
        }
        
        newValues = spaceFormat(newValue, newPos);
        
        this.value = newValues[0];
        this.selectionStart = newValues[1];
        this.selectionEnd   = newValues[1];
      }
    }
  }
  
  $(this).on('blur', function(e){
    
    if(deciNumber > 0){
      var value = this.value;
      
      var noDec = "";
      for(var i = 0; i < deciNumber; i++)
      noDec += "0";
      
      if(value == "0"+deciSep+noDec)
      this.value = ""; //<-- put your default value here
      else
      if(value.length > 0){
        if(value.indexOf(deciSep) >= 0){
          var newLength = value.indexOf(deciSep)+deciNumber+1;
          if(value.length < newLength){
          while(value.length < newLength){ value = value+"0"; }
          this.value = value.substring(0,newLength);
          }
        }
        else this.value = value + deciSep + noDec;
      }
    }
  });
  }
});
</script>
@endsection
