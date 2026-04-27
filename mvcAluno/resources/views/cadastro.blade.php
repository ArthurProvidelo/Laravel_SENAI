<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}"> <!--pega a linguagem/idioma que está no arquivo .env -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulário de Cadastro</title>
    </head>
    <body style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
        <h1>Cadastro de Alunos</h1>

        @if(session('success'))
            <p style="color:green">{{ session('success')}}</p>
        @endif
        <form action="{{route('Aluno.salvar')}}" method="POST" style="font-family: Arial;">
            @csrf
            <label for="nome"><b>Nome:</b></label>
            <input style="border-radius: 7px;" type="text" name="nome" id="nome" placeholder="Digite seu nome" require value="{{ old('nome') }}">
            <br><br>

            <label for="email"><b>E-mail:</b></label>
            <input style="border-radius: 7px;" type="email" name="email" id="email" placeholder="Digite seu email" required value="{{ old('email') }}">
            <br><br>

            <label for="email"><b>Id Turma:</b></label>
            
            <select name="turma_id" id="turma_id">
                @foreach ($turmas as $turma)
                <option value="{{$turma->id}}">{{$turma->serie}}</option>
                @endforeach
            </select>

            <h3>Informações Pessoais</h3>

            <label for="telefone"><b>Telefone:</b></label>
            <input style="border-radius: 7px;" type="number" name="telefone" id="telefone" placeholder="Digite seu telefone" required value="{{ old('telefone') }}">
            <br><br>

            <label for="Data de Nascimento:"><b>Data de Nascimento:</b></label>
            <input style="border-radius: 7px;" type="date" name="data_nascimento" id="data_nascimento" placeholder="Digite sua data de nascimento:" required value="{{ old('data_nascimento') }}">
            <br><br>

            <label for="endereco"><b>Endereço:</b></label>
            <input style="border-radius: 7px;" type="text" name="endereco" id="endereco" placeholder="Digite seu endereco" required value="{{ old('endereco') }}">
            <br><br>

            <label for="idade"><b>Idade:</b></label>
            <input style="border-radius: 7px;" type="number" name="idade" id="idade" placeholder="Digite seu idade" required value="{{ old('idade') }}">
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