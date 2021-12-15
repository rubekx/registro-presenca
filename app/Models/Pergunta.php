<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pergunta
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $descricao
 * @property string $descricaoId
 * @property string $tipo_input
 * @property int $tipo_avaliacao
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pergunta whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pergunta whereDescricaoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pergunta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pergunta whereTipoAvaliacao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pergunta whereTipoInput($value)
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