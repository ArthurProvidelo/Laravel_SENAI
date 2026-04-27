<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TurmaController;

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

//Tela de atualizar
Route::get('/aluno/{id}/atualizar', [AlunoController::class, 'atualizar'])->name('aluno.atualizar');

Route::put('/aluno/{id}/update',[AlunoController::class, 'update'])->name('aluno.update');  

Route::delete('/aluno/{id}',[AlunoController::class, 'deletar'])->name('aluno.delete'); 

//Rota da Turma

Route::get('/turma/cadastrar', function(){
    return view('cadastroTurma');
})->name('turma.cadastro');

Route::post('/turma/salvar', [TurmaController::class, 'add'])->name('turma.salvar');

Route::get('/aluno/cadastrar',[AlunoController::class, 'cadastro']
)->name('aluno.cadastro');