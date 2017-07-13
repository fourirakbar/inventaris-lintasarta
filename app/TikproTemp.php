<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TikproLama extends Model
{
    public $table = "TIKPRO_TEMP";
    public $fillable = array(
      'NAMA_TIKPRO_TEMP',
      'DEADLINE_TIKPRO_TEMP',
    );
    public $primaryKey = "ID_TIKPRO_TEMP";
}
