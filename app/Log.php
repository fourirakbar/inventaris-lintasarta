<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public $table = "LOG_CLICK";
    public $fillable = array(
      'ISI',
      'update_at',
    );
    public $primaryKey = "ID_LOG";
}
