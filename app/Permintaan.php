<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
	public $table = "PERMINTAAN";
    public $fillable = array(
    	'BARANG_PERMINTAAN',
    );
}
