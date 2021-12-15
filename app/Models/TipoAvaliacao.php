<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoAvaliacao
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $descricao
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TipoAvaliacao whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TipoAvaliacao whereId($value)
 */
class TipoAvaliacao extends Model
{
    protected $table = 'tipo_avaliacao';

    public $timestamps = false;

    protected $fillable = [
        'descricao'
    ];

    protected $guarded = [];

        
}