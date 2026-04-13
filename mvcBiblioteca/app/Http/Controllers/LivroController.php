<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Editoras;
use Illuminate\Http\Request;

class LivroController extends Controller 
{
    
    // listar os livros
    public function listar(){
        $livros = Livro::with(['editora', 'detalhes'])->get();
        return view('listar', compact ('livros'));
    }

    // cadastrar
    public function cadastrar(){
        $editoras = Editoras::all();
        return view('cadastro', compact('editoras'));
    }

    // salvar o livro com detalhes
    public function add(Request $request){
        $request->validate([
            'nomeLivro' => 'required|string|max:255',
            'nomeAutor' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'numPaginas' => 'required|numeric',
            'dataPublicacao' => 'required|date',
            'nomeEditora' => 'required|string|max:255',
            'custo' => 'required|numeric',
            'preco' => 'required|numeric',
            'imposto' => 'required|numeric'
        ]);

        $livro = Livro::create([
            'nomeLivro' => $request->nomeLivro,
            'nomeAutor' => $request->nomeAutor,
            'descricao' => $request->descricao,
            'numPaginas' => $request->numPaginas,
            'dataPublicacao' => $request->dataPublicacao,
            'nomeEditora' => $request->nomeEditora,
            'custo' => $request->custo,
            'preco' => $request->preco,
            'imposto' => $request->imposto,
            'editora_id' => $request->editora_id
        ]);

        // salvar os detalhes 
        $livro->detalhes()->create([
            'descricao' => $request->descricao
        ]);

        return redirect()->back()->with('success', 'Livro cadastrado com sucesso!');

    }

    // tela de editar
    public function editar(){
        $livro = Livro::with('detalhes')->findOrFail($id);
        $editoras = Editoras::all();

        return view('editar', compact('livro', 'editoras'));
    }

    // atualizar livro
    public function atualizar(Request $request, $id){
        $request->validate([
            'nomeLivro' => 'required|string|max:255',
            'nomeAutor' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'numPaginas' => 'required|numeric',
            'dataPublicacao' => 'required|date',
            'nomeEditora' => 'required|string|max:255',
            'custo' => 'required|numeric',
            'preco' => 'required|numeric',
            'imposto' => 'required|numeric',
            'editora_id' => 'required|exists:editoras,id'
        ]);

        $livro = Livro::findOrFail($id);

        $livro->update([
            'nomeLivro' => $request->nomeLivro,
            'nomeAutor' => $request->nomeAutor,
            'descricao' => $request->descricao,
            'numPaginas' => $request->numPaginas,
            'dataPublicacao' => $request->dataPublicacao,
            'nomeEditora' => $request->nomeEditora,
            'custo' => $request->custo,
            'preco' => $request->preco,
            'imposto' => $request->imposto,
            'editora_id' => $request->editora_id
        ]);

        // atualiza ou cria detalhes
        $livro->detalhes()->updateOrCreate(
            ['livro_id' => $livro->id],
            [
                'descricao' => $request->descricao
            ]
        );

        return redirect()->route('livro.listar')
            ->with('success', 'Livro atualizado com sucesso!');
    }

    // deletar 
    public function deletar($id){
        $livro = Livro::findOrFail($id);
        $livro->delete();

        return redirect()->route('livro.listar')
            ->with('success','Livro excluído com sucesso!');
    }

}