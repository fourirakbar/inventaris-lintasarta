<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tikpro extends Model
{
    public $table = "TIKPRO";
    public $primaryKey = "ID_TIKPRO";
    // protected $guarded = ['_method'];
    public function permintaan() {
    	return $this->hasMany('Permintaan', 'TIKPRO_ID', 'ID_TIKPRO');
    }
}
