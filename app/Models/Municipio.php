<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Class Municipio
 */
class Municipio extends Model
{
    protected $table = 'municipio';

    protected $primaryKey = 'ibge';

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'uf'
    ];

    protected $guarded = [];

    public function estado(){
        return $this->belongsTo('App\Models\Estado', 'uf');
    }
}