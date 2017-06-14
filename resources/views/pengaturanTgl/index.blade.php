@extends('layouts.lumino')
@section('content')

@endsection
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">Dashboard</a></li>
				<li class="active">Atur Tanggal Deadline</li>
			</ol>
		</div><!--/.row-->

		@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@endif
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Pengaturan Tanggal</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
			<div>
				<div class="panel panel-default">
					
					<div class="panel-body">
						<div class="col-md-12">
							<div class="panel panel-default">
							<div class="panel-body">

									
								<input type="hidden" name="method">
            					<a class="btn btn-primary pull-left" href="/pengaturanTgl/edit"><b class="material-icons" title="Ubah pengumuman">Edit Tanggal</b></a>	
								

								
            					<br>
            					<br>

            					<br>

								<table class="table table-bordered">
									
								    @foreach ($pengaturan as $key)
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Input FPBJ</th>
								        <td>{{ $key->INPUT_FPBJ }} <?php echo " Hari" ?></td>
								    </tr>
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Approval GM</th>
								        <td>{{ $key->APPROVAL_GM }} <?php echo " Hari" ?></td>
								    </tr>
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Approve Budget</th>
								        <td>{{ $key->APPROVE_BUDGET }} <?php echo " Hari" ?></td>
								    </tr>
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">RFQ</th>
								        <td>{{ $key->RFQ }} <?php echo " Hari" ?></td>
								    </tr>
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">SPK</th>
								        <td>{{ $key->SPK }} <?php echo " Hari" ?></td>
								    </tr>
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Delivery Order</th>
								        	<td>{{ $key->DO }} <?php echo " Hari" ?></td>
								    </tr>
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Pembuatan No. Registrasi</th>
								        <td>{{ $key->NO_REGIS }} <?php echo " Hari" ?></td>
								    </tr>
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">FMB</th>
								        	<td>{{ $key->FMB }} <?php echo " Hari" ?></td>
								    </tr>
								    <tr>
								        <th style="width: 20%; text-align: left; vertical-align: middle;padding-left: 10px;">Pengiriman ke User</th>
								        	<td>{{ $key->PENGIRIMAN_KE_USER }} <?php echo " Hari" ?></td>
								    </tr>
								    @endforeach
								    </thead>
								</table>
								
							</div>
						</div>
							
						</div>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->
