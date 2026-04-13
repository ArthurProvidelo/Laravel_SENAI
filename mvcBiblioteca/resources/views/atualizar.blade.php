<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Livro </title>
</head>
<body style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
    <h1>Atualizar Livro 📦✍🏻</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('editora.update', $editoras->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="nomeEditora" value="{{ old('nomeEditora', $editoras->nomeEditora)}}" required>

        <input type="number" name="cnpj" value="{{ old('cnpj', $editoras->cnpj)}}" required>

        <input type="text" name="pais" value="{{ old('pais', $editoras->pais)}}" required>

        <input type="cidade" name="cidade" value="{{ old('cidade', $editoras->cidade)}}" required>

        <button type="submit" style="border-radius: 7px; background-color:darkblue; color: white;">Atualizar ✍🏻</button>
        <br><br>

        <button style="border-radius: 7px; background-color:blue; ">
            <a href="{{route('livro.cadastro')}}" style="text-decoration: none; color: white">Cadastrar novo Livro</a>
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