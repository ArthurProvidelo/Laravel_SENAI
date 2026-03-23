<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

Route::get('/', function () {
    return view('welcome');
});

//GET - listar usuários cadastrados
Route::get('/aluno/listar', [AlunoController::class, 'listar'])->name('Aluno.listar');

Route::get('/aluno/cadastrar', function(){
    return view('cadastro');
})->name('Aluno.cadastro');

// Uma rota do tipo POST - enviar os dados para cadastrar os usuários
Route::post('/aluno/salvar', [AlunoController::class, 'add'])->name('Aluno.salvar');