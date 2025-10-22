<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Cadastrar Item</h1>
    <form action="/item" method="POST">
        @csrf
        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"/> --}}
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome"/></td>
            </tr>
            <tr>
                <td>Descrição:</td>
                <td><input type="text" name="descricao"/></td>
            </tr>
            <tr>
                <td>Unidade:</td>
                <td><input type="text" name="unidade"/></td>
            </tr>
            <tr>
                <td>Subcategoria:</td>
                <td><select type="categoria" name="categoria">
                    <option value="">Selecione uma opção...</option>
                    <option value="PER">Perecível</option>
                    <option value="NPER">Não-Perecível</option>
                    <option value="ADU">Adulto</option>
                    <option value="INF">Infantil</option>
                    <option value="CAB">Cama e Banho</option>
                    <option value="COR">Corporal</option>
                    <option value="BUL">Bucal</option>
                    <option value="INT">Íntima</option>
                    <option value="DOM">Doméstica Geral</option>
                    <option value="LAV">Lavanderia</option>
                </select></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Criar"/></td>
            </tr>
        </table>
    </form>
    <a href="/itens" style="display: inline">&#9664;&nbsp;Voltar</a>
</body>

</html>