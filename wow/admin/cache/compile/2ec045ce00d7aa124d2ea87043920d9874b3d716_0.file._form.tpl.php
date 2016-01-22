<?php /* Smarty version 3.1.27, created on 2016-01-22 18:34:15
         compiled from "C:\wamp\www\wow\wow\admin\_templates\views\_form.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1828756a268171cc6d5_03231728%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ec045ce00d7aa124d2ea87043920d9874b3d716' => 
    array (
      0 => 'C:\\wamp\\www\\wow\\wow\\admin\\_templates\\views\\_form.tpl',
      1 => 1453484020,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1828756a268171cc6d5_03231728',
  'variables' => 
  array (
    'arrTabs' => 0,
    'arrTab' => 0,
    'arrField' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56a268173a9045_34138978',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56a268173a9045_34138978')) {
function content_56a268173a9045_34138978 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1828756a268171cc6d5_03231728';
?>
<div class="tabbable">
    <ul class="tabs nav nav-tabs">
        <?php
$_from = $_smarty_tpl->tpl_vars['arrTabs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['arrTab'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['arrTab']->_loop = false;
$_smarty_tpl->tpl_vars['arrTab']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['arrTab']->value) {
$_smarty_tpl->tpl_vars['arrTab']->_loop = true;
$_smarty_tpl->tpl_vars['arrTab']->iteration++;
$_smarty_tpl->tpl_vars['arrTab']->first = $_smarty_tpl->tpl_vars['arrTab']->iteration == 1;
$foreach_arrTab_Sav = $_smarty_tpl->tpl_vars['arrTab'];
?>
            <li class="<?php if ($_smarty_tpl->tpl_vars['arrTab']->first) {?>active<?php }?>"><a data-toggle="tab" href="#<?php echo $_smarty_tpl->tpl_vars['arrTab']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['arrTab']->value['title'];?>
</a></li>
            <?php
$_smarty_tpl->tpl_vars['arrTab'] = $foreach_arrTab_Sav;
}
?>
    </ul>
    <div class="tab-content tabs-flat">
        <?php
$_from = $_smarty_tpl->tpl_vars['arrTabs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['arrTab'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['arrTab']->_loop = false;
$_smarty_tpl->tpl_vars['arrTab']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['arrTab']->value) {
$_smarty_tpl->tpl_vars['arrTab']->_loop = true;
$_smarty_tpl->tpl_vars['arrTab']->iteration++;
$_smarty_tpl->tpl_vars['arrTab']->first = $_smarty_tpl->tpl_vars['arrTab']->iteration == 1;
$foreach_arrTab_Sav = $_smarty_tpl->tpl_vars['arrTab'];
?>
            <div id="<?php echo $_smarty_tpl->tpl_vars['arrTab']->value['name'];?>
" class="tab-pane <?php if ($_smarty_tpl->tpl_vars['arrTab']->first) {?>in active<?php }?>">
                <?php
$_from = $_smarty_tpl->tpl_vars['arrTab']->value['arrFields'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['arrField'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['arrField']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['arrField']->value) {
$_smarty_tpl->tpl_vars['arrField']->_loop = true;
$foreach_arrField_Sav = $_smarty_tpl->tpl_vars['arrField'];
?>
                    <div class="form-group flexform">
                        <?php if ($_smarty_tpl->tpl_vars['arrField']->value['label'] != '') {?>
                            <label for="field_<?php echo $_smarty_tpl->tpl_vars['arrField']->value['name'];?>
" class="clearfix blocklabel"><?php echo $_smarty_tpl->tpl_vars['arrField']->value['label'];?>
</label>
                        <?php }?>
                        <div class="clearfix blockfield">
                            <?php echo $_smarty_tpl->tpl_vars['arrField']->value['field'];?>

                        </div>
                    </div>
                <?php
$_smarty_tpl->tpl_vars['arrField'] = $foreach_arrField_Sav;
}
?>
            </div>
        <?php
$_smarty_tpl->tpl_vars['arrTab'] = $foreach_arrTab_Sav;
}
?>
    </div>
</div>
<button type="submit" class="btn btn-default"><?php $_smarty_tpl->smarty->_tag_stack[] = array('admlang', array()); $_block_repeat=true; echo smarty_block_lang_adm(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
lbl_add<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang_adm(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</button><?php }
}
?>