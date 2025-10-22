<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuários</title>
</head>

<body>
    <h1>Editar - {{$usuario->nome}}</h1>
    <form action="{{route('usuarios.update',$usuario->id)}}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="{{$usuario->nome}}"/></td>
            </tr>
            <tr>
                <td>E-mail:</td>
                <td><input type="text" name="email" value="{{$usuario->email}}"/></td>
            </tr>
            <tr>
                <td>Endereço:</td>
                <td><input type="text" name="endereco" value="{{$usuario->endereco}}"/></td>
            </tr>
            <tr>
                <td>CEP:</td>
                <td><input type="text" name="cep" value="{{$usuario->cep}}"/></td>
            </tr>
            <tr>
                <td>Número:</td>
                <td><input type="text" name="numero" value="{{$usuario->numero}}"/></td>
            </tr>
            <tr>
                <td>Complemento:</td>
                <td><input type="text" name="complemento" value="{{$usuario->complemento}}"/></td>
            </tr>
            <tr>
                <td>Bairro:</td>
                <td><input type="text" name="bairro" value="{{$usuario->bairro}}"/></td>
            </tr>
            <tr>
                <td>Cidade:</td>
                <td><input type="text" name="cidade" value="{{$usuario->cidade}}"/></td>
            </tr>
            <tr>
                <td>UF:</td>
                <td><input type="text" name="uf" value="{{$usuario->uf}}"/></td>
            </tr>
            <tr>
                <td>Senha:</td>
                <td><input type="password" name="senha" value="{{$usuario->senha}}"/></td>
            </tr>
            <tr>
                <td>Tipo:</td>
                <td>
                    <select name="tipo" value="{{$usuario->numero}}">
                        <option value="">Selecione uma opção...</option>
                        <option value="A" {{($usuario->tipo=='A')?'selected':''}}>Administrador</option>
                        <option value="D" {{($usuario->tipo=='D')?'selected':''}}>Doador</option>
                        <option value="O" {{($usuario->tipo=='O')?'selected':''}}>Organização</option>
                    </select>
                </td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <input type="submit" value="Salvar"/>
                    <a href="/usuarios"><button form=cancel >Cancelar</button></a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html> 