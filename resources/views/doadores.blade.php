<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Doadores</title>
</head>
<body>
    <h1>Doadores</h1>
    @if ($doadores->count()>0)
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Cep</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doadores as $doador)
            <tr>
                <td><a href="/doadores/{{ $doador->id }}">{{$doador->id}}</a></td>
                <td>{{$doador->nome}}</td>
                <td>{{$doador->email}}</td>
                <td>{{$doador->telefone}}</td>
                <td>{{$doador->endereco}}</td>
                <td>{{$doador->cidade}}</td>
                <td>{{$doador->estado}}</td>
                <td>{{$doador->cep}}</td>
                <td>{{$doador->tipo}}</td>
            
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Doadores não encontrados! </p>
    @endif
</body>
</html>