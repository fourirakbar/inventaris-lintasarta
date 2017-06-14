@extends('layouts.lumino') 
@section('content') 
@endsection 

<div class="container" id="manage-vue">
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Request Barang yang Belum</h2>
			</div>
			<div class="pull-right">
				<button type="button" class="btn btn-success" data-toggle="modal" date-target="$create-permintaan">
					Buat Permintaan Baru
				</button>
			</div>
		</div>
	</div>

	<!-- ITEM LISTING -->
	<table class="table table-bordered">
		<tr>
			<th>No Ticket</th>
			<th>Nama Requester</th>
			<th>Tanggal Permintaan</th>
			<th>Barang yang Dibutuhkan</th>
			<th>Status</th>
			<th>Sisa Hari</th>
			<th>Titk Proses</th>
			<th>Action</th>
		</tr>
		<tr v-for="permintaan in permintaans">
			<td>@{{ permintaan.NOMOR_TICKET }}</td>
			<td>@{{ permintaan.NAMA_REQUESTER }}</td>
			<td>@{{ permintaan.TGL_PERMINTAAN }}</td>
			<td>@{{ permintaan.BARANG_PERMINTAAN }}</td>
			<td>@{{ permintaan.STATUS }}</td>
			<td></td>
			<td></td>
			<td>
				<button class="btn btn-primary" @click.prevent="editPermintaan(permintaan)">Edit</button>
				<button class="btn btn-danger" @click.prevent="deletePermintaan(permintaan)">Delete</button>
			</td>
		</tr>
	</table>

	<!-- PAGINATION -->
	<nav>
		<ul class="pagination">
			<li v-if="pagination.current_page > 1">
				<a href="#" aria-label="Previous" @click.prevent = "changePage(pagination.current_page - 1)">
					<span aria-hidden="true"><<</span>
				</a>
			</li>
			<li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
				<a href="#" @click.prevent="changePage(page)">@{{ page }}</a>
			</li>
			<li v-if="pagination.current_page < pagination.last_page">
				<a href="#" aria-label="Next" @click.prevent = "changePage(pagination.current_page + 1)">
					<span aria-hidden="true">>></span>
				</a>
			</li>
		</ul>
	</nav>

	<!-- CREATE ITEM MODEL -->
	<div class="modal fade" id="create-permintaan" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Buat Request Baru</h4>
				</div>
				<div class="modal-body">
					<form method="POST" enctype="multipart/form-data" v-on:submit.prevent="createPermintaan">
						<div class="form-group">
							<label for="nomor_ticket">No. Ticket:</label>
							<input type="text" name="nomor_ticket" class="form-control" v-model="newPermintaan.nomor_ticket" />
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-success">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	
</div>