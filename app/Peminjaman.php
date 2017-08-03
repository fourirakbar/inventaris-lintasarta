<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    public $table = "PEMINJAMAN";
    public $fillable = array(
        'NAMA_PEMINJAM',
        'PERANGKAT',
        'NOMOR_REGISTRASI',
        'TGL_PEMINJAMAN',
        'TGL_PENGEMBALIAN',
        'KETERANGAN',
        'NOMOR_TICKET',
        'CATATAN_PEMINJAMAN',
    );
    public $primaryKey = "ID_PEMINJAMAN";
}
