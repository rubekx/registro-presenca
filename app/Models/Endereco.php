<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Endereco
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