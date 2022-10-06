<?php
/* Smarty version 4.2.1, created on 2022-10-04 21:50:10
  from '/opt/lampp/htdocs/remate/templates/tablaArticulos-admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_633c8e72bab824_18133088',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89c2c0d7a8dc7509adb4b7d50cb6f592efa3fb67' => 
    array (
      0 => '/opt/lampp/htdocs/remate/templates/tablaArticulos-admin.tpl',
      1 => 1664913009,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:form-articulos.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_633c8e72bab824_18133088 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/opt/lampp/htdocs/remate/libs/smarty-4.2.1/libs/plugins/modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
$_smarty_tpl->_subTemplateRender("file:form-articulos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articulos']->value, 'articulo');
$_smarty_tpl->tpl_vars['articulo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['articulo']->value) {
$_smarty_tpl->tpl_vars['articulo']->do_else = false;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['articulo']->value->id_articulo;?>
</td>
                            <td><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['articulo']->value->nombre_art);?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['articulo']->value->cantidad;?>
</td>
                            <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['articulo']->value->valor_base ?? null)===null||$tmp==='' ? 'sin valor base' ?? null : $tmp);?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['arrCliente']->value[$_smarty_tpl->tpl_vars['articulo']->value->id_articulo];?>
</td>
                            <td class="text-center">
                            <div class=""></div>
                                <a class="btn btn-sm btn-success" href="admin/clientes/articulos/edit/<?php echo $_smarty_tpl->tpl_vars['articulo']->value->id_articulo;?>
">Editar</a>
                                <a class="btn btn-sm btn-danger" href="admin/clientes/articulos/borrar/<?php echo $_smarty_tpl->tpl_vars['articulo']->value->id_articulo;?>
">Borrar</a>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-primary" href="admin/clientes/articulos/<?php echo $_smarty_tpl->tpl_vars['articulo']->value->id_articulo;?>
">VER</a>
                            </td>
                        </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-5">
                <?php if ((isset($_smarty_tpl->tpl_vars['art_actual']->value->id_articulo))) {?>
                <div class="position-sticky" style="top: 50px;">
                    <div class="container">
                        <img class="bd-placeholder-img card-img-top" src="data:image/jpg;base64,<?php echo $_smarty_tpl->tpl_vars['imagen']->value;?>
">
                    </div>
                    <div class="container mt-3 pb-5">
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
