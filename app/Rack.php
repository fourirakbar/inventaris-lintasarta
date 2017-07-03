<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rack extends Model
{
    public $table = "RACK";
    public $fillable = array(
    	'NAMA_RACK',
    	'LOKASI_RACK',
    );
    public $primaryKey = "ID_RACK";
}
