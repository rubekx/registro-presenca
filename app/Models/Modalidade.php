<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Modalidade
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