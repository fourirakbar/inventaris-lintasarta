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
      'NAMA_BARANG',
      'KETERANGAN',
      'TGL_KELUAR',
    );
    public $primaryKey = "ID_BARANGKELUAR";
}
