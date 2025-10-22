<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Categorias</title>
</head>
<body>
    <h1>Categorias</h1>
    <a href="/categoria">Incluir Nova Categoria</a>
    @if ($categorias->count()>0)
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Sigla</th>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td><a href="/categorias/{{ $categoria->id }}">{{$categoria->id}}</a></td>
                <td>{{$categoria->sigla}}</td>
                <td>{{$categoria->nome}}</td>
                <td><a href="{{route('categorias.edit', $categoria->id)}}" title='Editar'>✏️</a></td>  
                <td><a href="{{route('categorias.delete', $categoria->id)}}" title='Deletar'>🗑️</a></td>        
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Nenhuma categoria foi encontrada! </p>
    @endif
    <a href="/">Voltar</a>
</body>
</html>