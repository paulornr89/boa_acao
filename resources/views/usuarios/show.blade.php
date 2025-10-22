<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário</title>
</head>
<body>
    <h1>{{$usuario->nome}}</h1>

    <ul>
        <li>Telefone: {{$usuario->telefone}}</li>
        <li>E-mail: {{$usuario->email}}</li>
        <li>CEP: {{$usuario->cep}}</li>
        <li>Endereço: {{$usuario->endereco}}</li>
        <li>Número: {{$usuario->numero}}</li>
        <li>Complemento: {{$usuario->complemento}}</li>
        <li>Bairro: {{$usuario->bairro}}</li>
        <li>Cidade: {{$usuario->cidade}}</li>
        <li>UF: {{$usuario->uf}}</li>
        <li>Tipo: {{$usuario->tipo}}</li>
    </ul>
   <a href="/usuarios">Voltar</a>
</body>
</html>