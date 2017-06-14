@extends('layouts.lumino')



<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">Dashboard</a></li>
				<li><a href="/pengaturanTgl">Pengaturan Tanggal</a></li>
				<li class="actiove">Edit Pengaturan Tanggal</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Pengaturan Tanggal</h1>
			</div>
		</div><!--/.row-->		
		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					
					<div class="panel-body">
						<div class="col-md-12">
							<div class="panel panel-default">
							<div class="panel-body">

								<table class="table table-bordered">
								    <thead>	
								    <form action="{{ url('/pengaturanTgl/edit/update') }}" method="POST">
								    
								    	<input type="hidden" name="_method" value="PUT">
								    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
						                <div class="form-group"> 
						                  <label>Input FPBJ</label> 
						                  <input type="number" class="form-control" value="{{ $pengaturan->INPUT_FPBJ }}" name="INPUT_FPBJ"> 
						                </div> 
						                
						                <div class="form-group"> 
						                  <label>Approval GM</label> 
						                  <input type="number" class="form-control" value="{{ $pengaturan->APPROVAL_GM }}" name="APPROVAL_GM"> 
						                </div> 
						                
						                <div class="form-group"> 
						                  <label>Approve Budget</label> 
						                  <input type="number" class="form-control" value="{{ $pengaturan->APPROVE_BUDGET }}" name="APPROVE_BUDGET"> 
						                </div> 
						                
						                <div class="form-group"> 
						                  <label>RFQ</label> 
						                  <input type="number" class="form-control" value="{{ $pengaturan->RFQ }}" name="RFQ"> 
						                </div> 
						                
						                <div class="form-group"> 
						                  <label>SPK</label> 
						                  <input type="number" class="form-control" name="SPK" value="{{ $pengaturan->SPK }}"> 
						                </div> 
						                
						                <div class="form-group"> 
						                  <label>Delivery Order</label> 
						                  <input type="number" class="form-control" name="DO" value="{{ $pengaturan->DO }}"> 
						                </div> 
						                
						                <div class="form-group"> 
						                  <label>Pembuatan No. Registrasi</label> 
						                  <input type="number" class="form-control" name="NO_REGIS" value="{{ $pengaturan->NO_REGIS }}"> 
						                </div> 
						                
						                <div class="form-group"> 
						                  <label>FMB</label> 
						                  <input type="number" class="form-control" name="FMB" value="{{ $pengaturan->FMB }}"> 
						                </div> 
						                
						                <div class="form-group"> 
						                  <label>Pengiriman ke User</label> 
						                  <input type="number" class="form-control" name="PENGIRIMAN_KE_USER" value="{{ $pengaturan->PENGIRIMAN_KE_USER }}"> 
						                </div> 
						                
						                <button type="submit" class="btn btn-primary">Update</button>&nbsp;&nbsp; 
						                <button type="reset" class="btn btn-default">Reset</button> 
						              </div> 
						            </form> 
								    
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
  