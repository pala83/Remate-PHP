{include file="head.tpl"}

<header>
<!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{BASE_URL}">
            {if $tieneAcceso}
            Remate: Acceso root
            {else}
            Remate
            {/if}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="clientes">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="articulos">Articulos</a>
                    </li>
                </ul>
                {if $tieneAcceso}
                    <a class="btn btn-outline-danger" href="cerrarSesion" type="button">Cerrar Sesión</a>
                {else}
                    <a class="btn btn-outline-success" href="sesion" type="button">Acceso</a>
                {/if}
            </div>
        </div>
    </nav>
</header>