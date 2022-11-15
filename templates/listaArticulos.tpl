{include file="header.tpl"}

<h2> Carga de articulo: </h2>

{include file="formCargaArticulos.tpl"}

<h2> Carga de categoria: </h2>

{include file="formCargaCategorias.tpl"}

<h3> Lista articulos: </h3>

<ul class="list-group">
    {foreach from=$articulos item=$articulo}
        <li class='list-group-item d-flex justify-content-between align-items-center'>
            <span href='showArticulo/{$articulo->id}'> <a href='showArticulo/{$articulo->id}'>{$articulo->nombre}</a> : {$articulo->precio}</span>
            <a href='deleteArticulo/{$articulo->id}' type='button' class='btn btn-danger ml-auto'>Borrar</a>
        </li>
    {/foreach}
</ul>

{include file="listaCategorias.tpl"}

{include file="footer.tpl"}