{include file="head.tpl"}

<main class="flex-shrink-0">
    <div class="container">
        <div class="row g-5">
            <div class="col-md-7">
                <h1 class="mt-5">Articulos:</h1>
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Articulo</th>
                            <th>Cantidad</th>
                            <th>Valor base</th>
                            <th>Vendedor</th>
                            <th>Imagen</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach $articulos as $articulo}
                            <tr>
                                <td>{$articulo->nombre_art|capitalize}</td>
                                <td>{$articulo->cantidad}</td>
                                <td>{$articulo->valor_base|default:'sin valor base'}</td>
                                <td>{$clientes[$articulo->id_articulo]}</td>
                                <td class="text-center"><a class="btn btn-sm btn-primary" href="articulos/{$articulo->id_articulo}">VER</a></td>
                            </tr>
                            <tr>
                                <td colspan="5"><strong>Descripcion: </strong>{$articulo->descripcion|default:"sin descripcion"}</td>
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
            <div class="col-md-5">
                {if isset($art_actual->id_articulo)}
                    <div class="position-sticky" style="top: 50px;">
                    <h1 class="mt-5">{$art_actual->nombre_art|capitalize}</h1>
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