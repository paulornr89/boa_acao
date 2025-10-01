<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário</title>
</head>
<body>
    <h1>{{$usuario->email}}</h1>

    <ul>
        <li>Tipo: {{$usuario->tipo}}</li>
    </ul>
   <a href="/usuarios">Voltar</a>
</body>
</html>