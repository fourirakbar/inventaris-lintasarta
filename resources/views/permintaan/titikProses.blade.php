@extends('layouts.lumino') 
@section('content') 
@endsection 
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">       
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li class="active">Pengaturan Titik Proses</li>
      </ol>
    </div><!--/.row-->

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
    @endif
     
    <div class="row"> 
      <div class="col-lg-12"> 
        <h1 class="page-header">Pengaturan Titik Proses</h1> 
      </div> 
    </div><!--/.row--> 
         
     
    <div class="row" onclick="getdate()"> 
      <div class="col-lg-12"> 
        <div class="panel panel-default"> 
           
          <div class="panel-body"> 
            <div class="col-md-6"> 
              <!-- <form role="form"> --> 
              <form method="POST" role="form" action="{{ URL::to('request2') }}"> 
                <!-- div class="form-group"> 
                  <label>ID Requester</label> 
                  <input class="form-control" placeholder="" disabled=""> 
                </div>  -->
                <div class="form-group"> 
                  <label>Update Titik Proses</label> 
                  <select class="form-control" placholder="Pilih Data" name="TITIK_PROSES">
                    <option value="Input FPBJ">Input FPBJ</option>
                    <option value="Approval GM">Approval GM</option>
                    <option value="Approve Budget">Approve Budget</option>
                    <option value="RFQ">RFQ</option>
                    <option value="SPK">SPK</option>
                    <option value="DO">DO</option>
                    <option value="Pembuatan No. Registrasi">Pembuatan No. Registrasi</option>
                    <option value="FMB">FMB</option>
                    <option value="Pengiriman ke User">Pengiriman ke User</option>
                  </select> 
                  <br><br>
                <button type="submit" class="btn btn-primary">Submit</button> 
                <button type="reset" class="btn btn-default">Reset</button> 
              </div> 
            </form> 
          </div> 
        </div> 
      </div><!-- /.col--> 
    </div><!-- /.row --> 
     
  </div><!--/.main-->