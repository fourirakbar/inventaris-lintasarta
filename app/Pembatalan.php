<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembatalan extends Model
{
    public $table = "PEMBATALAN";
    public $primaryKey = "ID_PEMBATALAN";
    public $fillable = array(
        'PERMINTAAN_ID',
        'ALASAN_PEMBATALAN',
        'TGL_PEMBATALAN',
        'FILE_PEMBATALAN',
        'STATUS_PEMBATALAN',
        'COUNTER',
    );
    public function permintaan() {
    	return $this->belongsTo('Permintaan', 'PERMINTAAN_ID', 'ID_PERMINTAAN');
    }
}
