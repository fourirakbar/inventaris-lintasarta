<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{

	public $table = "PERMINTAAN";
    public $fillable = array(
        'NOMOR_TICKET',
        'TGL_PERMINTAAN',
    	'NAMA_REQUESTER',
    	'BARANG_PERMINTAAN',
    	'NO_FPBJ',
        'TGL_INPUT_FPBJ',
    	'TARGET_SELESAI',
    	'KETERANGAN',
    	'TINDAK_LANJUT_AKHIR',
    	'STATUS',
    	'FPB',
    	'RFQ',
    	'DO',
    	'BAST',
        'TGL_DEADLINE',
        'titik_proses',
    );
    public $primaryKey = "ID_PERMINTAAN";
}
