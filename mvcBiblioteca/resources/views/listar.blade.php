<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>
</head>

<body style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">

    <h1 style="text-align: center">Relatório de Livros</h1>

    <div style="background-color: rgba(255, 255, 255, 0.314); padding: 10px; border-radius: 20px; width: 700px; margin: 20px auto;">

        <table style="background-color: white; padding: 10px; border-radius: 20px; width: 100%; box-shadow: 0 10px 10px #182c8f66;" border="1">

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Autor</th>
                    <th>Descrição</th>
                    <th>Número de páginas</th>
                    <th>Data de Publicação</th>
                    <th>Editora</th>
                    <th>Custo</th>
                    <th>Preço</th>
                    <th>Imposto</th>
                </tr>
            </thead>

            <tbody>
                @forelse($livros as $livro)
                    <tr>
                        <td style="text-align:center;">{{ $livro->id }}</td>
                        <td style="text-align:center;">{{ $livro->nomeLivro }}</td>
                        <td style="text-align:center;">{{ $livro->nomeAutor }}</td>
                        <td style="text-align:center;">{{ $livro->descricao }}</td>
                        <td style="text-align:center;">{{ $livro->setor?->numPaginas }}</td>
                        <td style="text-align:center;">{{ $livro->detalhes?->data }}</td>
                        <td style="text-align:center;">{{ $livro->detalhes?->editora }}</td>
                        <td style="text-align:center;">{{ $livro->detalhes?->custo }}</td>
                        <td style="text-align:center;">R${{ $livro->detalhes?->preco }}</td>
                        <td style="text-align:center;">{{ $livro->detalhes?->imposto }}</td>

                        <td style="text-align:center;">
                            <a href="{{ route('livro.editar', $livro->id) }}"
                               style="background-color: darkorange; color: white; padding: 3px 6px; border-radius: 5px; text-decoration: none;">
                                Editar
                            </a>
                        </td>

                        <td style="text-align:center;">
                            <form action="{{ route('livro.deletar', $livro->id) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: red; color: white; border: none; padding: 3px 6px; border-radius: 5px;">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="10" style="text-align:center;">Nenhum livro encontrado 🔍</td>
                    </tr>
                @endforelse
            </tbody>
            
        </table>
                    <br><br>
        
        <a href="{{ route('livro.cadastro') }}"
           style=" text-align:center; background-color: darkblue; color: white; padding: 10px; border-radius: 7px; text-decoration: none;">
            Cadastrar novo Livro
        </a>

    </div>

</body>
</html>