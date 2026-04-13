<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editoras </title>
</head>
<body style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
    <h1 style="text-align: center">Lista de Editoras</h1>
    <div style=" background-color: rgba(255, 255, 255, 0.314); padding: 10px; border-radius: 20px; width: 400px; margin: 20px auto;">
        <table style="background-color: white; padding: 10px; border-radius: 20px; width: 400px; box-shadow: 0 10px 10px #182c8f66 ;" border="1">
            <thead>
                <tr>
                    <th style="border-radius: 5px; background-color: lightgray">Id</th>
                    <th style="border-radius: 5px; background-color: lightgray">Nome</th>
                    <th style="border-radius: 5px; background-color: lightgray">CNPJ</th>
                    <th style="border-radius: 5px; background-color: lightgray">País</th>
                    <th style="border-radius: 5px; background-color: lightgray">Cidade</th>
                </tr>
            </thead>
            <tbody style="background-color: white;">
                @forelse($editoras as $editora)
                    <tr>
                        <td style="border-radius: 5px; text-align: center;">{{ $editora->id }}</td>
                        <td style="border-radius: 5px; text-align: center;">{{ $editora->nomeEditora }}</td>
                        <td style="border-radius: 5px; text-align: center;">{{ $editora->cnpj }}</td>
                        <td style="border-radius: 5px; text-align: center;">{{ $editora->pais }}</td>
                        <td style="border-radius: 5px; text-align: center;">{{ $editora->cidade }}</td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="3">Nenhuma Editora encontrada 🔍</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <br>
            <button style="border-radius: 7px; background-color: blue; display: block; margin: 15px auto;">
            <a href="{{route('editora.cadastro')}}" style="text-decoration: none; color: white">Cadastrar nova Editora</a>
        </button>
    </div>
</body>
</html>