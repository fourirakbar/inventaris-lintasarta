<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{

	public $table = "PERMINTAAN";
    public $fillable = array(
    	'NAMA_REQUESTER',
    	'BARANG_PERMINTAAN',

    );
    public $primaryKey = "ID_PERMINTAAN";
}
