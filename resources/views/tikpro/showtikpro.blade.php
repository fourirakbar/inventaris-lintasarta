@extends('layouts.lumino')
@section('content')
<section class="content-header">
      <h1>
        Pengaturan Deadline
        <small>Titik Proses</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pengaturan Deadline</li>
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
            <div class="box-body" style="padding-right: 30%">
	            <table class="table table-bordered table-striped">
		                <tr>
		                        <th style="text-align: center; vertical-align: middle; ">NO TIKPRO</th>
		                        <th style="text-align: center; vertical-align: middle; ">Nama Proses</th>
		                        <th style="text-align: center; vertical-align: middle; ">Deadline</th>
		                </tr>
	                	</thead>

	                	<tbody>
	                	@foreach ($jebret as $key)
	                	<tr>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $key->ID_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $key->NAMA_TIKPRO }}</td>
	                		<td style="text-align: center; vertical-align: middle; ">{{ $key->DEADLINE }} Hari</td>
	                	</tr>
	                	@endforeach
	                	</tbody>
		        </table>
		        <div class="col-md-6 pull-right">
			        <table class="table table-bordered">
					  		<tbody>
		                		<tr>
		                			<td style="text-align: center; vertical-align: middle; ">TOTAL</td>
		                		<td style="text-align: center; vertical-align: middle; ">
		                		<?php
		                		$total = 0;
		                		foreach ($jebret as $key) {
		                			$total += $key->DEADLINE;
		                		}
		                		echo $total." Hari";
		                		?></td>
		                		</tr>
		                	</tbody>
			        </table>
		        </div><br><br><br><br>
		        @if(Auth::user()->jenis_user == 'superadmin')
		        	<a href="{{ URL::to('edittikpro') }}"><button class="btn btn-primary btn-lg pull-right">Edit</button></a>
		        @endif
	        </div>
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
@endsection
