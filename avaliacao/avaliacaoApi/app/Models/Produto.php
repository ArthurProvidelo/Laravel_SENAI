<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'tipo_materia',
        'data_fabricacao',
        'quantidade',
        'preco'
    ];

    public function produto(){
        return $this->hasMany(Produto::class);
    }
}