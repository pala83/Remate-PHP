{include file="head.tpl"}

<main class="flex-shrink-0">
    <div class="container">
        <h1>Tabla general de datos:</h1>
        <p>
            <a href="admin">admin</a>/<a href="admin/clientes">clientes</a>/<a href="admin/clientes/articulos">articulos</a>
        </p>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th class="text-center">Articulos</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                {foreach $clientes as $cliente}
                    <tr>
                        <td>{$cliente->id_cliente}</td>
                        <td>{$cliente->nombre|capitalize}</td>
                        <td>{$cliente->apellido|capitalize}</td>
                        <td>{$cliente->telefono}</td>
                        <td>{$cliente->email|default:"no tiene"}</td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-info" data-bs-toggle="collapse" href="#collapse{$cliente->id_cliente}">Articulos</a>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-success" href="admin/clientes/edit/{$cliente->id_cliente}">Editar</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <div class="collapse" id="collapse{$cliente->id_cliente}">
                                {if empty($artPorID[$cliente->id_cliente])}
                                    No hay
                                {else}
                                    <ul class="list-group">
                                    {foreach $artPorID[$cliente->id_cliente] as $articulo}
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            {$cliente->id_cliente}.{$articulo->id_articulo} | {$articulo->nombre_art|capitalize} <a class="btn btn-sm btn-success" href="admin/clientes/articulos/edit/{$articulo->id_articulo}">Editar</a>
                                        </li>
                                    {/foreach}
                                    </ul>
                                {/if}
                            </div>                        
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</main>

{include file="footer.tpl"}