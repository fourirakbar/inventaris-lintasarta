<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryTikpro extends Model
{
    public $table = "HISTORY_TIKPRO";
    public $fillable = array (
    	'TIKPRO_ID',
      'TIKPRO_NAMA',
    	'PERMINTAAN_ID',
    	'TGL_SELESAI',
    );
    public $primaryKey = 'ID_HISTORY';
}
