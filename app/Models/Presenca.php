<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Presenca
 */
class Presenca extends Model
{
    protected $table = 'presenca';

    public $timestamps = false;

    protected $fillable = [
        'atividade',
        'pessoa',
        'local',
        'ubs',
        'ip'
    ];

    protected $guarded = [];

        
}