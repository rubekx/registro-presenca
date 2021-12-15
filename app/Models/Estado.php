<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estado
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Municipio[] $municipios
 * @mixin \Eloquent
 * @property int $id
 * @property string $descricao
 * @property string $sigla
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Estado whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Estado whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Estado whereSigla($value)
 */
class Estado extends Model
{
    protected $table = 'estado';

    public $timestamps = false;

    protected $fillable = [
        'descricao',
        'sigla'
    ];

    protected $guarded = [];

    public function municipios(){
        return $this->hasMany('App\Models\Municipio', 'uf');
    }

}