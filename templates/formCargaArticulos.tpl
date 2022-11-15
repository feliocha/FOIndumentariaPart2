<form action="addArticulo" method="POST" class="my-4">
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

    <button type="submit" class="btn btn-primary mt-2">Guardar</button>
</form>
