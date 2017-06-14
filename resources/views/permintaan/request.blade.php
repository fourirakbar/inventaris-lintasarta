@extends('layouts.lumino') 
@section('content') 
@endsection 
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">       
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li class="active">Semua Request Barang</li>
      </ol>
    </div><!--/.row-->

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
    @endif
     
    <div class="row"> 
      <div class="col-lg-12"> 
        <h1 class="page-header">Form Request Barang</h1> 
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
                  <label>Nomor Ticket</label> 
                  <input class="form-control" placeholder="Nomor Ticket" name="NOMOR_TICKET"> 
                </div> 
                {{csrf_field()}} 
                <div class="form-group"> 
                  <label>Nama Requester</label> 
                  <input class="form-control" placeholder="Nama Requester" name="NAMA_REQUESTER"> 
                </div> 
                {{csrf_field()}} 
                <div class="form-group"> 
                  <label>Barang yang Dibutuhkan</label> 
                  <input class="form-control" placeholder="Nama Barang" name="BARANG_PERMINTAAN"> 
                </div> 
                {{csrf_field()}}
                <div class="form-group"> 
                  <label>Tanggal Request</label> 
                  <input id="datereq" onclick="getdate()" type="date" class="form-control calendar1" placeholder="Tanggal Request" name="TGL_PERMINTAAN"> 
                </div> 
                {{csrf_field()}}
                <div class="form-group"> 
                  <label>Tanggal Deadline</label> 
                  <input id="datedead" class="form-control" placeholder="" name="TGL_DEADLINE" readonly>
                </div> 
                {{csrf_field()}}                 
                <button type="submit" class="btn btn-primary">Submit</button> 
                <button type="reset" class="btn btn-default">Reset</button> 
              </div> 
            </form> 
          </div> 
        </div> 
      </div><!-- /.col--> 
    </div><!-- /.row --> 
     
  </div><!--/.main-->