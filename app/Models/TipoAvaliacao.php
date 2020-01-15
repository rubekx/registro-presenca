<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoAvaliacao
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