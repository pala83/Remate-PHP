<?php
/* Smarty version 4.2.1, created on 2022-10-03 04:12:19
  from '/opt/lampp/htdocs/remate/templates/tablaClientes-public.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_633a4503845515_79896188',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5d09297d25d0f7a302c7d9574a9067cfa46de7c4' => 
    array (
      0 => '/opt/lampp/htdocs/remate/templates/tablaClientes-public.tpl',
      1 => 1664762692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_633a4503845515_79896188 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/opt/lampp/htdocs/remate/libs/smarty-4.2.1/libs/plugins/modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
$_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Vendedores:</h1>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Cliente</th>
                    <th>Telefono</th>
                    <th>Email</th>
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
                    <td><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['cliente']->value->nombre);?>
 <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['cliente']->value->apellido);?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['cliente']->value->telefono;?>
</td>
                    <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['cliente']->value->email ?? null)===null||$tmp==='' ? "no tiene" ?? null : $tmp);?>
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
