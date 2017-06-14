<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengaturanTgl extends Model
{
    public $table = "PENGATURAN_SISTEM";
    public $fillable = array(
        'INPUT_FPBJ',
        'APPROVAL_GM',
    	'APPROVE_BUDGET',
    	'RFQ',
    	'SPK',
        'DO',
    	'NO_REGIS',
    	'FMB',
    	'PENGIRIMAN_KE_USER',
    );
    public $primaryKey = "ID_PENGATURAN";
}
