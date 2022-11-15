{include file="header.tpl"}

<h1> {$categoria->nombre} </h1>

<h3> Articulos en la categoria: </h3>
<ul class="list-group">
    {foreach from=$articulos item=$articulo}
        <li class='list-group-item d-flex justify-content-between align-items-center'>
            <span href='showArticulo/{$articulo->id}'> <a href='showArticulo/{$articulo->id}'>{$articulo->nombre}</a> : {$articulo->precio}</span>
            <a href='deleteArticulo/{$articulo->id}' type='button' class='btn btn-danger ml-auto'>Borrar</a>
        </li>
    {/foreach}
</ul>
<form action="updateCategoria/{$categoria->id}" method="POST" class="my-4">
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Nombre</label>
                <input name="nombre" type="text" class="form-control">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
</form>



{include file="footer.tpl"}