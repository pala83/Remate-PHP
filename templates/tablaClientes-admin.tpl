{include file="form-clientes.tpl" scope=parent}

    <div class="container-sm">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Email</th>
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
                        <a class="btn btn-sm btn-success" href="admin/clientes/edit/{$cliente->id_cliente}">Editar</a>
                        <a class="btn btn-sm btn-danger" href="admin/clientes/borrar/{$cliente->id_cliente}">Borrar</a>
                    </td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</main>



{include file="footer.tpl"}