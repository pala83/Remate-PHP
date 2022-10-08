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

<body>

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-80">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <form action="
                        {if $registro}
                        validateRegister
                        {else}
                        validateLogin
                        {/if}
                        " method="POST" class="mb-md-4 mt-md-4">
                            <h2 class="fw-bold mb-2 text-uppercase">
                            {if $registro}
                                Registro
                            {else}
                                Iniciar sesión
                            {/if}</h2>
                            <p class="text-white-50 mb-5"> Por favor ingrese email y contraseña! </p>
                            <div class="form-outline form-white mb-4">
                                <input type="email" name="email" class="form-control form-control-lg" placeholder="Email"/>
                            </div>
                            <div class="form-outline form-white mb-4">
                                <input type="password" name="pass" class="form-control form-control-lg" placeholder="Contraseña"/>
                            </div>
                            {if $registro}
                                <button class="btn btn-outline-primary btn-lg px-5" type="submit">Registro</button>
                            {else}
                                <button class="btn btn-outline-primary btn-lg px-5" type="submit">Acceder</button>
                            {/if}
                        </form>
                        {if $mensaje == 'error'}
                            <div class="alert alert-danger alert-dismissible fade show">
                                <strong>Error!</strong>
                                Email o contraseña incorracta.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        {/if}
                        {if !$registro}
                        <div>
                            <p class="mb-0">¿No tenes cuenta? <a href="register" class="text-white-50 fw-bold">Registrate</a></p>
                        </div>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{include file="footer.tpl"}