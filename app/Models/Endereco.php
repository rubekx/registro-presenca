<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Endereco
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $logradouro
 * @property string $num
 * @property string $cep
 * @property string $telefone
 * @property int $municipio
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Endereco whereCep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Endereco whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Endereco whereLogradouro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Endereco whereMunicipio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Endereco whereNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Endereco whereTelefone($value)
 */
class Endereco extends Model
{
    protected $table = 'endereco';

    public $timestamps = false;

    protected $fillable = [
        'logradouro',
        'num',
        'cep',
        'telefone',
        'municipio'
    ];

    protected $guarded = [];

        
}