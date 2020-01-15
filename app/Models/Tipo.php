<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipo
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