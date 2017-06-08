<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
<<<<<<< HEAD
	public $table = "PERMINTAAN";
    public $fillable = array(
    	'BARANG_PERMINTAAN',
=======
	public $table = "permintaan";
    protected $fillable = array(
    	'nama_peminta',
    	'barang_permintaan',
>>>>>>> master
    );
}
