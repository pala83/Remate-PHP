<?php
/* Smarty version 4.2.1, created on 2022-10-03 19:37:58
  from '/opt/lampp/htdocs/remate/templates/form-clientes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_633b1df6f36560_70910246',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '84dded08cf0da27f21ef6b646a822744dfb4760d' => 
    array (
      0 => '/opt/lampp/htdocs/remate/templates/form-clientes.tpl',
      1 => 1664818675,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
  ),
),false)) {
function content_633b1df6f36560_70910246 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- formulario de alta de tarea -->
<main class="flex-shrink-0">
    <div class="container">
        <h1>Tabla de clientes:</h1>
        <p>
            <a href="admin">admin</a>/<a href="admin/clientes">clientes</a>/<a href="admin/clientes/articulos">articulos</a>
        </p>
        <form 
        <?php if ($_smarty_tpl->tpl_vars['resultado']->value == 'edicion') {?>
            action="admin/clientes/confirmar/<?php echo $_smarty_tpl->tpl_vars['cliente']->value->id_cliente;?>
"
        <?php } else { ?>
            action="admin/clientes/add"
        <?php }?> method="POST" class="my-4">
            <div class="row mb-3">
                <div class="col">
                    <div class="row mb-3">
                        <div class="form-group col-md-4">
                            <label>Nombre <b class="text-danger">(*)</b></label>
                            <input name="nombre" type="text" class="form-control"
                            <?php if ($_smarty_tpl->tpl_vars['resultado']->value == 'edicion') {?>
                                value="<?php echo $_smarty_tpl->tpl_vars['cliente']->value->nombre;?>
"
                            <?php }?>
                            required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Apellido <b class="text-danger">(*)</b></label>
                            <input name="apellido" type="text" class="form-control"
                            <?php if ($_smarty_tpl->tpl_vars['resultado']->value == 'edicion') {?>
                                value="<?php echo $_smarty_tpl->tpl_vars['cliente']->value->apellido;?>
"
                            <?php }?>
                            required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Telefono <b class="text-danger">(*)</b></label>
                            <input name="telefono" type="tel" class="form-control" placeholder="2494-123456"
                            <?php if ($_smarty_tpl->tpl_vars['resultado']->value == 'edicion') {?>
                                value="<?php echo $_smarty_tpl->tpl_vars['cliente']->value->telefono;?>
"
                            <?php }?>
                            required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="mail" class="form-control"
                        <?php if ($_smarty_tpl->tpl_vars['resultado']->value == 'edicion') {?>
                            value="<?php echo $_smarty_tpl->tpl_vars['cliente']->value->email;?>
"
                        <?php }?>
                        >
                    </div>
                </div>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['resultado']->value == 'error') {?>
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Operacion rechazada!</strong>
                No metas basura a la base de datos por favor :)
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['resultado']->value == 'error_fk') {?>
                <div class="alert alert-warning alert-dismissible fade show">
                    <strong>Advertencia!</strong>
                    Este cliente tiene articulos cargados, ¿estas seguro de lo que haces?
                    <a class="btn btn-sm btn-success" href="admin/clientes/borrarFK/<?php echo $_smarty_tpl->tpl_vars['cliente']->value->id_cliente;?>
">SI</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['resultado']->value == 'exito') {?>
                <div class="alert alert-success alert-dismissible fade show">
                    <strong>Operacion exitosa!</strong>
                    Nuevo cliente agregado a la Base de Datos.
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
