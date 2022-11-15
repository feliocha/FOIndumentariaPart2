<h3> Lista categorias: </h3>

<ul class="list-group">
    {foreach from=$categorias item=$categoria}
        <li class='list-group-item d-flex justify-content-between align-items-center'>
            <span href='showCategoria/{$categoria->id}'> <a href='showCategoria/{$categoria->id}'>{$categoria->nombre}</a></span>
        </li>
    {/foreach}
</ul>