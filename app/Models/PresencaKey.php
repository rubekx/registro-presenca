<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PresencaKey
 */
class PresencaKey extends Model
{
    protected $table = 'presenca_keys';

    public $timestamps = false;

    protected $fillable = [
        'presenca',
        'key'
    ];

    protected $guarded = [];

        
}