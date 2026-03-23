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
                <th>Atualizar ✍🏻</th>
                <th>Deletar 🗑️</th>
            </tr>
        </thead>
        <tbody>
            @forelse($alunos as $aluno)
                <tr>
                    <td>{{ $aluno->id }}</td>
                    <td>{{ $aluno->nome }}</td>
                    <td>{{ $aluno->email }}</td>
                    <td>Faremos na próxima Aula</td>
                    <td>Faremos na próxima aula</td>
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