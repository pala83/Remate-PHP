<?php
/* Smarty version 4.2.1, created on 2022-10-01 21:05:08
  from '/opt/lampp/htdocs/practico-especial/templates/articulos-public.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63388f6461a685_86476598',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '133eba8b0e02786aa7f45c706b987a53acc0b752' => 
    array (
      0 => '/opt/lampp/htdocs/practico-especial/templates/articulos-public.tpl',
      1 => 1664651107,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_63388f6461a685_86476598 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/opt/lampp/htdocs/practico-especial/libs/smarty-4.2.1/libs/plugins/modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),1=>array('file'=>'/opt/lampp/htdocs/practico-especial/libs/smarty-4.2.1/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
$_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articulos']->value, 'articulo');
$_smarty_tpl->tpl_vars['articulo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['articulo']->value) {
$_smarty_tpl->tpl_vars['articulo']->do_else = false;
?>
                            <tr>
                                <td><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['articulo']->value->nombre_art);?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['articulo']->value->cantidad;?>
</td>
                                <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['articulo']->value->valor_base ?? null)===null||$tmp==='' ? 'sin valor base' ?? null : $tmp);?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['clientes']->value[$_smarty_tpl->tpl_vars['articulo']->value->id_articulo];?>
</td>
                                <td class="text-center"><a class="btn btn-sm btn-primary" href="articulos/<?php echo $_smarty_tpl->tpl_vars['articulo']->value->id_articulo;?>
">VER</a></td>
                            </tr>
                            <?php if ((isset($_smarty_tpl->tpl_vars['articulo']->value->descripcion))) {?>
                                <tr>
                                    <td colspan="5"><strong>Descripcion: </strong><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['articulo']->value->descripcion,150);?>
</td>
                                </tr>
                            <?php }?>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-5">
                <?php if ((isset($_smarty_tpl->tpl_vars['art_actual']->value->id_articulo))) {?>
                    <h1 class="mt-5"><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['art_actual']->value->nombre_art);?>
</h1>
                    <div class="position-sticky" style="top: 50px;">
                        <div class="container">
                            <img class="bd-placeholder-img card-img-top" src="data:image/jpg;base64,<?php echo $_smarty_tpl->tpl_vars['imagen']->value;?>
">
                        </div>
                        <div class="container mt-3">
                            <strong>Descripcion: </strong> <?php echo $_smarty_tpl->tpl_vars['art_actual']->value->descripcion;?>

                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>  
</main>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
