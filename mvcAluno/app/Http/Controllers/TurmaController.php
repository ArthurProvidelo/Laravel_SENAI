<?php

namespace App\Http\Controllers;
use App\Models\Turma; // em outros casos, mudar o "turma" para o nome ideal ao projeto

use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function add(Request $request){
        $request->validate([
            'numSala' => 'required|numeric|max:255',
            'serie' => 'required|string|max:255|unique:turmas,serie'
        ]);

        Turma::create([
            'numSala' => $request->numSala,
            'serie' => $request->serie
        ]);

        return redirect()->back()->with('success', 'Turma cadastrada com sucesso!');
    }

   
}