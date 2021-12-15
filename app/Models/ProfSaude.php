<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProfSaude
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $cns
 * @property int $pessoa
 * @property string $equipe
 * @property int $ubs
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProfSaude whereCns($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProfSaude whereEquipe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProfSaude whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProfSaude wherePessoa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProfSaude whereUbs($value)
 */
class ProfSaude extends Model
{
    protected $table = 'prof_saude';

    public $timestamps = false;

    protected $fillable = [
        'cns',
        'pessoa',
        'equipe',
        'ubs'
    ];

    protected $guarded = [];

        
}