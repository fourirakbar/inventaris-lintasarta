<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    public $table = "REPAIR";
    public $fillable = array(
    	'NAMA_BARANG',
    	'NOMOR_REGISTRASI',
    	'PROBLEM',
    	'VENDOR',
    	'TANGGAL_REPAIR',
    	'PERKIRAAN_SELESAI',
    	'CATATAN_REPAIR',
        'NOMOR_TICKET',
    );
    public $primaryKey = "ID_PERBAIKAN";
}
