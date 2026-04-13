<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $fillable = [
        'nomeLivro',
        'nomeAutor',
        'descricao',
        'numPaginas',
        'dataPublicacao',
        'nomeEditora',
        'custo',
        'preco',
        'imposto',
        'editora_id'
    ];

    public function editora(){
        return $this->belongsTo(Editoras::class);
    }

    public function detalhes(){
        return $this->hasOne(DetalhesLivro::class);
    }

}