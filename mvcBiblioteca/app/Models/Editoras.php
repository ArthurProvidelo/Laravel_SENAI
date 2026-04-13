<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editoras extends Model
{
    protected $fillable = [
        'nomeEditora',
        'cnpj',
        'pais',
        'cidade'
    ];

    public function editora(){
        return $this->hasMany(Editoras::class);
    }
}