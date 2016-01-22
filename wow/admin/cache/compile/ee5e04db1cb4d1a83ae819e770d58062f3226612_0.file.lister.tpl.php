<?php /* Smarty version 3.1.27, created on 2016-01-22 17:21:23
         compiled from "C:\wamp\www\wow\wow\admin\_templates\views\lister.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1087156a257030a3499_40136390%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee5e04db1cb4d1a83ae819e770d58062f3226612' => 
    array (
      0 => 'C:\\wamp\\www\\wow\\wow\\admin\\_templates\\views\\lister.tpl',
      1 => 1453479679,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1087156a257030a3499_40136390',
  'variables' => 
  array (
    'widegetdefault' => 0,
    'widegettableleft' => 0,
    'arrColumns' => 0,
    'column' => 0,
    'widegettable' => 0,
    'arrData' => 0,
    'data' => 0,
    'k' => 0,
    'dataitem' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56a257036296d9_91128552',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56a257036296d9_91128552')) {
function content_56a257036296d9_91128552 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once 'C:\\wamp\\www\\wow\\wow\\lib\\Smarty\\plugins\\modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '1087156a257030a3499_40136390';
?>
<hr>
<div class="row">
    <div class="col-md-6">
        <?php echo $_smarty_tpl->tpl_vars['widegetdefault']->value;?>

    </div>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <?php if ($_smarty_tpl->tpl_vars['widegettableleft']->value != '') {?>
                <th></th>
                <?php }?>
                <?php
$_from = $_smarty_tpl->tpl_vars['arrColumns']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['column'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['column']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
$foreach_column_Sav = $_smarty_tpl->tpl_vars['column'];
?>
                <th><?php echo $_smarty_tpl->tpl_vars['column']->value;?>
</th>
                <?php
$_smarty_tpl->tpl_vars['column'] = $foreach_column_Sav;
}
?>
                <?php if ($_smarty_tpl->tpl_vars['widegettable']->value != '') {?>
                <th><?php $_smarty_tpl->smarty->_tag_stack[] = array('admlang', array()); $_block_repeat=true; echo smarty_block_lang_adm(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
title_actions<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang_adm(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</th>
                <?php }?>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->tpl_vars['arrData']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['data']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
$foreach_data_Sav = $_smarty_tpl->tpl_vars['data'];
?>
            <tr>
                <?php if ($_smarty_tpl->tpl_vars['widegettableleft']->value != '') {?>
                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['data']->value['__wow__pkname__'];
$_tmp1=ob_get_clean();
echo smarty_modifier_replace($_smarty_tpl->tpl_vars['widegettableleft']->value,"#ID#",$_tmp1);?>
</td>
                <?php }?>
                <?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['dataitem'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['dataitem']->_loop = false;
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['dataitem']->value) {
$_smarty_tpl->tpl_vars['dataitem']->_loop = true;
$foreach_dataitem_Sav = $_smarty_tpl->tpl_vars['dataitem'];
?>
                    <?php if ($_smarty_tpl->tpl_vars['k']->value != '__wow__pkname__') {?>
                        <td><?php echo $_smarty_tpl->tpl_vars['dataitem']->value;?>
</td>
                    <?php }?>
                <?php
$_smarty_tpl->tpl_vars['dataitem'] = $foreach_dataitem_Sav;
}
?>
                <?php if ($_smarty_tpl->tpl_vars['widegettable']->value != '') {?>
                    <td><?php ob_start();
echo $_smarty_tpl->tpl_vars['data']->value['__wow__pkname__'];
$_tmp2=ob_get_clean();
echo smarty_modifier_replace($_smarty_tpl->tpl_vars['widegettable']->value,"#ID#",$_tmp2);?>
</td>
                <?php }?>
            </tr>
        <?php
$_smarty_tpl->tpl_vars['data'] = $foreach_data_Sav;
}
?>
    </tbody>
</table><?php }
}
?>