<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item</title>
</head>
<body>
    <h1>{{$item->descricao}}</h1>

    <ul>
        <li>Tipo: {{$item->tipo}}</li>
        <li>Tipo: {{$item->unidade}}</li>
    </ul>
   <a href="/itens">Voltar</a>
</body>
</html>