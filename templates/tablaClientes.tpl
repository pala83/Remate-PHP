{include file="header.tpl"}

<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Tabla de clientes:</h1>
        {if $tieneAcceso}
            {include file="form-clientes.tpl"}
        {/if}
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    {if $tieneAcceso}
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th class="text-center">Acciones</th>
                    {else}
                        <th>Cliente</th>
                        <th>Telefono</th>
                        <th>Email</th>
                    {/if}
                </tr>
            </thead>
            <tbody>
                {foreach $clientes as $cliente}
                <tr>
                    {if $tieneAcceso}
                        <td>{$cliente->id_cliente}</td>
                        <td>{$cliente->nombre|capitalize}</td>
                        <td>{$cliente->apellido|capitalize}</td>
                        <td>{$cliente->telefono}</td>
                        <td>{$cliente->email|default:"no tiene"}</td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-success" href="clientes/edit/{$cliente->id_cliente}">Editar</a>
                            <a class="btn btn-sm btn-danger" href="clientes/borrar/{$cliente->id_cliente}">Borrar</a>
                        </td>
                    {else}
                        <td>{$cliente->nombre|capitalize} {$cliente->apellido|capitalize}</td>
                        <td>{$cliente->telefono}</td>
                        <td>{$cliente->email|default:"no tiene"}</td>
                    {/if}
                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</main>

{include file="footer.tpl"}