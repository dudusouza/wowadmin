<?php /* Smarty version 3.1.27, created on 2016-01-22 18:17:37
         compiled from "C:\wamp\www\wow\wow\admin\_templates\widgets\update.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1193956a2643185fcb9_50513519%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db421652aa2bfb33daf870d957eab83dfa6ac97f' => 
    array (
      0 => 'C:\\wamp\\www\\wow\\wow\\admin\\_templates\\widgets\\update.tpl',
      1 => 1453483056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1193956a2643185fcb9_50513519',
  'variables' => 
  array (
    'formurl' => 0,
    'viewname' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56a264318fc0e4_54650279',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56a264318fc0e4_54650279')) {
function content_56a264318fc0e4_54650279 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1193956a2643185fcb9_50513519';
?>
<div class="btn-group">
    <a href="<?php echo $_smarty_tpl->tpl_vars['formurl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['viewname']->value;?>
/#ID#" class="btn btn-primary">
        <i class="fa fa-edit"></i> <?php $_smarty_tpl->smarty->_tag_stack[] = array('admlang', array()); $_block_repeat=true; echo smarty_block_lang_adm(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
lbl_update<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang_adm(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </a>
</div><?php }
}
?>