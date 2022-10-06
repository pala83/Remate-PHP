<?php
/* Smarty version 4.2.1, created on 2022-10-03 04:12:16
  from '/opt/lampp/htdocs/remate/templates/remate-public.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_633a4500dc5ce2_56831017',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9e26cccf6b805a25ac065a7b406c59c2d4541080' => 
    array (
      0 => '/opt/lampp/htdocs/remate/templates/remate-public.tpl',
      1 => 1664763135,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_633a4500dc5ce2_56831017 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/opt/lampp/htdocs/remate/libs/smarty-4.2.1/libs/plugins/modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
$_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Articulos vendidos Por Cliente</h1>
        <div class="row g-5">
            <div class="col-md-5 col-lg-4">
                <ul class="list-group">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['clientes']->value, 'cliente');
$_smarty_tpl->tpl_vars['cliente']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cliente']->value) {
$_smarty_tpl->tpl_vars['cliente']->do_else = false;
?>
                        <a class="nav-link" href="home/<?php echo $_smarty_tpl->tpl_vars['cliente']->value->id_cliente;?>
">
                            <li class="list-group-item d-flex justify-content-between align-items-center
                            <?php if ($_smarty_tpl->tpl_vars['cliente']->value->id_cliente == $_smarty_tpl->tpl_vars['id']->value) {?>
                                active
                            <?php }?>
                            "> <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['cliente']->value->nombre);?>
 <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['cliente']->value->apellido);?>
 </li>
                        </a>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
                    
            </div>
            <div class="col-md-7 col-lg-8  order-md-last">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Articulo</th>
                            <th>Valor base</th>
                            <th>Vendedor</th>
                            <th>Mas Info</th>
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
                                <td><?php echo (($tmp = $_smarty_tpl->tpl_vars['articulo']->value->valor_base ?? null)===null||$tmp==='' ? 'sin valor base' ?? null : $tmp);?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['articulo']->value->nombre;?>
 <?php echo $_smarty_tpl->tpl_vars['articulo']->value->apellido;?>
</td>
                                <td><a class="btn btn-sm btn-primary" href="articulos/<?php echo $_smarty_tpl->tpl_vars['articulo']->value->id_articulo;?>
">+ Info</a></td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
</main>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
