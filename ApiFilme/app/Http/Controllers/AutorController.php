<?php

namespace App\Http\Controllers;
use App\Models\Filme;
use App\Models\Autor;

use Illuminate\Http\Request;

class AutorController extends Controller
{
     public function listar(Request $request){
        try{
        $query = Autor::query();

        if($request->filled('nome')){
            $query->where('nome', 'like', '%'.$request->nome.'%');
        }

        if($request->filled('telefone')){
            $query->where('telefone', 'like', '%'.$request->telefone.'%');
        }

        $autores = $query->get();

        return view('listarAutor', compact('autores'));

       } catch(\Exception $e){
            return response()->json([
                'setores' => collect(),
                'erro' => 'Erro interno do servidor'
            ], 500);
        }
    }

}