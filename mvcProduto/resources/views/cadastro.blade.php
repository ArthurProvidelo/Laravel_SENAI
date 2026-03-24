<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto 💻</title>
</head>
    <body style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
        <h1 style="display: flex; justify-content: center;">Cadastro de Produtos</h1>

        @if(session('sucess'))
                <p style="color:green">{{ session('success')}}</p>
        @endif

    <div style="background-color: gray; border-radius: 10px; display: flex; justify-content: center; width: 100%; max-width: 300px; height: auto; margin: 50px auto; padding: 40px; background-color: white; padding: 10px; border-radius: 20px; width: 400px; box-shadow: 0 10px 10px #182c8f66 ;">
        <form action="{{route('Produto.salvar')}}" method="POST">
            @csrf

            <label for="nome"><b>Produto:</b></label>
            <input style="border-radius: 7px;" type="text" name="nome" id="nome" placeholder="Digite o nome do produto" require value="{{ old('nome') }}">
            <br><br>

            <label for="preco"><b>Preço:</b></label>
            <input style="border-radius: 7px;" type="number" name="preco" id="preco" placeholder="Digite o preço" require value="{{ old('preco') }}">
            <br><br>

            <label for="qtd"><b>Quantidade:</b></label>
            <input style="border-radius: 7px;" type="number" name="quantidade" id="quantidade" placeholder="Digite a quantidade" require value="{{ old('qtd') }}">
            <br><br>

            <button type="submit" style="border-radius: 7px; background-color:darkblue; color: white; display: block; margin: 15px auto;"" >Cadastrar</button>

            <button style="border-radius: 7px; display: block; margin: 15px auto;"">
                <a href="{{route('Produto.listar')}}" style="text-decoration: none; color: black">Listar produtos</a>
            </button>

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