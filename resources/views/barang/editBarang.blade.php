@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        Edit Data
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/semua">Data Request Barang yang Belum Selesai</a></li>
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

        <form action="{{ url('/showbarang/edit', $barang->ID_BARANG) }}" method="POST">
			    <div class="box-body" style="padding-right: 10%; padding-left: 10%; padding-bottom: 5%">
			    	<input type="hidden" name="_method" value="PUT">
			    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                <div class="form-group">
	                  <label>Nomor Registrasi</label>
	                  <input class="form-control" value="{{ $barang->NOMOR_REGISTRASI }}" name="NOMOR_REGISTRASI">
	                </div>

	                <div class="form-group">
	                  <label>Nama Barang</label>
	                  <input class="form-control" value="{{ $barang->NAMA_BARANG }}" name="NAMA_BARANG">
	                </div>

	                <div class="form-group">
	                  <label>Jumlah</label>
	                  <input class="form-control" value="{{ $barang->JUMLAH }}" name="JUMLAH">
	                </div>

	                <div class="form-group">
	                  <label>Harga</label>
	                  <input class="form-control numberOnly" value="{{ $barang->HARGA_BARANG }}" name="HARGA_BARANG">
	                </div>

	                <div class="form-group">
	                  <label>Keterangan</label>
	                  <input class="form-control" value="{{ $barang->KETERANGAN }}" name="KETERANGAN">
	                </div>

	                <div class="form-group">
	                  <label>Status Barang</label>
	                  <select class="form-control" name="STATUS_BARANG">
	                  	  @if($barang->STATUS_BARANG == 'Diperbaiki')
		                  	<option selected="" value=""><b>-- Pilih Menu DIbawah --</b></option>
		                  	<option selected="" value="Diperbaiki">Diperbaiki</option>
		                  	<option value="Dipinjam">Dipinjam</option>
		                  	<option value="Rusak">Rusak</option>
		                  	<option value="Tidak Terpakai">Tidak Terpakai</option>
		                  @elseif($barang->STATUS_BARANG == 'Dipinjam')
		                  	<option selected="" value=""><b>-- Pilih Menu DIbawah --</b></option>
		                  	<option value="Diperbaiki">Diperbaiki</option>
		                  	<option selected="" value="Dipinjam">Dipinjam</option>
		                  	<option value="Rusak">Rusak</option>
		                  	<option value="Tidak Terpakai">Tidak Terpakai</option>
		                  @elseif($barang->STATUS_BARANG == 'Rusak')
		                  	<option selected="" value=""><b>-- Pilih Menu DIbawah --</b></option>
		                  	<option value="Diperbaiki">Diperbaiki</option>
		                  	<option value="Dipinjam">Dipinjam</option>
		                  	<option selected="" value="Rusak">Rusak</option>
		                  	<option value="Tidak Terpakai">Tidak Terpakai</option>
		                  @elseif($barang->STATUS_BARANG == 'Tidak Terpakai')
		                  	<option selected="" value=""><b>-- Pilih Menu DIbawah --</b></option>
		                  	<option value="Diperbaiki">Diperbaiki</option>
		                  	<option value="Dipinjam">Dipinjam</option>
		                  	<option value="Rusak">Rusak</option>
		                  	<option selected="" value="Tidak Terpakai">Tidak Terpakai</option>
		                  @else
		                  	<option selected="" value=""><b>-- Pilih Menu DIbawah --</b></option>
		                  	<option value="Diperbaiki">Diperbaiki</option>
		                  	<option value="Dipinjam">Dipinjam</option>
		                  	<option value="Rusak">Rusak</option>
		                  	<option value="Tidak Terpakai">Tidak Terpakai</option>   
		                  @endif
	                  </select>
	                </div>
	                <div class="form-group">
					  <label>RACK</label>
					  <select class="form-control" name="RACK_ID">
					    <option disabled><b>-- Pilih Menu DIbawah --</b></option>
					    @foreach ($listRack as $key)
					    	@if($barang->RACK_ID == $key->ID_RACK)
					      		<option selected value="{{ $key->ID_RACK }}">{{ $key->NAMA_RACK }}</option>
					      	@else
					      		<option value="{{ $key->ID_RACK }}">{{ $key->NAMA_RACK }}</option>
					      	@endif
					    @endforeach
					  </select>
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
<script type="text/javascript">
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

$('.price > input:eq(0)').focus();
</script>
@endsection