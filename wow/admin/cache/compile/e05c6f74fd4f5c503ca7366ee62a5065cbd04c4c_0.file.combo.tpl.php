<?php /* Smarty version 3.1.27, created on 2016-01-22 20:26:56
         compiled from "C:\wamp\www\wow\wow\admin\_templates\form\combo.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:84756a28280a62a01_78141034%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e05c6f74fd4f5c503ca7366ee62a5065cbd04c4c' => 
    array (
      0 => 'C:\\wamp\\www\\wow\\wow\\admin\\_templates\\form\\combo.tpl',
      1 => 1453490808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84756a28280a62a01_78141034',
  'variables' => 
  array (
    'width' => 0,
    'name' => 0,
    'arr' => 0,
    'k' => 0,
    'val' => 0,
    'valuecombo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56a28280b879d0_63345488',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56a28280b879d0_63345488')) {
function content_56a28280b879d0_63345488 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '84756a28280a62a01_78141034';
?>
<div class="col-sm-<?php echo $_smarty_tpl->tpl_vars['width']->value;?>
">
    <select type="text" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" id="field_<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" class="form-control col-md-<?php echo $_smarty_tpl->tpl_vars['width']->value;?>
">
        <option></option>
        <?php
$_from = $_smarty_tpl->tpl_vars['arr']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['valuecombo'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['valuecombo']->_loop = false;
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['valuecombo']->value) {
$_smarty_tpl->tpl_vars['valuecombo']->_loop = true;
$foreach_valuecombo_Sav = $_smarty_tpl->tpl_vars['valuecombo'];
?>
            <option <?php ob_start();
echo $_smarty_tpl->tpl_vars['k']->value;
$_tmp1=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['val']->value;
$_tmp2=ob_get_clean();
if ($_tmp1 == $_tmp2) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['valuecombo']->value;?>
</option>
        <?php
$_smarty_tpl->tpl_vars['valuecombo'] = $foreach_valuecombo_Sav;
}
?>
    </select>
</div><?php }
}
?>