<?php

namespace App\Http\Controllers;
use App\Models\Aluno; // em outros casos, mudar o "Aluno" para o nome ideal ao projeto
use App\Models\Turma;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function listar(){
        // $query = Aluno::query(); --> ANTES
        // $alunos = $query->get(); // mesma coisa que um SELECT * FROM alunos

        $alunos = Aluno::with('turma')->get(); //with é = 'com'
        // SELECT * FROM alunos JOIN turmas ON turmas_id = turmas.id;
        // @dd($alunos->toArray()); --> para o código para ver se a informação chegou até aqui
        return view('listar', compact('alunos'));
    }

    public function add(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:alunos,email',// o email tem que ser único a tabela ALUNOS, na coluna email
            'turma_id' => 'nullable|exists:turmas,id' // para poder ser nulo ou existir na tabela turmas
        ]);

        Aluno::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'turma_id' => $request->turma_id
        ]);

        // para salvar os detalhes
        $aluno->informacoes()->create([
            'telefone' => $request->telefone,
            'data_nascimento' => $request->data_nascimento,
            'endereco' => $request->endereco,
            'idade' => $request->idade
        ]);

        return redirect()->back()->with('success', 'Aluno cadastrado com sucesso!');
    }

    public function atualizar($id){
        $aluno = Aluno::findOrFail($id); //->busca o aluno pelo id
        return view('atualizar', compact('aluno')); 
        // mesma coisa que: SELECT * FROM alunos WHERE id = $id
    }

    public function cadastro(){
        $turmas = Turma::get();
        return view('cadastro', compact('turmas'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => "required|string|max:255|unique:alunos,email, $id"
        ]);

        $aluno = Aluno::findOrFail($id); //buscando o aluno para ser atualizado

        $aluno->nome = $request->nome; //atualizando o campo nome
        $aluno->email = $request->email; //atualizando o campo email

        $aluno->save(); //salvando no banco de dados (fazendo update)
        return redirect()->back()->with('success', 'Aluno atualizado com sucesso');
    }


    public function deletar($id){
        $aluno = Aluno::findOrFail($id); //buscar o aluno para depois deleta-lo
        $aluno->delete();

        return redirect()->route('Aluno.listar')->with('success','Aluno excluído com sucesso!');
    }

}