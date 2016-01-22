<?php /* Smarty version 3.1.27, created on 2016-01-14 20:28:24
         compiled from "C:\wamp\www\wow\app\protected\viewadmin\form.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:280355697f6d868e687_40212426%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '994472fdbe53cca1a62ab297d9eb97bab46f67e5' => 
    array (
      0 => 'C:\\wamp\\www\\wow\\app\\protected\\viewadmin\\form.tpl',
      1 => 1452799702,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '280355697f6d868e687_40212426',
  'variables' => 
  array (
    'menuname' => 0,
    'form' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5697f6d878c549_32491118',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5697f6d878c549_32491118')) {
function content_5697f6d878c549_32491118 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '280355697f6d868e687_40212426';
echo $_smarty_tpl->getSubTemplate ("structure/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<!-- Page Breadcrumb -->
<div class="page-breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="/">Dashboard</a>
        </li>
        <li class="active"><?php echo $_smarty_tpl->tpl_vars['menuname']->value;?>
</li>
    </ul>
</div>
<!-- /Page Breadcrumb -->
<!-- Page Header -->
<div class="page-header position-relative">
    <div class="header-title">
        <h1><?php echo $_smarty_tpl->tpl_vars['menuname']->value;?>
</h1>
    </div>
    <!--Header Buttons-->
    <div class="header-buttons">
        <a class="sidebar-toggler" href="#">
            <i class="fa fa-arrows-h"></i>
        </a>
        <a class="refresh" id="refresh-toggler" href="#">
            <i class="glyphicon glyphicon-refresh"></i>
        </a>
        <a class="fullscreen" id="fullscreen-toggler" href="#">
            <i class="glyphicon glyphicon-fullscreen"></i>
        </a>
    </div>
    <!--Header Buttons End-->
</div>
<!-- /Page Header -->
<!-- Page Body -->
<div class="page-body">
    <div class="widget">
        <div class="widget-header bordered-bottom bordered-themeprimary">
            <span class="widget-caption themeprimary"><?php echo $_smarty_tpl->tpl_vars['menuname']->value;?>
</span>
        </div><!--Widget Header-->
        <div class="widget-body">
            <div class="task-container">
                <?php echo $_smarty_tpl->tpl_vars['form']->value;?>

            </div>
        </div><!--Widget Body-->
    </div>
</div>
<!-- /Page Body -->
<?php echo $_smarty_tpl->getSubTemplate ("structure/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>