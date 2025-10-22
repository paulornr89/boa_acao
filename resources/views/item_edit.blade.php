<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Itenm - Editar</title>
</head>

<body>
    <h1>Editar - {{$item->nome}}</h1>
    <form action="{{route('itens.update',$item->id)}}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value="{{$item->nome}}"/></td>
            </tr>
            <tr>
                <td>Descrição:</td>
                <td><input type="text" name="descricao" value="{{$item->descricao}}"/></td>
            </tr>
            <tr>
                <td>Unidade:</td>
                <td><input type="text" name="unidade" value="{{$item->unidade}}"/></td>
            </tr>
            <tr>
                <td>Categoria:</td>
                <td>
                    <select name="categoria" value="{{$item->categoria}}">
                        <option value="">Selecione uma opção...</option>
                        <option value="PER" {{($item->categoria=='PER')?'selected':''}}>Perecível</option>
                        <option value="NPER" {{($item->categoria=='NPER')?'selected':''}}>Não-Perecível</option>
                        <option value="ADU" {{($item->categoria=='ADU')?'selected':''}}>Adulto</option>
                        <option value="INF" {{($item->categoria=='INF')?'selected':''}}>Infantil</option>
                        <option value="CAB" {{($item->categoria=='CAB')?'selected':''}}>Cama e Banho</option>
                        <option value="COR" {{($item->categoria=='COR')?'selected':''}}>Corporal</option>
                        <option value="BUL" {{($item->categoria=='BUL')?'selected':''}}>Bucal</option>
                        <option value="INT" {{($item->categoria=='INT')?'selected':''}}>Íntima</option>
                        <option value="DOM" {{($item->categoria=='DOM')?'selected':''}}>Doméstica Geral</option>
                        <option value="LAV" {{($item->categoria=='LAV')?'selected':''}}>Lavanderia</option>
                    </select>
                </td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <input type="submit" value="Salvar"/>
                    <a href="/itens"><button form=cancel >Cancelar</button></a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html> 