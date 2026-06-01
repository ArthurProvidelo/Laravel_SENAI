<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Filmes</title>
</head>
    <body>

            <form method="GET" action="{{ route('autor.listar') }}" class="form-busca-setor">
                <div class="search-box">
                    <i class='bx bx-search'></i>
                    <input type="text" name="nome" placeholder="Pesquisar nome..." value="{{ request('nome') }}">
                </div>
                <div class="search-box">
                    <i class='bx bx-search'></i>
                    <input type="number" name="telefone" placeholder="Pesquisar telefone..." value="{{ request('telefone') }}">
                </div>
                    {{-- Botão de que vai filtrar  --}}
                <button type="submit">
                    Buscar
                </button>
            </form>

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>DATA DE NASCIMENTO</th>
                    <th>E-MAIL</th>
                    <th>TELEFONE</th>
                </tr>
            </thead>

            <tbody>
                @forelse($autores as $autor)
                    <tr>
                        <td>{{ $autor->id }}</td>
                        <td>{{ $autor->nome }}</td>
                        <td>{{ $autor->dataNascimento }}</td>
                        <td>{{ $autor->email }}</td>
                        <td>{{ $autor->telefone }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Nenhum autor encontrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </body>
</html>