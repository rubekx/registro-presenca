<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Atividade
 */
class Atividade extends Model
{
    protected $table = 'atividade';

    public $timestamps = false;

    protected $fillable = [
        'modalidade',
        'tipo',
        'tema',
        'moderador',
        'descricao',
        'dt',
        'hr_inicio',
        'hr_termino',
        'local',
        'status'
    ];

    protected $guarded = [];

        
}