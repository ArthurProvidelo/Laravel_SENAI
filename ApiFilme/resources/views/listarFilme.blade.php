<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Filmes</title>
</head>
    <body>
        <h1>Controle de Filmes</h1>

        <form method="GET" action="{{ route('filme.listar') }}" class="form-busca-setor">
            <div class="search-box">
                <i class='bx bx-search'></i>
                <input type="text" name="titulo" placeholder="Pesquisar título..." value="{{ request('titulo') }}">
            </div>

            <div class="search-box">
                <input type="date" name="dataLancamento" value="{{ request('dataLancamento') }}">
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
                    <th>TITULO</th>
                    <th>DATA LANÇAMENTO</th>
                    <th>SINOPSE</th>
                    <th>GENERO</th>
                    <th>ORÇAMENTO</th>
                    <th>AUTOR ID</th>
                    <th>NOME</th>
                    <th>DATA NASCIMENTO</th>
                    <th>EMAIL</th>
                    <th>TELEFONE</th>
                </tr>
            </thead>
            <tbody>
                @forelse($filmes as $filme)
                    <tr>
                        <td>{{ $filme->id }}</td>
                        <td>{{ $filme->titulo }}</td>
                        <td>{{ $filme->dataLancamento }}</td>
                        <td>{{ $filme->sinopse }}</td>
                        <td>{{ $filme->genero }}</td>
                        <td>{{ $filme->orcamento }}</td>
                        <td>{{ $filme->autor->id ?? 'N/A' }}</td>
                        <td>{{ $filme->autor->nome ?? 'N/A' }}</td>
                        <td>{{ $filme->autor->dataNascimento ?? 'N/A' }}</td>
                        <td>{{ $filme->autor->email ?? 'N/A' }}</td>
                        <td>{{ $filme->autor->telefone ?? 'N/A' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11">Nenhum Filme encontrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </body>
</html>