<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public $table = "BARANG";
    public $fillable = array(
    	'RACK_ID',
    	'NO_REGISTRASI',
    	'NAMA_BARANG',
      'JUMLAH_BARANG',
    	'KETERANGAN',
    	'HARGA_BARANG',
        'STATUS_BARANG',
    );
    public $primaryKey = "ID_BARANG";
}
