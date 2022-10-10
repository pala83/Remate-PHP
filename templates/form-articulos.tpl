<!-- formulario de alta de tarea -->
    <div class="container">
        <form 
        {if $resultado == 'edicion'}
            action="articulos/confirmar/{$art_actual->id_articulo}"
        {else}
            action="articulos/add" 
        {/if} method="POST" class="my-4" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-md-7">
                    <div class="form-group">
                    <label>Cliente <b class="text-danger">(*)</b></label>
                        <select class="form-select" name="cliente">
                        {foreach $clientes as $cliente}
                            <option value="{$cliente->id_cliente}"
                            {if $resultado == 'edicion' and $cliente->id_cliente == $art_actual->id_cliente}
                            selected
                            {/if}
                            >{$cliente->nombre} {$cliente->apellido}</option>
                        {/foreach}
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nombre del articulo <b class="text-danger">(*)</b></label>
                        <input name="nombre" type="text" class="form-control"
                        {if $resultado == 'edicion'}
                            value="{$art_actual->nombre_art}"
                        {/if} required>
                    </div>
                    <div class="form-group">
                        <label>Cantidad de articulos <b class="text-danger">(default:1)</b></label>
                        <input name="cantidad" type="number" class="form-control"
                        {if $resultado == 'edicion'}
                            value="{$art_actual->cantidad}"
                        {/if} >
                    </div>
                    <div class="form-group">
                        <label>Valor base</label>
                        <input name="valorB" type="number" step="0.01" class="form-control"
                        {if $resultado == 'edicion'}
                            value="{$art_actual->valor_base}"
                        {/if} >
                    </div>
                    <div class="form-group">
                        <label>Imagen <b class="text-danger">(*)</b></label>
                        <input name="imagen" type="file" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-5">
                    <label>Descripcion</label>
                    <textarea name="descripcion" class="form-control" rows="10">{if $resultado == 'edicion'}{$art_actual->descripcion}{/if}</textarea>
                </div>
            </div>
            {if $resultado == 'error'}
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Operacion rechazada!</strong>
                No metas basura a la base de datos por favor :)
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            {/if}
            <button type="submit"
            {if $resultado == 'edicion'}
                class="btn btn-success mt-2">Confirmar!
            {else}
                class="btn btn-warning mt-2">Agregar
            {/if}
            </button>
        </form>
    </div>
{*  fin formulario  *}