<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;


Route::get('/', function () {
    return view('welcome');
});

//GET - listar usuários cadastrados
Route::get('/produto/listar', [ProdutoController::class, 'listar'])->name('Produto.listar');

Route::get('/produto/cadastrar', function(){
    return view('cadastro');
})->name('Produto.cadastro');

Route::post('/produto/salvar', [ProdutoController::class, 'add'])->name('Produto.salvar');

Route::get('/produto/{id}/atualizar', [ProdutoController::class, 'atualizar'])->name('produto.atualizar');

Route::put('/produto/{id}/update',[ProdutoController::class, 'update'])->name('produto.update');  