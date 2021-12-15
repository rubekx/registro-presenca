<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Presenca
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $atividade
 * @property int $pessoa
 * @property int|null $local
 * @property int|null $ubs
 * @property string|null $ip
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Presenca whereAtividade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Presenca whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Presenca whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Presenca whereLocal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Presenca wherePessoa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Presenca whereUbs($value)
 */
class Presenca extends Model
{
    protected $table = 'presenca';

    public $timestamps = false;

    protected $fillable = [
        'atividade',
        'pessoa',
        'local',
        'ubs',
        'ip'
    ];

    protected $guarded = [];

        
}