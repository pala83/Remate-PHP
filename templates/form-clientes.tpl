{include file="head.tpl"}

<!-- formulario de alta de tarea -->
<main class="flex-shrink-0">
    <div class="container">
        <h1>Tabla de clientes:</h1>
        <p>
            <a href="admin">admin</a>/<a href="admin/clientes">clientes</a>/<a href="admin/clientes/articulos">articulos</a>
        </p>
        <form 
        {if $resultado == 'edicion'}
            action="admin/clientes/confirmar/{$cliente->id_cliente}"
        {else}
            action="admin/clientes/add"
        {/if} method="POST" class="my-4">
            <div class="row mb-3">
                <div class="col">
                    <div class="row mb-3">
                        <div class="form-group col-md-4">
                            <label>Nombre <b class="text-danger">(*)</b></label>
                            <input name="nombre" type="text" class="form-control"
                            {if $resultado == 'edicion'}
                                value="{$cliente->nombre}"
                            {/if}
                            required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Apellido <b class="text-danger">(*)</b></label>
                            <input name="apellido" type="text" class="form-control"
                            {if $resultado == 'edicion'}
                                value="{$cliente->apellido}"
                            {/if}
                            required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Telefono <b class="text-danger">(*)</b></label>
                            <input name="telefono" type="tel" class="form-control" placeholder="2494-123456"
                            {if $resultado == 'edicion'}
                                value="{$cliente->telefono}"
                            {/if}
                            required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="mail" class="form-control"
                        {if $resultado == 'edicion'}
                            value="{$cliente->email}"
                        {/if}
                        >
                    </div>
                </div>
            </div>
            {if $resultado == 'error'}
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Operacion rechazada!</strong>
                No metas basura a la base de datos por favor :)
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            {/if}
            {if $resultado == 'error_fk'}
                <div class="alert alert-warning alert-dismissible fade show">
                    <strong>Advertencia!</strong>
                    Este cliente tiene articulos cargados, ¿estas seguro de lo que haces?
                    <a class="btn btn-sm btn-success" href="admin/clientes/borrarFK/{$cliente->id_cliente}">SI</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                {/if}
            {if $resultado == 'exito'}
                <div class="alert alert-success alert-dismissible fade show">
                    <strong>Operacion exitosa!</strong>
                    Nuevo cliente agregado a la Base de Datos.
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