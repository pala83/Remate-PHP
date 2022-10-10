{include file="header.tpl"}

<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Tabla de articulos:</h1>
        {if $tieneAcceso}
            {include file="form-articulos.tpl"}
        {/if}
        <div class="row g-5">
            <div class="col-md-7">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                        {if $tieneAcceso}
                            <th>ID</th>
                            <th>Articulo</th>
                            <th>Cant</th>
                            <th>Valor base</th>
                            <th>Vendedor</th>
                            <th class="text-center">Acciones</th>
                            <th>+ Info</th>
                        {else}
                            <th>Articulo</th>
                            <th>Cantidad</th>
                            <th>Valor base</th>
                            <th>Vendedor</th>
                            <th>Imagen</th>
                        {/if}
                        </tr>
                    </thead>
                    <tbody>
                        {foreach $articulos as $articulo}
                            <tr>
                            {if $tieneAcceso}
                                <td>{$articulo->id_articulo}</td>
                                <td>{$articulo->nombre_art|capitalize}</td>
                                <td>{$articulo->cantidad}</td>
                                <td>{$articulo->valor_base|default:'sin valor base'}</td>
                                <td>{$arrCliente[$articulo->id_articulo]}</td>
                                <td class="text-center">
                                <div class=""></div>
                                    <a class="btn btn-sm btn-success" href="articulos/edit/{$articulo->id_articulo}">Editar</a>
                                    <a class="btn btn-sm btn-danger" href="articulos/borrar/{$articulo->id_articulo}">Borrar</a>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-primary" href="articulos/{$articulo->id_articulo}">VER</a>
                                </td>
                            {else}
                                <td>{$articulo->nombre_art|capitalize}</td>
                                <td>{$articulo->cantidad}</td>
                                <td>{$articulo->valor_base|default:'sin valor base'}</td>
                                <td>{$clientes[$articulo->id_articulo]}</td>
                                <td class="text-center"><a class="btn btn-sm btn-primary" href="articulos/{$articulo->id_articulo}">VER</a></td>
                            </tr>
                            <tr>
                                <td colspan="5"><strong>Descripcion: </strong>{$articulo->descripcion|default:"sin descripcion"}</td>
                            {/if}
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
            <div class="col-md-5">
                {if isset($art_actual->id_articulo)}
                <div class="position-sticky" style="top: 0px;">
                <h1>{$art_actual->nombre_art|capitalize}</h1>
                    <div class="container">
                        <img class="bd-placeholder-img card-img-top" src="data:image/jpg;base64,{$imagen}">
                    </div>
                    <div class="container mt-3">
                        <strong>Descripcion: </strong> {$art_actual->descripcion}
                    </div>
                </div>
                {/if}
            </div>
        </div>
    </div>  
</main>

{include file="footer.tpl"}