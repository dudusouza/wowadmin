<?php /* Smarty version 3.1.27, created on 2016-01-20 21:29:25
         compiled from "C:\wamp\www\wow\wow\admin\_templates\widgets\deleteleft.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:8893569fee25bace80_80349792%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54468cede181b91418913bedbfe9e727ead87690' => 
    array (
      0 => 'C:\\wamp\\www\\wow\\wow\\admin\\_templates\\widgets\\deleteleft.tpl',
      1 => 1453321763,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8893569fee25bace80_80349792',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_569fee25bfb099_22386152',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_569fee25bfb099_22386152')) {
function content_569fee25bfb099_22386152 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '8893569fee25bace80_80349792';
?>
<div class="checkbox">
    <label>
        <input type="checkbox" class="delete-item" value="#ID#">
        <span class="text"></span>
    </label>
</div><?php }
}
?>