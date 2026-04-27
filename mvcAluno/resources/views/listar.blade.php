<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de alunos</title>
</head>
<body style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
    <h1>Relatório de alunos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>ID Turma 🆔</th>
                <th>Série </th>
                <th>Número da Sala 🔢</th>
                <th>Atualizar ✍🏻</th>
                <th>Deletar 🗑️</th>
            </tr>
        </thead>
        <tbody>
            @forelse($alunos as $aluno)
                <tr>
                    <td style="text-align: center">{{ $aluno->id }}</td>
                    <td style="text-align: center">{{ $aluno->nome }}</td>
                    <td style="text-align: center">{{ $aluno->email }}</td>
                    <td style="text-align: center">{{ $aluno->turma?->id }}</td>
                    <td style="text-align: center">{{ $aluno->turma?->serie }}</td>
                    <td style="text-align: center">{{ $aluno->turma?->numSala }}</td>
                    <td style="text-align: center; text-decoration: none;" >
                        <a href="{{route('aluno.atualizar', $aluno->id)}}" style="text-decoration: none;">Atualizar</a>
                    </td>
                    <td style="text-align: center">
                        <form action="{{ route ('aluno.delete', $aluno->id)}}" method="POST" onsubmit="return confirm('Deseja realmente excluir?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background-color: red; color: white;">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhum Aluno Encontrado 🔍</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>