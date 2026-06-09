<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produto;

class ProducaoApiController extends Controller
{
    public function listarApi(Request $request){
       try{
        $query = Produto::query();

        // filtro por nome
        if($request->filled('nome')){
            $query->where('nome', 'like', '%'.$request->nome .'%');
        }

        $produtos = $query->get();

        return response()->json([
            'success' => true,
            'data' => $produtos
        ], 200);

       } catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => "Erro interno do servidor",
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function addApi(Request $request){
        try{
            $request->validate([
                'nome' => 'required|string|max:255',
                'tipo_materia' => 'required|string|max:255',
                'data_fabricacao' => 'required|date|max:255',
                'quantidade' => 'required|numeric|max:255',
                'preco' => 'required|numeric|max:255'
            ]);

            $produto = Produto::create([
                'nome' => $request->nome,
                'tipo_materia' => $request->tipo_materia,
                'data_fabricacao' => $request->data_fabricacao,
                'quantidade' => $request->quantidade,
                'preco' => $request->preco
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Produto Criado',
                'produto' => $produto
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e){
            return response()->json([
                'success' => false,
                'message' =>'Erro de validação',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function updateApi(Request $request, $id){
        try{
            $request->validate([
                'nome' => 'required|string|max:255',
                'tipo_materia' => 'required|string|max:255',
                'data_fabricacao' => 'required|date|max:255',
                'quantidade' => 'required|numeric|max:255',
                'preco' => 'required|numeric|max:255'
            ]);

            $produto = Produto::findOrFail($id); //busca produto para ser atualizado

            $produto->nome = $request->nome;
            $produto->tipo_materia = $request->tipo_materia;
            $produto->data_fabricacao = $request->data_fabricacao;
            $produto->quantidade = $request->quantidade;
            $produto->preco = $request->preco;


            $produto->save(); // Salvando no banco de dados(fazendo update)

            return response()->json([
                'message' => "Produto Atualizado!",
                'produto' => $produto
            ], 200);
        } catch(\Illuminate\Validation\ValidationException $e){
            return response()->json([
                'success' => false,
                'message' => 'Erro na validação',
                'errors' => $e->errors()
            ], 422);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return response()->json([
                'success' => false,
                'message' => 'Produto não encontrado'
            ], 404);
        } catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => "Erro interno do servidor",
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function deletarApi($id){
        try{
            $produto = Produto::findOrFail($id); // Buscar o produto pelo ID
            $produto->delete(); // Deletar o produto do banco de dados

            return response()->json([
                'message' => "Produto Deletado com Sucesso!",
                'produto' => $produto
            ], 200);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return response()->json([
                'success' => false,
                'message' => 'Produto não encontrado'
            ], 404);
        } catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => "Erro interno do servidor",
                'errors' => $e->getMessage()
            ], 500);
        }
    }
}