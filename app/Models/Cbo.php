<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cbo
 *
 * @mixin \Eloquent
 * @property int $codigo
 * @property string $nome
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cbo whereCodigo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cbo whereNome($value)
 */
class Cbo extends Model
{
    protected $table = 'cbo';

    protected $primaryKey = 'codigo';

	public $timestamps = false;

    protected $fillable = [
        'nome'
    ];

    protected $guarded = [];


}