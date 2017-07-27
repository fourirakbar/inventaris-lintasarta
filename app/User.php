<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'REQUESTER';
    protected $fillable = [
        'NAMA_REQUESTER',
        'username', 
        'password',
    ];
    protected $primaryKey = 'ID_REQUESTER';
}
