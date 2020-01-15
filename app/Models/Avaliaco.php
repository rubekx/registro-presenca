<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Avaliaco
 */
class Avaliaco extends Model
{
    protected $table = 'avaliacoes';

    public $timestamps = false;

    protected $fillable = [
        'presenca',
        'pergunta',
        'resposta',
        'data',
        'ip'
    ];

    protected $guarded = [];

        
}