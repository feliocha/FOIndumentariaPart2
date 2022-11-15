{include file="header.tpl"}

<h1> {$articulo->nombre} </h1>
<h2> ${$articulo->precio} </h2>
<h3> Pertenece a la categoria: {$categoria->nombre} </h3>

<form action="updateArticulo/{$articulo->id}" method="POST" class="my-4">
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Nombre</label>
                <input name="nombre" type="text" class="form-control">
            </div>
        </div>

        <div class="col-3">
            <div class="form-group">
                <label>Precio</label>
                <input name="precio" type="number" class="form-control">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Categoria</label>
        <select name="id_categoria">
            {foreach from=$categorias item=categoria}
                <option value="{$categoria->id}">{$categoria->nombre}</option>
            {/foreach}
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
</form>

{include file="footer.tpl"}