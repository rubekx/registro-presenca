<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ub
 */
class Ubs extends Model
{
    protected $table = 'ubs';

    protected $primaryKey = 'cnes';

	public $timestamps = false;

    protected $fillable = [
        'nome',
        'endereco'
    ];

    protected $guarded = [];


}