function login() {
	swal({
		title: 'Berhasil Login',
		text: 'Selamat Datang Admin',
		type: 'success'
	}).then(function() {
		window.location = 'request2';
	});
}

function register() {
	swal({
		title: 'Pendaftaran Peserta Sukses',
		text: 'Silahkan Tunggu Pengumuman Selanjutnya',
		type: 'success'
	}).then(function() {
		window.location = 'statusLolosBerkas';
	});
}

function signout() {
	swal({
		title: 'Berhasil Logout',
		text: 'Logout sukses',
		type: 'success'
	}).then(function() {
		window.location = 'login';
	});
}

function statusLolosBerkas() {
	swal({
		title: 'Selamat Anda Lolos ke Tahap Wawancara',
		text: 'Wawancara akan dilakukan di selasar perpustakaan ITS pada 10 Mei 2017',
		type: 'success'
	}).then(function() {
		window.location = 'statusLolosBerkas';
	});
}

function statusLolosWawancara() {
	swal({
		title: 'Selamat Anda Lolos Tahap Wawancara',
		text: 'Anda dinyatakan resmi sebagai peserta LKMM TL',
		type: 'success'
	}).then(function() {
		window.location = 'statusLolosWawancara';
	});
}

function statusGagalBerkas() {
	swal({
		title: 'Maaf Anda Gagal Lolos ke Tahap Wawancara',
		text: '',
		type: 'warning'
	}).then(function() {
		window.location = 'statusGagalBerkas';
	});
}

function statusGagalWawancara() {
	swal({
		title: 'Maaf Anda Gagal Lolos Tahap Wawancara',
		text: '',
		type: 'warning'
	}).then(function() {
		window.location = 'statusGagalWawancara';
	});
}