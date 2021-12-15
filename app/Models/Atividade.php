<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Atividade
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $modalidade
 * @property int $tipo
 * @property string $tema
 * @property string|null $cod_decs
 * @property int|null $moderador
 * @property string $descricao
 * @property string $dt
 * @property string $hr_inicio
 * @property string $hr_termino
 * @property int $local
 * @property int $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Atividade whereCodDecs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Atividade whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Atividade whereDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Atividade whereHrInicio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Atividade whereHrTermino($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Atividade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Atividade whereLocal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Atividade whereModalidade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Atividade whereModerador($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Atividade whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Atividade whereTema($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Atividade whereTipo($value)
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