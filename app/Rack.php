<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rack extends Model
{
    public $table = "rack";
    public $fillable = array(
    	'NAMA_RACK',
    	'LOKASI_RACK',
    );
    public $primaryKey = "ID_RACK";
}
