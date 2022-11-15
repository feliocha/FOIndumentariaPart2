{include file="header.tpl"}

<h3> Lista articulos: </h3>

<ul class="list-group">
    {foreach from=$articulos item=$articulo}
        <li class='list-group-item d-flex justify-content-between align-items-center'>
            <span href='showArticulo/{$articulo->id}'> <a href='showArticulo/{$articulo->id}'>{$articulo->nombre}</a> : {$articulo->precio}</span>
        </li>
    {/foreach}
</ul>

{include file="listaCategoriasGuest.tpl"}

{include file="footer.tpl"}