<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estado
 */
class Estado extends Model
{
    protected $table = 'estado';

    public $timestamps = false;

    protected $fillable = [
        'descricao',
        'sigla'
    ];

    protected $guarded = [];

    public function municipios(){
        return $this->hasMany('App\Models\Municipio', 'uf');
    }

}