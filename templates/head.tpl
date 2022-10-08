<!doctype html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Casa de remate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="./css/style.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">

    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
                {if !$tieneAcceso}
                    <a class="navbar-brand" href="{BASE_URL}">Remate</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                {else}
                    <a class="navbar-brand" href="admin">Remate: Acceso root</a>
                {/if}
                {if !$tieneAcceso}
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="vendedores">Vendedores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="articulos">Articulos</a>
                        </li>
                    </ul>
                    <a class="btn btn-outline-success" href="sesion" type="button">Acceso</a>
                {else}
                <div class="d-flex justify-content-between" id="navbarCollapse">
                    <a class="btn btn-outline-danger" href="{BASE_URL}" type="button">Cerrar Sesión</a>
                {/if}
                </div>
            </div>
        </nav>
    </header>
<!------------fin-header---------------->

