<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TikproLama extends Model
{
    public $table = "TIKPRO_LAMA";
    public $fillable = array(
      'NAMA_TIKPRO_LAMA',
      'DEADLINE_TIKPRO_LAMA',
    );
    public $primaryKey = "ID_TIKPRO_LAMA";
}
