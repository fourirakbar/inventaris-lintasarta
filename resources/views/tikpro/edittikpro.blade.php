@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        Pengaturan Tanggal
        <small>Titik Proses</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pengaturan Tanggal</li>
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
              <h3 class="box-title">Tanggal Titik Proses</h3>
            </div>
            @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
            @endif
            <form action="{{ URL::to('edittikpro') }}" method="POST">
            <div class="box-body" style="padding-right: 30%">
	            <table class="table table-bordered table-striped">
				  		<input type="hidden" name="_method" value="PUT">
				    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
				    	<thead>
		                <tr>
		                        <th style="text-align: center; vertical-align: middle; ">No.</th>
		                        <th style="text-align: center; vertical-align: middle; ">Nama Proses</th>
		                        <th style="text-align: center; vertical-align: middle; width: 20%;">Deadline</th>
		                </tr>
	                	</thead>
	                	
	                	<tbody>
	                	<tr>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[0]->ID_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[0]->NAMA_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; "><input class="form-control" style="text-align: center; vertical-align: middle; " value="{{ $jebret[0]->DEADLINE }}" name="DEADLINE[]" onkeyup="myFunction()"></td>{{csrf_field()}}
	                	</tr>
	                	<tr>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[1]->ID_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[1]->NAMA_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; "><input class="form-control" style="text-align: center; vertical-align: middle; " value="{{ $jebret[1]->DEADLINE }}" name="DEADLINE[]" onkeyup="myFunction()"></td>{{csrf_field()}}
	                	</tr>
	                	<tr>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[2]->ID_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[2]->NAMA_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; "><input class="form-control" style="text-align: center; vertical-align: middle; " value="{{ $jebret[2]->DEADLINE }}" name="DEADLINE[]" onkeyup="myFunction()"></td>{{csrf_field()}}
	                	</tr>
	                	<tr>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[3]->ID_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[3]->NAMA_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; "><input class="form-control" style="text-align: center; vertical-align: middle; " value="{{ $jebret[3]->DEADLINE }}" name="DEADLINE[]" onkeyup="myFunction()"></td>{{csrf_field()}}
	                	</tr>
	                	<tr>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[4]->ID_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[4]->NAMA_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; "><input class="form-control" style="text-align: center; vertical-align: middle; " value="{{ $jebret[4]->DEADLINE }}" name="DEADLINE[]" onkeyup="myFunction()"></td>{{csrf_field()}}
	                	</tr>
	                	<tr>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[5]->ID_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[5]->NAMA_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; "><input class="form-control" style="text-align: center; vertical-align: middle; " value="{{ $jebret[5]->DEADLINE }}" name="DEADLINE[]" onkeyup="myFunction()"></td>{{csrf_field()}}
	                	</tr>
	                	<tr>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[6]->ID_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[6]->NAMA_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; "><input class="form-control" style="text-align: center; vertical-align: middle; " value="{{ $jebret[6]->DEADLINE }}" name="DEADLINE[]" onkeyup="myFunction()"></td>{{csrf_field()}}
	                	</tr>
	                	<tr>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[7]->ID_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[7]->NAMA_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; "><input class="form-control" style="text-align: center; vertical-align: middle; " value="{{ $jebret[7]->DEADLINE }}" name="DEADLINE[]" onkeyup="myFunction()"></td>{{csrf_field()}}
	                	</tr>
	                	<tr>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[8]->ID_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[8]->NAMA_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; "><input class="form-control" style="text-align: center; vertical-align: middle; " value="{{ $jebret[8]->DEADLINE }}" name="DEADLINE[]" onkeyup="myFunction()"></td>{{csrf_field()}}
	                	</tr>
	                	</tbody>
		        </table><br><br>
		        <div class="col-md-6 pull-right">
			        <table class="table table-bordered">
					  		<tbody>
		                		<tr>
		                			<td style="text-align: center; vertical-align: middle; ">TOTAL</td>
		                			<td style="text-align: center; vertical-align: middle;" id="totalhari">
		                				<?php 
				                		$total = 0;
				                		foreach ($jebret as $key) {
				                			$total += $key->DEADLINE;
				                		}
				                		echo $total." Hari";
				                		?>
		                			</td>
		                		{{ Session::put('totaltikpro', $total) }}
		                		</tr>
		                	</tbody>
			        </table>
		        </div><br><br><br><br>
		        <button type="submit" class="btn btn-primary btn-lg pull-right">Update</button></a> 
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
<!-- DataTables -->
	<script src="{{URL::asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{URL::asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
	<script>
	  
	  function myFunction() {
		    // var x = document.getElementById("fname").value;
		    // document.getElementById("demo").innerHTML = x;
		    var total = 0;
		    for(i=0 ; i<9; i++){
		    	total += parseInt(document.getElementsByName("DEADLINE[]")[i].value)
		    }
		    var total2 = document.getElementById("totalhari");
		    var str2 = " Hari";
			total2.innerHTML = String(total).concat(str2);
		}
	</script>
@endsection