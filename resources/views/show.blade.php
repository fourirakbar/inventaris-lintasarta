@extends('layouts.lumino')
@section('content')
@stop

<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>SHOW</h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-success" href="{{ route('request.create') }}">Buat Request Baru</a>
		</div>
	</div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Nama Peminta</th>
		<th>Nama Barang</th>
		<th width="200px">
			Action
		</th>
	</tr>
	@foreach ($permintaans as $key => $permintaan)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $permintaan->nama_peminta }}</td>
		<td>{{ $permintaan->nama_barang }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('request.show', $permintaan->id_permintaan) }}">SHOW</a>
			<a class="btn btn-primary" href="{{ route('request.edit', $permintaan->id_permintaan) }}">EDIT</a>
			{!! Form::open(['method' => 'DELETE','route' => ['request.destroy', $permintaan->id_permintaan], 'style'=>'display:inline']) !!}
			{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
			{!! Form::close !!}
		</td>
	</tr>
	@endforeach
</table>

{!! $permintaans->render() !!}
@endsection