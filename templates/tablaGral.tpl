{include file="header.tpl"}

<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Articulos a la venta:</h1>
        <div class="row g-5">
            <div class="col-md-5 col-lg-4">
                <ul class="list-group">
                    {foreach $clientes as $cliente}
                        <a class="nav-link" href="home/{$cliente->id_cliente}">
                            <li class="list-group-item d-flex justify-content-between align-items-center
                            {if $cliente->id_cliente == $id}
                                active
                            {/if}
                            "> {$cliente->nombre|capitalize} {$cliente->apellido|capitalize} 
                            </li>
                        </a>
                    {/foreach}
                </ul>
                    
            </div>
            <div class="col-md-7 col-lg-8  order-md-last">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Articulo</th>
                            <th>Valor base</th>
                            <th>Vendedor</th>
                            {if $tieneAcceso}
                                <th>Edicion</th>
                            {/if}
                            <th>Mas Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach $articulos as $articulo}
                            <tr>
                                <td>{$articulo->nombre_art|capitalize}</td>
                                <td>{$articulo->valor_base|default:'sin valor base'}</td>
                                <td>{$articulo->nombre} {$articulo->apellido}</td>
                                {if $tieneAcceso}
                                    <td><a class="btn btn-sm btn-success" href="articulos/edit/{$articulo->id_articulo}">Editar</a></td>
                                {/if}
                                <td><a class="btn btn-sm btn-primary" href="articulos/{$articulo->id_articulo}">+ Info</a></td>
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
</main>

{include file="footer.tpl"}