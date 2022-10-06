{include file="form-articulos.tpl"}

    <div class="container-sm">
        <div class="row g-5">
            <div class="col-md-7">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Articulo</th>
                            <th>Cant</th>
                            <th>Valor base</th>
                            <th>Vendedor</th>
                            <th class="text-center">Acciones</th>
                            <th>+ Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach $articulos as $articulo}
                        <tr>
                            <td>{$articulo->id_articulo}</td>
                            <td>{$articulo->nombre_art|capitalize}</td>
                            <td>{$articulo->cantidad}</td>
                            <td>{$articulo->valor_base|default:'sin valor base'}</td>
                            <td>{$arrCliente[$articulo->id_articulo]}</td>
                            <td class="text-center">
                            <div class=""></div>
                                <a class="btn btn-sm btn-success" href="admin/clientes/articulos/edit/{$articulo->id_articulo}">Editar</a>
                                <a class="btn btn-sm btn-danger" href="admin/clientes/articulos/borrar/{$articulo->id_articulo}">Borrar</a>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-primary" href="admin/clientes/articulos/{$articulo->id_articulo}">VER</a>
                            </td>
                        </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
            <div class="col-md-5">
                {if isset($art_actual->id_articulo)}
                <div class="position-sticky" style="top: 50px;">
                    <div class="container">
                        <img class="bd-placeholder-img card-img-top" src="data:image/jpg;base64,{$imagen}">
                    </div>
                    <div class="container mt-3 pb-5">
                        <strong>Descripcion: </strong> {$art_actual->descripcion}
                    </div>
                </div>
                {/if}
            </div>
        </div>
    </div>
</main>

{include file="footer.tpl"}