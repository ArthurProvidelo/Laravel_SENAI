<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProducaoApiController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('produtos',[ProducaoApiController::class, 'listarApi']);
Route::post('produto/add',[ProducaoApiController::class, 'addApi']);
Route::put('produto/atualizar/{id}',[ProducaoApiController::class, 'updateApi']);
Route::delete('/produto/deletar/{id}', [ProducaoApiController::class, 'deletarApi']);