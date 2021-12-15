<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipo
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $descricao
 * @property int|null $tipo_nt4
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipo whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tipo whereTipoNt4($value)
 */
class Tipo extends Model
{
    protected $table = 'tipo';

    public $timestamps = false;

    protected $fillable = [
        'descricao',
        'tipo_nt4'
    ];

    protected $guarded = [];

        
}