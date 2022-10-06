<?php
/* Smarty version 4.2.1, created on 2022-10-03 03:57:15
  from '/opt/lampp/htdocs/remate/templates/404.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_633a417b457839_21717244',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '510bc56e4135e9e2e2abfc6df3fe0bf10ba34c1a' => 
    array (
      0 => '/opt/lampp/htdocs/remate/templates/404.tpl',
      1 => 1664762229,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_633a417b457839_21717244 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">


    <head>
        <base href="<?php echo BASE_URL;?>
">
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Bootstrap 5 404 Error Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>


    <body>
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="text-center">
                <h1 class="display-1 fw-bold">404</h1>
                <p class="fs-3"> <span class="text-danger">Opps!</span> Page not found.</p>
                <p class="lead">
                    The page you’re looking for doesn’t exist.
                  </p>
                <a href="
                <?php if ($_smarty_tpl->tpl_vars['tieneAcceso']->value) {?>
                    admin
                <?php } else { ?>
                    home
                <?php }?>
                " class="btn btn-primary">Go Home</a>
            </div>
        </div>
    </body>


</html><?php }
}
