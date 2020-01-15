<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pessoa
 */
class Pessoa extends Model
{
    protected $table = 'pessoa';

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'sobrenome',
        'cpf',
        'email',
        'celular',
        'sexo'
    ];

    protected $guarded = [];

        
}