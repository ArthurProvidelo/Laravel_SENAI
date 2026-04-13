<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livros</title>
</head>

<body style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">

    <h2 style="display: flex; justify-content: center;">Cadastro de Livros</h2>

    @if(session('success'))
        <p style="color:green; text-align:center;">
            {{ session('success') }}
        </p>
    @endif

    <!-- Link correto ao invés de botão -->
    <a href="{{ route('livro.listar') }}" 
       style="display:block; text-align:center; margin-bottom:20px; text-decoration:none;">
        Listar Livros
    </a>

    <div style="background-color: white; border-radius: 20px; display: flex; justify-content: center; width: 100%; max-width: 400px; margin: 50px auto; padding: 20px; box-shadow: 0 10px 10px #182c8f66;">

        <form action="{{route('livro.salvar')}}" method="POST" style="width:100%;">
            @csrf

            <label>Nome:</label>
            <input style="width:100%; padding:10px; border-radius:20px; border:none; background:#f5f5f5;"
                   type="text" name="nomeLivro" placeholder="Digite o nome do livro" required value="{{ old('nomeLivro') }}">
            <br><br>

            <label>Autor:</label>
            <input style="width:100%; padding:10px; border-radius:20px; border:none; background:#f5f5f5;"
                   type="text" name="nomeAutor" placeholder="Digite o nome do autor" required value="{{ old('nomeAutor') }}">
            <br><br>

            <label>Descrição:</label>
            <input style="width:100%; padding:10px; border-radius:20px; border:none; background:#f5f5f5;"
                   type="text" name="descricao" placeholder="Descreva o livro" required value="{{ old('descricao') }}">
            <br><br>

            <label>Número de páginas:</label>
            <input style="width:100%; padding:10px; border-radius:20px; border:none; background:#f5f5f5;"
                   type="number" name="numPaginas" placeholder="Digite o número de páginas" required value="{{ old('numPaginas') }}">
            <br><br>

            <label>Data de Publicação:</label>
            <input style="width:100%; padding:10px; border-radius:20px; border:none; background:#f5f5f5;"
                   type="date" name="dataPublicacao" required value="{{ old('dataPublicacao') }}">
            <br><br>

            <label>Editora:</label>
            <select style="width:100%; padding:10px; border-radius:20px; border:none; background:#f5f5f5;"
                    name="editora_id" required>
                @foreach ($editoras as $editora)
                    <option value="{{ $editora->id }}">
                        {{ $editora->nomeEditora }}
                    </option>
                @endforeach
            </select>
            <br><br>

            <label>Custo:</label>
            <input style="width:100%; padding:10px; border-radius:20px; border:none; background:#f5f5f5;"
                   type="number" step="0.01" name="custo" placeholder="Digite o custo" required value="{{ old('custo') }}">
            <br><br>

            <label>Preço:</label>
            <input style="width:100%; padding:10px; border-radius:20px; border:none; background:#f5f5f5;"
                   type="number" step="0.01" name="preco" placeholder="Digite o preço" required value="{{ old('preco') }}">
            <br><br>

            <label>Imposto:</label>
            <input style="width:100%; padding:10px; border-radius:20px; border:none; background:#f5f5f5;"
                   type="number" step="0.01" name="imposto" placeholder="Digite o imposto" required value="{{ old('imposto') }}">
            <br><br>

            <button type="submit"
                    style="border-radius:7px; background:darkblue; color:white; display:block; margin:15px auto; padding:8px 20px; border:none;">
                Cadastrar
            </button>

        </form>
    </div>

    @if($errors->any())
        <div style="color:red; text-align:center;">
            <ul style="list-style:none; padding:0;">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</body>
</html>