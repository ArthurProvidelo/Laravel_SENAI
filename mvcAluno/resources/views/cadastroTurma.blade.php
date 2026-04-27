<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}"> <!--pega a linguagem/idioma que está no arquivo .env -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulário de Cadastro</title>
    </head>
    <body style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
        <h1>Cadastro de Turmas</h1>

        @if(session('success'))
            <p style="color:green">{{ session('success')}}</p>
        @endif
        <form action="{{route('turma.salvar')}}" method="POST" style="font-family: Arial;">
            @csrf
            <label for="nome"><b>Número da Sala:</b></label>
            <input style="border-radius: 7px;" type="number" name="numSala" id="numSala" placeholder="Digite o número da sua sala" require value="{{ old('sumSala') }}">
            <br><br>

            <label for="email"><b>Série:</b></label>
            <input style="border-radius: 7px;" type="TEXT" name="serie" id="serie" placeholder="Digite sua série" required value="{{ old('serie') }}">
            <br><br>

            <button type="submit" style="border-radius: 7px; background-color:darkblue; color: white;" >Cadastrar</button>

        </form>

        @if($errors->any())
            <div style="color:red;">
                <ul>
                    @foreach ($errors->all as $erro)
                        <li>{{ $erro }}</li>                    
                    @endforeach
                </ul>
            </div>
        @endif
    </body>
</html>