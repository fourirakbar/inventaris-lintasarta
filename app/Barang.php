<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public $table = "barang";
    public $fillable = array(
    	'RACK_ID',
    	'NO_REGISTRASI',
    	'NAMA_BARANG',
        'JUMLAH_BARANG',
    	'KETERANGAN',
    );
    public $primaryKey = "ID_BARANG";
}
