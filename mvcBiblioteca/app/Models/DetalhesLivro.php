<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalhesLivro extends Model
{
    protected $table = 'descricao';

    protected $fillable = [
        'descricao',
        'livro_id'
    ];

    // descrição pertence a um livro
    public function livro(){
        return $this->belongsTo(Livro::class);
    }
}