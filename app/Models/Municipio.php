<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Class Municipio
 *
 * @property-read \App\Models\Estado $estado
 * @mixin \Eloquent
 * @property int $ibge
 * @property string $nome
 * @property int $uf
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Municipio whereIbge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Municipio whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Municipio whereUf($value)
 */
class Municipio extends Model
{
    protected $table = 'municipio';

    protected $primaryKey = 'ibge';

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'uf'
    ];

    protected $guarded = [];

    public function estado(){
        return $this->belongsTo('App\Models\Estado', 'uf');
    }
}