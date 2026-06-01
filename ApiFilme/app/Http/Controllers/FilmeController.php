<?php

namespace App\Http\Controllers;
use App\Models\Filme;
use App\Models\Autor;


use Illuminate\Http\Request;

class FilmeController extends Controller
{
    public function listar(Request $request)
    {
        try {
            $query = Filme::query();
            if ($request->filled('titulo')) {
                $query->where('titulo', 'like', '%' . $request->titulo . '%');
            }

            if ($request->filled('dataLancamento')) {
                $query->whereDate('dataLancamento', $request->dataLancamento);
            }

            $filmes = $query->get();
            
            return view('listarFilme', compact('filmes'));

        } catch (\Exception $e) {
            return response()->json([
                'filmes' => collect(),
                'erro' => 'Erro interno do servidor'
            ], 500);

        }
    }
}