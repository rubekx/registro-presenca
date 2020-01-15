<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProfGeral
 */
class ProfGeral extends Model
{
    protected $table = 'prof_geral';

    public $timestamps = false;

    protected $fillable = [
        'pessoa',
        'cbo',
        'municipio'
    ];

    protected $guarded = [];

        
}