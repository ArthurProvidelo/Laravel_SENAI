<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SetorController;

Route::get('/', function () {
    return view('welcome');
});

// rotas produtos

Route::get('/produto/listar', [ProdutoController::class, 'listar'])->name('produto.listar');

Route::get('/produto/cadastrar', [ProdutoController::class, 'cadastrar'])->name('produto.cadastro');

Route::post('/produto/salvar', [ProdutoController::class, 'add'])->name('produto.salvar');

Route::put('/produto/{id}/update', [ProdutoController::class, 'atualizar'])->name('produto.update');

// Route::put('/produto/{id}/update', [ProdutoController::class, 'update'])->name('produto.update');

Route::get('/produto/{id}/editar', [ProdutoController::class, 'editar'])->name('produto.editar');

Route::delete('/produto/{id}/deletar', [ProdutoController::class, 'deletar'])->name('produto.deletar');
    


// rotas setores

Route::get('/setor/cadastrar', function(){
    return view('cadastrarSetor');
})->name('setor.cadastro');

Route::post('/setor/salvar', [SetorController::class, 'add'])->name('setor.salvar');

Route::get('/setor/listar', [SetorController::class, 'listar'])->name('setor.listar');