<?php
/* Smarty version 4.2.1, created on 2022-10-01 21:18:02
  from '/opt/lampp/htdocs/practico-especial/templates/head.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6338926a830181_30849225',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a2f01809d94f27478e176546b3d95de0880a8be' => 
    array (
      0 => '/opt/lampp/htdocs/practico-especial/templates/head.tpl',
      1 => 1664651875,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6338926a830181_30849225 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en" class="h-100">

<head>
    <base href="<?php echo BASE_URL;?>
">
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
                <a class="navbar-brand" href="home">Remate</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="vendedores">Vendedores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="articulos">Articulos</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-success" type="submit">Acceso</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
<!------------fin-header---------------->

<?php }
}
