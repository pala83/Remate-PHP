<?php
/* Smarty version 4.2.1, created on 2022-10-03 15:45:45
  from '/opt/lampp/htdocs/remate/templates/tablaClientes-admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_633ae7891bd465_10615949',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '26840d195e5d1e566a5727c827486d0b0d0b9696' => 
    array (
      0 => '/opt/lampp/htdocs/remate/templates/tablaClientes-admin.tpl',
      1 => 1664804743,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:form-clientes.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_633ae7891bd465_10615949 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/opt/lampp/htdocs/remate/libs/smarty-4.2.1/libs/plugins/modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
$_smarty_tpl->_subTemplateRender("file:form-clientes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
?>

    <div class="container-sm">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Email</th>
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
                        <a class="btn btn-sm btn-success" href="admin/clientes/edit/<?php echo $_smarty_tpl->tpl_vars['cliente']->value->id_cliente;?>
">Editar</a>
                        <a class="btn btn-sm btn-danger" href="admin/clientes/borrar/<?php echo $_smarty_tpl->tpl_vars['cliente']->value->id_cliente;?>
">Borrar</a>
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
