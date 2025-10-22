<div>
    <h1>Cadastro de Categoria</h1>
    <form action="/categoria" method="POST">
        @csrf
        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"/> --}}
        <div>
            <label>Nome:</label></br>
            <input type="text" name="nome"/>
        </div>
        <div>
            <label>Sigla:</label></br>
            <input type="text" name="sigla"/>
        </div>
        <button type="submit">Criar</button>
        </br>
    </form>
    <a href="/categorias" style="display: inline">&#9664;&nbsp;Voltar</a></td>
</div>
