<div>
    <h1>Editar Categoria - {{$categoria->nome}}</h1>
    <form action="{{route('categorias.update', $categoria->id)}}" method="POST">
        @csrf
        <div>
            <label>Nome:</label></br>
            <input type="text" name="nome" value="{{$categoria->nome}}"/>
        </div>
        <div>
            <label>Sigla:</label></br>
            <input type="text" name="sigla" value="{{$categoria->sigla}}"/>
        </div>
        <button type="submit">Editar</button>
        </br>
    </form>
    <a href="/categorias"><button form=cancel >Cancelar</button></a>
</div>
