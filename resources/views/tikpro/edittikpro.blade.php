@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
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
              <h3 class="box-title">Quick Example</h3>
            </div>
            @if ($message = Session::get('success'))
              <div class="alert alert-success">
                <p>{{ $message }}</p>
              </div>
            @endif
            <form action="{{ URL::to('edittikpro') }}" method="POST">
            <div class="box-body" style="padding-right: 30%">
	            <table id="example1" class="table table-bordered table-striped">
				  		<input type="hidden" name="_method" value="PUT">
				    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
				    	<thead>
		                <tr>
		                        <th style="text-align: center; vertical-align: middle; ">ID TIKPRO</th>
		                        <th style="text-align: center; vertical-align: middle; ">Nama Proses</th>
		                        <th style="text-align: center; vertical-align: middle; ">Deadline</th>
		                </tr>
	                	</thead>
	                	
	                	<tbody>
	                	<tr>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[0]->ID_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[0]->NAMA_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; "><input class="form-control" style="text-align: center; vertical-align: middle; " value="{{ $jebret[0]->DEADLINE }} " name="DEADLINE1"></td>{{csrf_field()}}
	                	</tr>
	                	<tr>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[1]->ID_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[1]->NAMA_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; "><input class="form-control" style="text-align: center; vertical-align: middle; " value="{{ $jebret[1]->DEADLINE }} " name="DEADLINE2"></td>{{csrf_field()}}
	                	</tr>
	                	<tr>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[2]->ID_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[2]->NAMA_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; "><input class="form-control" style="text-align: center; vertical-align: middle; " value="{{ $jebret[2]->DEADLINE }} " name="DEADLINE3"></td>{{csrf_field()}}
	                	</tr>
	                	<tr>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[3]->ID_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[3]->NAMA_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; "><input class="form-control" style="text-align: center; vertical-align: middle; " value="{{ $jebret[3]->DEADLINE }} " name="DEADLINE4"></td>{{csrf_field()}}
	                	</tr>
	                	<tr>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[4]->ID_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[4]->NAMA_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; "><input class="form-control" style="text-align: center; vertical-align: middle; " value="{{ $jebret[4]->DEADLINE }} " name="DEADLINE5"></td>{{csrf_field()}}
	                	</tr>
	                	<tr>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[5]->ID_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[5]->NAMA_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; "><input class="form-control" style="text-align: center; vertical-align: middle; " value="{{ $jebret[5]->DEADLINE }} " name="DEADLINE6"></td>{{csrf_field()}}
	                	</tr>
	                	<tr>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[6]->ID_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[6]->NAMA_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; "><input class="form-control" style="text-align: center; vertical-align: middle; " value="{{ $jebret[6]->DEADLINE }} " name="DEADLINE7"></td>{{csrf_field()}}
	                	</tr>
	                	<tr>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[7]->ID_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[7]->NAMA_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; "><input class="form-control" style="text-align: center; vertical-align: middle; " value="{{ $jebret[7]->DEADLINE }} " name="DEADLINE8"></td>{{csrf_field()}}
	                	</tr>
	                	<tr>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[8]->ID_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $jebret[8]->NAMA_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; "><input class="form-control" style="text-align: center; vertical-align: middle; " value="{{ $jebret[8]->DEADLINE }} " name="DEADLINE9"></td>{{csrf_field()}}
	                	</tr>
	                	</tbody>
		        </table>
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
	  $(function () {
	    $('#example1').DataTable({
	      "paging": false,
	      "lengthChange": true,
	      "searching": false,
	      "ordering": true,
	      "autoWidth": true
	    });
	  });
	</script>
@endsection