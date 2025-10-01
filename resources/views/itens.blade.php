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
    @if ($itens->count()>0)
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Unidade</th>
            </tr>
        </thead>
        <tbody>
            @foreach($itens as $item)
            <tr>
                <td><a href="/itens/{{ $item->id }}">{{$item->id}}</a></td>
                <td>{{$item->descricao}}</td>
                <td>{{$item->tipo}}</td>
                <td>{{$item->unidade}}</td>            
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Itens não encontrados! </p>
    @endif
</body>
</html>