<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Modalidade
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $descricao
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Modalidade whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Modalidade whereId($value)
 */
class Modalidade extends Model
{
    protected $table = 'modalidade';

    public $timestamps = false;

    protected $fillable = [
        'descricao'
    ];

    protected $guarded = [];

        
}