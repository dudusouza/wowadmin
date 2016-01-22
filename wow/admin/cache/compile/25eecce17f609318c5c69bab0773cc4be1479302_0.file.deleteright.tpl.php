<?php /* Smarty version 3.1.27, created on 2016-01-22 18:12:42
         compiled from "C:\wamp\www\wow\wow\admin\_templates\widgets\deleteright.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:655256a2630af36643_36214756%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25eecce17f609318c5c69bab0773cc4be1479302' => 
    array (
      0 => 'C:\\wamp\\www\\wow\\wow\\admin\\_templates\\widgets\\deleteright.tpl',
      1 => 1453482284,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '655256a2630af36643_36214756',
  'variables' => 
  array (
    'formurl' => 0,
    'viewname' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56a2630b0368d2_85269461',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56a2630b0368d2_85269461')) {
function content_56a2630b0368d2_85269461 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '655256a2630af36643_36214756';
?>
<div class="btn-group">
    <a href="<?php echo $_smarty_tpl->tpl_vars['formurl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['viewname']->value;?>
/action/delete/#ID#" class="btn btn-danger">
        <i class="fa fa-remove"></i> <?php $_smarty_tpl->smarty->_tag_stack[] = array('admlang', array()); $_block_repeat=true; echo smarty_block_lang_adm(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
lbl_delete<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang_adm(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </a>
</div><?php }
}
?>