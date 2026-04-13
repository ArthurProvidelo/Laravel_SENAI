<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\EditoraController;

Route::get('/', function () {
    return view('welcome');
});

// -------------------------------------------------------------------------------------------------
// rotas de livros 

Route::get('/livro/listar', [LivroController::class, 'listar'])->name('livro.listar');

Route::get('/livro/cadastrar', [LivroController::class, 'cadastrar'])->name('livro.cadastro');

Route::post('/livro/salvar', [LivroController::class, 'add'])->name('livro.salvar');

Route::get('/livro/{id}/atualizar', [LivroController::class, 'atualizar'])->name('livro.atualizar');

Route::put('/livro/{id}/update', [LivroController::class, 'update'])->name('livro.update');


Route::delete('/livro/{id}/deletar', [LivroController::class, 'deletar'])->name('livro.deletar');
    
Route::get('/livro/{id}/editar', [LivroController::class, 'editar'])->name('livro.editar');

// ------------------------------------------------------------------------------------------------
// rotas editoras

Route::get('/editora/cadastrar', function(){
    return view('cadastrarEditora');
})->name('editora.cadastro');

Route::post('/editora/salvar', [EditoraController::class, 'add'])->name('editora.salvar');

Route::get('/editora/listar', [EditoraController::class, 'listar'])->name('editora.listar');