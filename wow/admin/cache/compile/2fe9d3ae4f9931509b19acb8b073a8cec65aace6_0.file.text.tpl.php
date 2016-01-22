<?php /* Smarty version 3.1.27, created on 2016-01-14 20:36:16
         compiled from "C:\wamp\www\wow\wow\admin\_templates\form\text.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:151045697f8b0430e43_60361342%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2fe9d3ae4f9931509b19acb8b073a8cec65aace6' => 
    array (
      0 => 'C:\\wamp\\www\\wow\\wow\\admin\\_templates\\form\\text.tpl',
      1 => 1452800125,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151045697f8b0430e43_60361342',
  'variables' => 
  array (
    'width' => 0,
    'name' => 0,
    'mask' => 0,
    'value' => 0,
    'length' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5697f8b0579093_33847075',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5697f8b0579093_33847075')) {
function content_5697f8b0579093_33847075 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '151045697f8b0430e43_60361342';
?>
<div class="col-sm-<?php echo $_smarty_tpl->tpl_vars['width']->value;?>
">
    <input type="text" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" id="field_<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" class="form-control <?php if ($_smarty_tpl->tpl_vars['mask']->value != null) {?>mask<?php }?>" <?php if ($_smarty_tpl->tpl_vars['mask']->value != null) {?>data-mask="<?php echo $_smarty_tpl->tpl_vars['mask']->value;?>
"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" maxlength="<?php echo $_smarty_tpl->tpl_vars['length']->value;?>
" />
</div><?php }
}
?>