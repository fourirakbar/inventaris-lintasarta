@extends('layouts.lumino')



<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">Dashboard</a></li>
				<li><a href="/semua">Semua Request Barang</a></li>
				<li><a href="{{ url('/semua/lihat', $jebret->ID_PERMINTAAN) }}">Detail Request Barang</a></li>
				<li class="actiove">Edit Request Barang</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tindak Lanjut Request Barang</h1>
			</div>
		</div><!--/.row-->		
		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					
					<div class="panel-body">
						<div class="col-md-12">
							<div class="panel panel-default">
							<div class="panel-heading">Detail Request Barang</div>
							<div class="panel-body">

								<table class="table table-bordered">
								    <thead>	
								    <form action="{{ url('/semua/lihat/edit', $jebret->ID_PERMINTAAN) }}" method="POST">
								    
								    	<input type="hidden" name="_method" value="PUT">
								    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
						                <div class="form-group"> 
						                  <label>ID Permintaan</label> 
						                  <input class="form-control" value="{{ $jebret->ID_PERMINTAAN }}" name="ID_PERMINTAAN" disabled=""> 
						                </div> 
						                
						                <div class="form-group"> 
						                  <label>Nama Requester</label> 
						                  <input class="form-control" value="{{ $jebret->NAMA_REQUESTER }}" name="NAMA_REQUESTER" disabled=""> 
						                </div> 
						                
						                <div class="form-group"> 
						                  <label>Tanggal Permintaan</label> 
						                  <input class="form-control" value="{{ $jebret->TGL_PERMINTAAN }} " name="TGL_PERMINTAAN" disabled=""> 
						                </div> 
						                
						                <div class="form-group"> 
						                  <label>Barang yang Diminta</label> 
						                  <input class="form-control" value="{{ $jebret->BARANG_PERMINTAAN }}" name="BARANG_PERMINTAAN" disabled=""> 
						                </div> 
						                
						                <div class="form-group"> 
						                  <label>No FPBJ</label> 
						                  <input class="form-control" placeholder="No FPBJ" name="NO_FPBJ" value="{{ $jebret->NO_FPBJ }}"> 
						                </div> 
						                
						                <div class="form-group"> 
						                  <label>Target Selesai</label> 
						                  <input type="date" class="form-control calendar1" name="TARGET_SELESAI" placeholder="Tanggal Target Selesai" value="{{ $jebret->TARGET_SELESAI }}"> 
						                </div> 
						                
						                <div class="form-group"> 
						                  <label>Keterangan</label> 
						                  <input class="form-control" placeholder="Keterangan" name="KETERANGAN" value="{{ $jebret->KETERANGAN }}"> 
						                </div> 
						                
						                <div class="form-group"> 
						                  <label>Target Tindak Lanjut Akhir</label> 
						                  <input type="date" class="form-control calendar1" name="TINDAK_LANJUT_AKHIR" placeholder="Tanggal Target Selesai" value="{{ $jebret->TINDAK_LANJUT_AKHIR }}"> 
						                </div> 
						                
						                <div class="form-group"> 
						                  <label>Status</label> 
						                  <input class="form-control" placeholder="Status" name="STATUS" value="{{ $jebret->STATUS }}"> 
						                </div> 
						                
						                <div class="form-group"> 
						                  <label>FPB</label> 
						                  <input type="date" class="form-control calendar1" name="FPB" placeholder="FPB" value="{{ $jebret->FPB }}"> 
						                </div> 
						                
						                <div class="form-group"> 
						                  <label>RFQ</label> 
						                  <input type="date" class="form-control calendar1" name="RFQ" placeholder="RFQ" value="{{ $jebret->RFQ }}"> 
						                </div> 
						                
						                <div class="form-group"> 
						                  <label>SPK</label> 
						                  <input type="date" class="form-control calendar1" name="SPK" placeholder="SPK" value="{{ $jebret->SPK }}"> 
						                </div> 
						                
						                <div class="form-group"> 
						                  <label>Delivery Order</label> 
						                  <input type="date" class="form-control calendar1" name="DO" placeholder="Delivery Order" value="{{ $jebret->DO }}"> 
						                </div> 
						                
						                <div class="form-group"> 
						                  <label>BAST</label> 
						                  <input type="date" class="form-control calendar1" name="BAST" placeholder="BAST" value="{{ $jebret->BAST }}"> 
						                </div> 
						                
						                <button type="submit" class="btn btn-primary">Update</button> 
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
  