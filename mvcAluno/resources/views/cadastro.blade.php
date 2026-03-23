<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}"> <!--pega a linguagem/idioma que está no arquivo .env -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulário de Cadastro</title>
    </head>
    <body>
        <h1 style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Cadastro de Usuários</h1>

        @if(session('sucess'))
            <p style="color:green">{{ session('success')}}</p>
        @endif
        <form action="{{route('Aluno.salvar')}}" method="POST" style="font-family: Arial;">
            @csrf
            <label for="nome"><b>Nome:</b></label>
            <input style="border-radius: 7px;" type="text" name="nome" id="nome" placeholder="Digite seu nome" require value="{{ old('nome') }}">
            <br><br>

            <label for="email"><b>E-mail:</b></label>
            <input style="border-radius: 7px;" type="email" name="email" id="email" placeholder="Digite seu email" required value="{{ old('email') }}" >

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