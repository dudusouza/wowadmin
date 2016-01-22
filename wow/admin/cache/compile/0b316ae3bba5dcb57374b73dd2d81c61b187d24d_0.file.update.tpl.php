<?php /* Smarty version 3.1.27, created on 2016-01-22 18:40:24
         compiled from "C:\wamp\www\wow\wow\admin\_templates\views\update.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1372856a26988a73cf7_53924543%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b316ae3bba5dcb57374b73dd2d81c61b187d24d' => 
    array (
      0 => 'C:\\wamp\\www\\wow\\wow\\admin\\_templates\\views\\update.tpl',
      1 => 1453484409,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1372856a26988a73cf7_53924543',
  'variables' => 
  array (
    'formurl' => 0,
    'viewname' => 0,
    'pkvalue' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56a26988b2f523_40526133',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56a26988b2f523_40526133')) {
function content_56a26988b2f523_40526133 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1372856a26988a73cf7_53924543';
?>
<h3><?php $_smarty_tpl->smarty->_tag_stack[] = array('admlang', array()); $_block_repeat=true; echo smarty_block_lang_adm(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
lbl_update<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang_adm(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</h3>

<form role="form" class="form-horiz" action="<?php echo $_smarty_tpl->tpl_vars['formurl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['viewname']->value;?>
/action/update/<?php echo $_smarty_tpl->tpl_vars['pkvalue']->value;?>
" method="post">
    <?php echo $_smarty_tpl->getSubTemplate ('views/_form.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

</form><?php }
}
?>