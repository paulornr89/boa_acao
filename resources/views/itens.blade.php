<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Itens</title>
</head>
<body>
    <h1>Itens</h1>
    <a href="/item">Incluir Novo Item</a>
    @if ($itens->count()>0)
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Unidade</th>
            </tr>
        </thead>
        <tbody>
            @foreach($itens as $item)
            <tr>
                <td><a href="/itens/{{ $item->id }}">{{$item->id}}</a></td>
                <td>{{$item->nome}}</td>
                <td>{{$item->descricao}}</td>
                <td>{{$item->categoria}}</td>
                <td>{{$item->unidade}}</td>  
                <td><a href="{{route('itens.edit', $item->id)}}" title='Editar'>✏️</a></td>  
                <td><a href="{{route('itens.delete', $item->id)}}" title='Deletar'>🗑️</a></td>        
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Itens não encontrados! </p>
    @endif
    <a href="/">Voltar</a>
</body>
</html>