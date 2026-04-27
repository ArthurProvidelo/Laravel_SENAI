<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformacoesPessoais extends Model
{
    protected $table = 'informacoes';

    protected $fillable = [
        'telefone',
        'data_nascimento',
        'endereco',
        'idade',
        'aluno_id'
    ];

    // Detalhe pertence a um aluno
    public function aluno(){
        return $this->belongsTo(Aluno::class);
    }
}