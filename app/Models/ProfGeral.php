<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProfGeral
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $pessoa
 * @property string $cbo
 * @property int $municipio
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProfGeral whereCbo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProfGeral whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProfGeral whereMunicipio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProfGeral wherePessoa($value)
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