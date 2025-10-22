<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Usuários</h1>
    @if ($usuarios->count()>0)
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>CEP</th>
                <th>Número</th>
                <th>Complemento</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>UF</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td><a href="/usuarios/{{ $usuario->id }}">{{$usuario->id}}</a></td>
                <td>{{$usuario->nome}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->telefone}}</td>
                <td>{{$usuario->endereco}}</td>
                <td>{{$usuario->cep}}</td>
                <td>{{$usuario->numero}}</td>
                <td>{{$usuario->bairro}}</td>
                <td>{{$usuario->cidade}}</td>
                <td>{{$usuario->uf}}</td>
                <td>{{$usuario->tipo}}</td>
                <td><a href="{{route('usuarios.delete', $usuario->id)}}" title='Deletar'>🗑️</a></td>
                <td><a href="{{route('usuarios.edit', $usuario->id)}}" title='Editar'>✏️</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Usuários não encontrados! </p>
    @endif
    <a href="/">Voltar</a>
</body>
</html>