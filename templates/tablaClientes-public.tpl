{include file="head.tpl"}
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Vendedores:</h1>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Cliente</th>
                    <th>Telefono</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                {foreach $clientes as $cliente}
                <tr>
                    <td>{$cliente->nombre|capitalize} {$cliente->apellido|capitalize}</td>
                    <td>{$cliente->telefono}</td>
                    <td>{$cliente->email|default:"no tiene"}</td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</main>
{include file="footer.tpl"}