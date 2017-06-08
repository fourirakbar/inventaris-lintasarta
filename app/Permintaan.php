<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
	public $table = "permintaans";
    protected $fillable = array(
    	'nama_peminta',
    	'barang_permintaan',
    );
}
