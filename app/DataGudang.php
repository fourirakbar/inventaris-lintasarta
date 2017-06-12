<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataGudang extends Model
{
    public $table = "data_gudang";
    public $fillable = array(
    	'BARANG_ID',
    	'ALOKASI_GUDANG',
    	'STATUS_PEMINDAHAN',
    );
    public $primaryKey = "ID_DATA";
}
