<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cbo
 */
class Cbo extends Model
{
    protected $table = 'cbo';

    protected $primaryKey = 'codigo';

	public $timestamps = false;

    protected $fillable = [
        'nome'
    ];

    protected $guarded = [];


}