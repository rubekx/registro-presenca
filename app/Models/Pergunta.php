<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pergunta
 */
class Pergunta extends Model
{
    protected $table = 'perguntas';

    public $timestamps = false;

    protected $fillable = [
        'descricao',
        'tipo_avaliacao'
    ];

    protected $guarded = [];

        
}