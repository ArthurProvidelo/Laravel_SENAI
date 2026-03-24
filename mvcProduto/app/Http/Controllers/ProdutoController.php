<?php

namespace App\Http\Controllers;
use App\Models\Produto; // em outros casos, mudar para o nome ideal ao projeto

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function listar(){
        $query = Produto::query();
        $produtos = $query->get(); // mesma coisa que um SELECT * FROM tabela
        return view('listar', compact('produtos'));
    }

    public function add(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|int',
            'preco' => 'required|numeric'
        ]);

        Produto::create([
            'nome'=> $request->nome,
            'quantidade'=> $request->quantidade,
            'preco'=> $request->preco,

        ]);

        return redirect()->back()->with('success', 'Produto cadastrado com sucesso!');

    }

    public function atualizar($id){
        $produtos = Produto::findOrFail($id); //->busca o produto pelo id
        return view('atualizar', compact('produtos')); 
        // mesma coisa que: SELECT * FROM alunos WHERE id = $id
    }
    
    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|int',
            'preco' => 'required|numeric'
        ]);

        $produtos = Produto::findOrFail($id);

        $produtos->nome = $request->nome;
        $produtos->quantidade = $request->quantidade;
        $produtos->preco = $request->preco;

        $produtos->save();
        return redirect()->back()->with('seccess', 'Produto atualizado com sucesso!');
    }

}