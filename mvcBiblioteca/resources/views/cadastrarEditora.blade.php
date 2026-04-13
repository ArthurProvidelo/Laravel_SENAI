<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Editora</title>
</head>
<body style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
    <h2 style="display: flex; justify-content: center;">Cadastro de Editora</h2>
    
    <button>Listar Editora</button>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <div style="background-color: gray; border-radius: 10px; display: flex; justify-content: center; width: 100%; max-width: 400px; height: auto; margin: 50px auto; padding: 40px; background-color: white; padding: 10px; border-radius: 20px; width: 400px; box-shadow: 0 10px 10px #182c8f66 ;">
        <form action="{{route('editora.salvar')}}" method="POST">
            @csrf
            
            <label for="nomeEditora">Nome:</label>
            <input type="text" name="nomeEditora" id="nomeEditora" placeholder="Digite o nome da editora" require value="{{ old('nomeEditora') }}" >
            <br><br>

            <label for="cnpj">CNPJ:</label>
            <input type="number" name="cnpj" id="cnpj" placeholder="Digite o CNPJ" require value="{{ old('cnpj') }}" >
            <br><br>

            <label for="paisEditora">País:</label>
            <input type="text" name="paisEditora" id="paisEditora" placeholder="Digite o país da editora" require value="{{ old('paisEditora') }}" >
            <br><br>

            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade" id="cidade" placeholder="Digite o nome da editora" require value="{{ old('cidade') }}" >
            <br><br>

            <button type="submit" style="border-radius: 7px; background-color:darkblue; color: white; display: block; margin: 15px auto;">Cadastrar</button>

        </form>
    </div>

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