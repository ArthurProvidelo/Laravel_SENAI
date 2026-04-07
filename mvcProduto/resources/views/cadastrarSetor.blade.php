<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Setor 💻</title>
</head>
    <body style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
        <h1 style="display: flex; justify-content: center;">Cadastrar Setor</h1>

        @if(session('success'))
                <p style="color:green">{{ session('success')}}</p>
        @endif

    <div style="background-color: gray; border-radius: 10px; display: flex; justify-content: center; width: 100%; max-width: 400px; height: auto; margin: 50px auto; padding: 40px; background-color: white; padding: 10px; border-radius: 20px; width: 400px; box-shadow: 0 10px 10px #182c8f66 ;">
        <form action="{{route('Setor.salvar')}}" method="POST">
            @csrf

            <label for="nomeSetor"><b>Nome</b></label>
            <input style="border-radius: 7px;" type="text" name="nomeSetor" id="nomeSetor" placeholder="Digite o nome do setor" require value="{{ old('nomeSetor') }}">
            <br><br>

            <label for="preco"><b>Número do Corredor</b></label>
            <input style="border-radius: 7px;" type="number" name="numCorredor" id="numCorredor" placeholder="Digite o número do corredor" require value="{{ old('numSetor') }}">
            <br><br>

            <button type="submit" style="border-radius: 7px; background-color:darkblue; color: white; display: block; margin: 15px auto;" >Cadastrar</button>
          
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