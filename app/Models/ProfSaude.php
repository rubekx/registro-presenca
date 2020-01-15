<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProfSaude
 */
class ProfSaude extends Model
{
    protected $table = 'prof_saude';

    public $timestamps = false;

    protected $fillable = [
        'cns',
        'pessoa',
        'equipe',
        'ubs'
    ];

    protected $guarded = [];

        
}