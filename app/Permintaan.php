<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{

	public $table = "PERMINTAAN";
    public $fillable = array(
    	'NAMA_REQUESTER',
    	'BARANG_PERMINTAAN',
    	'NO_FPBJ',
    	'TARGET_SELESAI',
    	'KETERANGAN',
    	'TINDAK_LANJUT_AKHIR',
    	'STATUS',
    	'FPB',
    	'RFQ',
    	'DO',
    	'BAST',
    );
    public $primaryKey = "ID_PERMINTAAN";
}
