<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Aluno 🙋🎲 </title>
</head>
<body style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
    <h1>Atualizar Aluno 🙋</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('aluno.update', $aluno->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="nome" value="{{ old('nome', $aluno->nome)}}" required>

        <input type="email" name="email" value="{{ old('email', $aluno->email)}}" required>
        <button type="submit" style="border-radius: 7px; background-color:darkblue; color: white;">Atualizar ✍🏻</button>
        <br><br>

        <button style="border-radius: 7px; background-color:blue; ">
            <a href="{{route('Aluno.cadastro')}}" style="text-decoration: none; color: white">Cadastrar</a>
        </button>
    </form>

    @if($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</body>
</html>