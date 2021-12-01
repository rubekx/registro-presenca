<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Avaliaco
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $presenca
 * @property int $pergunta
 * @property string $resposta
 * @property string $data
 * @property string $ip
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Avaliaco whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Avaliaco whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Avaliaco whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Avaliaco wherePergunta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Avaliaco wherePresenca($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Avaliaco whereResposta($value)
 */
class Avaliaco extends Model
{
    protected $table = 'avaliacoes';

    public $timestamps = false;

    protected $fillable = [
        'presenca',
        'pergunta',
        'resposta',
        'data',
        'ip'
    ];

    protected $guarded = [];

        
}