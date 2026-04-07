<?php

namespace App\Http\Controllers;
use App\Models\Setores; // em outros casos, mudar o "Setor" para o nome ideal ao projeto

use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function add(Request $request){
        $request->validate([
            'nomeSetor' => 'required|string|max:255',
            'numCorredor' => 'required|numeric|max:255'
        ]);

        Setores::create([
            'nomeSetor' => $request->nomeSetor,
            'numCorredor' => $request->numCorredor
        ]);

        return redirect()->back()->with('success', 'Setor cadastrado com sucesso!');
    }

    public function listar(){
        $query = Setores::query();
        $setores = $query->get(); // mesma coisa que um SELECT * FROM tabela
        return view('listarSetor', compact('setores'));
    }
   
}