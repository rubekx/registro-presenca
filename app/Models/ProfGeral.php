<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

/**
 * Class ProfGeral
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $pessoa
 * @property string $cbo
 * @property int $municipio
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProfGeral whereCbo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProfGeral whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProfGeral whereMunicipio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProfGeral wherePessoa($value)
 */
class ProfGeral extends Model
{
    protected $table = 'prof_geral';

    public $timestamps = false;

    protected $fillable = [
        'pessoa',
        'cbo',
        'municipio',
        'tipo_participante'
    ];

    protected $guarded = [];

    public function encryptId()
    {
        return Crypt::encrypt($this->id);
    }

    public function decryptId()
    {
        $encryptId = $this->encryptId();
        return Crypt::decrypt($encryptId);
    }
}
