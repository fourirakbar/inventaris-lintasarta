<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
	public $table = "permintaan";
    protected $fillable = array(
    	'nama_peminta',
    	'barang_permintaan',
    );
}
