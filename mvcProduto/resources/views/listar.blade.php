<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>

<body style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">

    <h1 style="text-align: center">Relatório de Produtos</h1>

    <div style="background-color: rgba(255, 255, 255, 0.314); padding: 10px; border-radius: 20px; width: 700px; margin: 20px auto;">

        <table style="background-color: white; padding: 10px; border-radius: 20px; width: 100%; box-shadow: 0 10px 10px #182c8f66;" border="1">

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Qtd</th>
                    <th>Preço</th>
                    <th>Setor</th>
                    <th>Descrição</th>
                    <th>Tamanho</th>
                    <th>Peso</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            <tbody>
                @forelse($produtos as $produto)
                    <tr>
                        <td style="text-align:center;">{{ $produto->id }}</td>
                        <td style="text-align:center;">{{ $produto->nome }}</td>
                        <td style="text-align:center;">{{ $produto->quantidade }}</td>
                        <td style="text-align:center;">R$ {{ $produto->preco }}</td>
                        <td style="text-align:center;">{{ $produto->setor?->nomeSetor }}</td>
                        <td style="text-align:center;">{{ $produto->detalhes?->descricao }}</td>
                        <td style="text-align:center;">{{ $produto->detalhes?->tamanho }}</td>
                        <td style="text-align:center;">{{ $produto->detalhes?->peso }}</td>

                        <td style="text-align:center;">
                            <a href="{{ route('produto.editar', $produto->id) }}"
                               style="background-color: darkorange; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none;">
                                Editar
                            </a>
                        </td>

                        <td style="text-align:center;">
                            <form action="{{ route('produto.deletar', $produto->id) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: red; color: white; border: none; padding: 5px 10px; border-radius: 5px;">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="10" style="text-align:center;">Nenhum produto encontrado 🔍</td>
                    </tr>
                @endforelse
            </tbody>

        </table>

        <a href="{{ route('produto.cadastro') }}"
           style=" text-align:center; background-color: darkblue; color: white; padding: 10px; border-radius: 7px; text-decoration: none;">
            Cadastrar novo produto
        </a>

    </div>

</body>
</html>