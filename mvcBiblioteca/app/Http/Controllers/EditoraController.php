<?php

namespace App\Http\Controllers;
use App\Models\Editoras;

use Illuminate\Http\Request;

class EditoraController extends Controller
{
    public function add(Request $request){
        $request->validate([
            'nomeEditora' => 'required|string|max:255',
            'cnpj' => 'required|numeric',
            'pais' => 'required|string|max:255',
            'cidade' => 'required|string|max:255'
        ]);

        Editoras::create([
            'nomeEditora' => $request->nomeEditora,
            'cnpj' => $request->cnpj,
            'pais' => $request->pais,
            'cidade' => $request->cidade
        ]);

        return redirect()->back()->with('success', 'Editora cadastrada com sucesso!');
    }

    public function listar(){
        $query = Editora::query();
        $editoras = $query->get(); // mesma coisa que um SELECT * FROM tabela
        return view('listarEditora', compact('editoras'));
    }
   
}