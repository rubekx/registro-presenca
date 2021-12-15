<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PresencaKey
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $presenca
 * @property string $key_auth
 * @property int $used
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PresencaKey whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PresencaKey whereKeyAuth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PresencaKey wherePresenca($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PresencaKey whereUsed($value)
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