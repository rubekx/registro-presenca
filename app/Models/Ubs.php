<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ub
 *
 * @mixin \Eloquent
 * @property int $cnes
 * @property string $nome
 * @property int $endereco
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ubs whereCnes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ubs whereEndereco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ubs whereNome($value)
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