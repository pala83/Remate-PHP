<?php
/* Smarty version 4.2.1, created on 2022-10-04 23:53:15
  from '/opt/lampp/htdocs/remate/templates/form-articulos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_633cab4bec4ac3_70157099',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f3b071c2d51db3ff6fe778e7f0903fcd95b9162b' => 
    array (
      0 => '/opt/lampp/htdocs/remate/templates/form-articulos.tpl',
      1 => 1664920395,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
  ),
),false)) {
function content_633cab4bec4ac3_70157099 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- formulario de alta de tarea -->
<main class="flex-shrink-0">
    <div class="container">
        <h1>Tabla de articulos:</h1>
        <p>
            <a href="admin">admin</a>/<a href="admin/clientes">clientes</a>/<a href="admin/clientes/articulos">articulos</a>
        </p>
        <form 
        <?php if ($_smarty_tpl->tpl_vars['resultado']->value == 'edicion') {?>
            action="admin/clientes/articulos/confirmar/<?php echo $_smarty_tpl->tpl_vars['art_actual']->value->id_articulo;?>
"
        <?php } else { ?>
            action="admin/clientes/articulos/add" 
        <?php }?> method="POST" class="my-4" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-md-7">
                    <div class="form-group">
                    <label>Cliente <b class="text-danger">(*)</b></label>
                        <select class="form-select" name="cliente">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['clientes']->value, 'cliente');
$_smarty_tpl->tpl_vars['cliente']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cliente']->value) {
$_smarty_tpl->tpl_vars['cliente']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['cliente']->value->id_cliente;?>
"
                            <?php if ($_smarty_tpl->tpl_vars['resultado']->value == 'edicion' && $_smarty_tpl->tpl_vars['cliente']->value->id_cliente == $_smarty_tpl->tpl_vars['art_actual']->value->id_cliente) {?>
                            selected
                            <?php }?>
                            ><?php echo $_smarty_tpl->tpl_vars['cliente']->value->nombre;?>
 <?php echo $_smarty_tpl->tpl_vars['cliente']->value->apellido;?>
</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nombre del articulo <b class="text-danger">(*)</b></label>
                        <input name="nombre" type="text" class="form-control"
                        <?php if ($_smarty_tpl->tpl_vars['resultado']->value == 'edicion') {?>
                            value="<?php echo $_smarty_tpl->tpl_vars['art_actual']->value->nombre_art;?>
"
                        <?php }?> required>
                    </div>
                    <div class="form-group">
                        <label>Cantidad de articulos <b class="text-danger">(default:1)</b></label>
                        <input name="cantidad" type="number" class="form-control"
                        <?php if ($_smarty_tpl->tpl_vars['resultado']->value == 'edicion') {?>
                            value="<?php echo $_smarty_tpl->tpl_vars['art_actual']->value->cantidad;?>
"
                        <?php }?> >
                    </div>
                    <div class="form-group">
                        <label>Valor base</label>
                        <input name="valorB" type="number" step="0.01" class="form-control"
                        <?php if ($_smarty_tpl->tpl_vars['resultado']->value == 'edicion') {?>
                            value="<?php echo $_smarty_tpl->tpl_vars['art_actual']->value->valor_base;?>
"
                        <?php }?> >
                    </div>
                    <div class="form-group">
                        <label>Imagen <b class="text-danger">(*)</b></label>
                        <input name="imagen" type="file" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-5">
                    <label>Descripcion</label>
                    <textarea name="descripcion" class="form-control" rows="10"><?php if ($_smarty_tpl->tpl_vars['resultado']->value == 'edicion') {
echo $_smarty_tpl->tpl_vars['art_actual']->value->descripcion;
}?></textarea>
                </div>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['resultado']->value == 'error') {?>
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Operacion rechazada!</strong>
                No metas basura a la base de datos por favor :)
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php }?>
            <button type="submit"
            <?php if ($_smarty_tpl->tpl_vars['resultado']->value == 'edicion') {?>
                class="btn btn-success mt-2">Confirmar!
            <?php } else { ?>
                class="btn btn-warning mt-2">Agregar
            <?php }?>
            </button>
        </form>
    </div>
<?php }
}
