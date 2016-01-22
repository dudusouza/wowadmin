<?php /* Smarty version 3.1.27, created on 2016-01-22 19:59:41
         compiled from "C:\wamp\www\wow\wow\admin\_templates\form\money.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2512956a27c1de313a2_57506757%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b921c130bed78ab61f9cd9f20ce6666bcda59db3' => 
    array (
      0 => 'C:\\wamp\\www\\wow\\wow\\admin\\_templates\\form\\money.tpl',
      1 => 1452800158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2512956a27c1de313a2_57506757',
  'variables' => 
  array (
    'width' => 0,
    'name' => 0,
    'value' => 0,
    'length' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56a27c1ded54c2_84601937',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56a27c1ded54c2_84601937')) {
function content_56a27c1ded54c2_84601937 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2512956a27c1de313a2_57506757';
?>
<div class="col-sm-<?php echo $_smarty_tpl->tpl_vars['width']->value;?>
">
    <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"  id="field_<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" class="money form-control" value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" maxlength="<?php echo $_smarty_tpl->tpl_vars['length']->value;?>
" />
</div><?php }
}
?>