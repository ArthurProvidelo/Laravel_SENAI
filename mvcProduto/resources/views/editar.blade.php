<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto ✍🏻</title>
</head>

<body style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">

    <h1 style="text-align: center;">Editar Produto ✍🏻</h1>

    @if(session('success'))
        <p style="color:green; text-align:center;">
            {{ session('success') }}
        </p>
    @endif

    <div style="background-color: white; border-radius: 20px; width: 400px; margin: 40px auto; padding: 20px; box-shadow: 0 10px 10px #182c8f66;">

        <form action="{{ route('produto.atualizar', $produto->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- PRODUTO -->
            <label><b>Produto:</b></label>
            <input style="width: 50%; padding: 10px; border-radius: 20px; border: none; background-color: #f5f5f5;"
            type="text" name="nome" value="{{ old('nome', $produto->nome) }}" required>
            <br><br>

            <label><b>Preço:</b></label>
            <input style="width: 50%; padding: 10px; border-radius: 20px; border: none; background-color: #f5f5f5;"
            type="number" name="preco" value="{{ old('preco', $produto->preco) }}" required>
            <br><br>

            <label><b>Quantidade:</b></label>
            <input style="width: 50%; padding: 10px; border-radius: 20px; border: none; background-color: #f5f5f5;"
            type="number" name="quantidade" value="{{ old('quantidade', $produto->quantidade) }}" required>
            <br><br>

            <label><b>Setor:</b></label>
            <select name="setor_id" style="width: 50%; padding: 10px; border-radius: 20px; border: none; background-color: #f5f5f5;" required>
                @foreach ($setores as $setor)
                    <option value="{{ $setor->id }}" 
                        {{ $produto->setor_id == $setor->id ? 'selected' : '' }}>
                        {{ $setor->nomeSetor }}
                    </option>
                @endforeach
            </select>

            <br><br>
            <hr>
            <h3 style="text-align:center;">Detalhes do Produto</h3>
            <hr>

            <label><b>Descrição:</b></label>
            <input style="width: 50%; padding: 10px; border-radius: 20px; border: none; background-color: #f5f5f5;"
            type="text" name="descricao" 
            value="{{ old('descricao', $produto->detalhes?->descricao) }}" required>
            <br><br>

            <label><b>Tamanho:</b></label>
            <input style="width: 50%; padding: 10px; border-radius: 20px; border: none; background-color: #f5f5f5;"
            type="text" name="tamanho" 
            value="{{ old('tamanho', $produto->detalhes?->tamanho) }}" required>
            <br><br>

            <label><b>Peso:</b></label>
            <input style="width: 50%; padding: 10px; border-radius: 20px; border: none; background-color: #f5f5f5;"
            type="number" step="0.01" name="peso" 
            value="{{ old('peso', $produto->detalhes?->peso) }}" required>
            <br><br>

            <button type="submit" style="background-color: green; color: white; padding: 10px; border: none; border-radius: 7px; display: block; margin: 10px auto;">
                Atualizar
            </button>

            <a href="{{ route('produto.listar') }}"
               style="display: block; text-align: center; margin-top: 10px; text-decoration: none; color: black;">
                Voltar
            </a>

        </form>
    </div>

    @if($errors->any())
        <div style="color:red; text-align:center;">
            <ul style="list-style:none;">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</body>
</html>