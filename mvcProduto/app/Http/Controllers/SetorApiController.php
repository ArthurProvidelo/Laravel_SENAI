<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Setores;

use Illuminate\Http\Request;

class SetorApiController extends Controller
{
    public function listarApi(){
        $setores = Setores::all();
        return response()->json($setores);
    }

    public function addApi(Request $request){
        $request->validate([
            'nomeSetor' => 'required|string|max:255',
            'numCorredor' => 'required|numeric|max:255'
        ]);

        Setores::create([
            'nomeSetor' => $request->nomeSetor,
            'numCorredor' => $request->numCorredor
        ]);

        return response()->json([
            'message' => 'Setor Criado',
            'setor' => 'setor'
        ], 200);

    }

    public function updateApi(Request $request, $id){
        $request->validate([
            'nomeSetor' => 'required|string|max:255',
            'numCorredor' => 'required|numeric|max:255'
        ]);

        $setor = Setores::findOrFail($id); //busca setor para ser atualizado

        $setor->nomeSetor = $request->nome;
        $setor->numCorredor = $request->numCorredor;

        $setor->save(); // salvando no banco de dados

        return response()->json([
            'message' => "Setor Atualizado",
            'setor' => $setor
        ], 200);
    }

    public function deletarApi($id){
        $setor = Setores::findOrFail($id);
        $setor->delete();

        return response()->json([
            'message' => "Setor Deletado co Sucesso!",
            'setor' => $setor
        ], 200);
    }
}