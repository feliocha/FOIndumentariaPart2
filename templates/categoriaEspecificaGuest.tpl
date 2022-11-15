{include file="header.tpl"}

<h1> {$categoria->nombre} </h1>

<h3> Articulos en la categoria: </h3>
<ul class="list-group">
    {foreach from=$articulos item=$articulo}
        <li class='list-group-item d-flex justify-content-between align-items-center'>
            <span href='showArticulo/{$articulo->id}'> <a href='showArticulo/{$articulo->id}'>{$articulo->nombre}</a> : {$articulo->precio}</span>
        </li>
    {/foreach}
</ul>



{include file="footer.tpl"}