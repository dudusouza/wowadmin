<?php /* Smarty version 3.1.27, created on 2016-01-22 19:11:16
         compiled from "C:\wamp\www\wow\wow\admin\_templates\views\filter.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2777256a270c4a488f6_91510347%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77b45ee621582839338e10f31fa113ed880aa82a' => 
    array (
      0 => 'C:\\wamp\\www\\wow\\wow\\admin\\_templates\\views\\filter.tpl',
      1 => 1453486274,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2777256a270c4a488f6_91510347',
  'variables' => 
  array (
    'arrFields' => 0,
    'arrField' => 0,
    'formurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56a270c4bbf947_53128415',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56a270c4bbf947_53128415')) {
function content_56a270c4bbf947_53128415 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2777256a270c4a488f6_91510347';
?>
<div class="row">
    <div class="col-md-12">
        <form role="form" class="form-horizontal col-lg-6" method="post">
            <?php
$_from = $_smarty_tpl->tpl_vars['arrFields']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['arrField'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['arrField']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['arrField']->value) {
$_smarty_tpl->tpl_vars['arrField']->_loop = true;
$foreach_arrField_Sav = $_smarty_tpl->tpl_vars['arrField'];
?>
                <div class="form-group">
                    <?php if ($_smarty_tpl->tpl_vars['arrField']->value['label'] != '') {?>
                        <label for="field_<?php echo $_smarty_tpl->tpl_vars['arrField']->value['name'];?>
" class="col-sm-2 control-label no-padding-right"><?php echo $_smarty_tpl->tpl_vars['arrField']->value['label'];?>
</label>
                    <?php }?>
                    <div class="col-sm-10">
                        <?php echo $_smarty_tpl->tpl_vars['arrField']->value['field'];?>

                    </div>
                </div>
            <?php
$_smarty_tpl->tpl_vars['arrField'] = $foreach_arrField_Sav;
}
?>
            <button type="submit" class="btn btn-blue">
                <i class="fa fa-filter"></i>  <?php $_smarty_tpl->smarty->_tag_stack[] = array('admlang', array()); $_block_repeat=true; echo smarty_block_lang_adm(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
btn_filter<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang_adm(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </button>
            <a class="btn btn-danger" href="<?php echo $_smarty_tpl->tpl_vars['formurl']->value;?>
">
                <i class="fa fa-eraser"></i>  <?php $_smarty_tpl->smarty->_tag_stack[] = array('admlang', array()); $_block_repeat=true; echo smarty_block_lang_adm(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
btn_clear<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang_adm(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </a>
        </form>
    </div>
</div><?php }
}
?>