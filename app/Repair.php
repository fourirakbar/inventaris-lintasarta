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
    );
    public $primaryKey = "ID_PERBAIKAN";
}
