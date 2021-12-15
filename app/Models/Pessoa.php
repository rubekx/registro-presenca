<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

/**
 * Class Pessoa
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $nome
 * @property string $sobrenome
 * @property string $cpf
 * @property string $email
 * @property string $celular
 * @property string $sexo
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pessoa whereCelular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pessoa whereCpf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pessoa whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pessoa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pessoa whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pessoa whereSexo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Pessoa whereSobrenome($value)
 */
class Pessoa extends Model
{
    protected $table = 'pessoa';

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'sobrenome',
        'cpf',
        'email',
        'celular',
        'sexo'
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
