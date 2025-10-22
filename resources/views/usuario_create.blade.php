<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Cadastrar Usuário</h1>
    <form action="/usuario" method="POST">
        @csrf
        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"/> --}}
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome"/></td>
            </tr>
            <tr>
                <td>E-mail:</td>
                <td><input type="text" name="email"/></td>
            </tr>
            <tr>
                <td>Telefone:</td>
                <td><input type="text" name="telefone"/></td>
            </tr>
            <tr>
                <td>CEP:</td>
                <td><input type="text" name="cep"/></td>
            </tr>
            <tr>
                <td>Endereço:</td>
                <td><input type="text" name="endereco"/></td>
            </tr>
            <tr>
                <td>Número:</td>
                <td><input type="text" name="numero"/></td>
            </tr>
            <tr>
                <td>Complemento:</td>
                <td><input type="text" name="complemento"/></td>
            </tr>
            <tr>
                <td>Bairro:</td>
                <td><input type="text" name="bairro"/></td>
            </tr>
            <tr>
                <td>Cidade:</td>
                <td><input type="text" name="cidade"/></td>
            </tr>
            <tr>
                <td>UF:</td>
                <td><input type="text" name="uf"/></td>
            </tr>
            <tr>
                <td>Senha:</td>
                <td><input type="password" name="senha"/></td>
            </tr>
            <tr>
                <td>Tipo:</td>
                <td><select type="tipo" name="tipo">
                    <option value="">Selecione uma opção...</option>
                    <option value="D">Doador</option>
                    <option value="O">Organização</option>
                    <option value="A">Administrador</option>
                </select></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Criar"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="/usuarios" style="display: inline">&#9664;&nbsp;Voltar</a></td>
            </tr>
        </table>
    </form>
</body>

</html>