<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria</title>
</head>
<body>
    <h1>{{$categoria->nome}}</h1>

    <ul>
        <li>ID: {{$categoria->id}}</li>
        <li>Sigla: {{$categoria->sigla}}</li>
    </ul>
   <a href="/categorias">Voltar</a>
</body>
</html>