<?php /* Smarty version 3.1.27, created on 2016-01-21 18:09:02
         compiled from "C:\wamp\www\wow\wow\admin\_templates\widgets\insert.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1712156a110aea54f01_67744814%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c3c3cd149a429ef3f97fbdba2707775f798380a' => 
    array (
      0 => 'C:\\wamp\\www\\wow\\wow\\admin\\_templates\\widgets\\insert.tpl',
      1 => 1453396136,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1712156a110aea54f01_67744814',
  'variables' => 
  array (
    'formurl' => 0,
    'viewname' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56a110aea93714_34514524',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56a110aea93714_34514524')) {
function content_56a110aea93714_34514524 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1712156a110aea54f01_67744814';
?>
<div class="btn-group">
    <a href="<?php echo $_smarty_tpl->tpl_vars['formurl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['viewname']->value;?>
" class="btn btn-success">
        <i class="fa fa-plus"></i> <?php $_smarty_tpl->smarty->_tag_stack[] = array('admlang', array()); $_block_repeat=true; echo smarty_block_lang_adm(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
lbl_add<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang_adm(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </a>
</div><?php }
}
?>