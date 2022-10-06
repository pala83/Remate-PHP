<?php
/* Smarty version 4.2.1, created on 2022-10-03 03:20:45
  from '/opt/lampp/htdocs/remate/templates/vendedores-admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_633a38ed5bcd68_54366655',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89d1385bfabc1cc42580fce800eb4a483d576433' => 
    array (
      0 => '/opt/lampp/htdocs/remate/templates/vendedores-admin.tpl',
      1 => 1664759852,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_633a38ed5bcd68_54366655 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/opt/lampp/htdocs/remate/libs/smarty-4.2.1/libs/plugins/modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
$_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<main class="flex-shrink-0">
    <div class="container">
        <h1>Tabla general de datos:</h1>
        <p>
            <a href="admin">admin</a>/<a href="admin/clientes">clientes</a>/<a href="admin/clientes/articulos">articulos</a>
        </p>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th class="text-center">Articulos</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['clientes']->value, 'cliente');
$_smarty_tpl->tpl_vars['cliente']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cliente']->value) {
$_smarty_tpl->tpl_vars['cliente']->do_else = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['cliente']->value->id_cliente;?>
</td>
                        <td><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['cliente']->value->nombre);?>
</td>
                        <td><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['cliente']->value->apellido);?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['cliente']->value->telefono;?>
</td>
                        <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['cliente']->value->email ?? null)===null||$tmp==='' ? "no tiene" ?? null : $tmp);?>
</td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-info" data-bs-toggle="collapse" href="#collapse<?php echo $_smarty_tpl->tpl_vars['cliente']->value->id_cliente;?>
">Articulos</a>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-success" href="admin/clientes/edit/<?php echo $_smarty_tpl->tpl_vars['cliente']->value->id_cliente;?>
">Editar</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <div class="collapse" id="collapse<?php echo $_smarty_tpl->tpl_vars['cliente']->value->id_cliente;?>
">
                                <?php if (empty($_smarty_tpl->tpl_vars['artPorID']->value[$_smarty_tpl->tpl_vars['cliente']->value->id_cliente])) {?>
                                    No hay
                                <?php } else { ?>
                                    <ul class="list-group">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['artPorID']->value[$_smarty_tpl->tpl_vars['cliente']->value->id_cliente], 'articulo');
$_smarty_tpl->tpl_vars['articulo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['articulo']->value) {
$_smarty_tpl->tpl_vars['articulo']->do_else = false;
?>
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <?php echo $_smarty_tpl->tpl_vars['cliente']->value->id_cliente;?>
.<?php echo $_smarty_tpl->tpl_vars['articulo']->value->id_articulo;?>
 | <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['articulo']->value->nombre_art);?>
 <a class="btn btn-sm btn-success" href="admin/articulos/edit/<?php echo $_smarty_tpl->tpl_vars['articulo']->value->id_articulo;?>
">Editar</a>
                                        </li>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </ul>
                                <?php }?>
                            </div>                        
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>
</main>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
