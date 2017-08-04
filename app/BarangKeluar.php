<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    public $table = "BARANG_KELUAR";
    public $fillable = array(
      'BARANG_ID',
      'NO_TICKET',
      'NAMA_USER',
      'PERANGKAT',
      'NOMOR_REGISTRASI',
      'KETERANGAN',
      'TGL_KELUAR',
      'CATATAN_KELUAR',
    );
    public $primaryKey = "ID_BARANGKELUAR";
}
