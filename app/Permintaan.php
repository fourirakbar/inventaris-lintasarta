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
        'BAGIAN',
        'DIVISI',
    	'BARANG_PERMINTAAN',
        'DESKRIPSI',
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
        'TIKPRO_ID',
        'PEMBATALAN_ID',
    );
    public $primaryKey = "ID_PERMINTAAN";

    public function tikpro() {
        return $this->belongsToMany('Tikpro','TIKPRO_ID','ID_TIKPRO');
    }
    public function pembatalan() {
        return $this->hasOne('Pembatalan','PEMBATALAN_ID','ID_PEMBATALAN');
    }
}
