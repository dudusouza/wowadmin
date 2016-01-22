<?php /* Smarty version 3.1.27, created on 2015-12-18 19:07:22
         compiled from "C:\wamp\www\wow\app\protected\viewadmin\home.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2915556744b5a39c569_11997372%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '275b21782dbb96309159e9a09ac176ab579bf6e8' => 
    array (
      0 => 'C:\\wamp\\www\\wow\\app\\protected\\viewadmin\\home.tpl',
      1 => 1450462005,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2915556744b5a39c569_11997372',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56744b5a6dc6a7_57261323',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56744b5a6dc6a7_57261323')) {
function content_56744b5a6dc6a7_57261323 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2915556744b5a39c569_11997372';
echo $_smarty_tpl->getSubTemplate ("structure/top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<!-- Page Breadcrumb -->
<div class="page-breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">More Pages</a>
        </li>
        <li class="active">Blank Page</li>
    </ul>
</div>
<!-- /Page Breadcrumb -->
<!-- Page Header -->
<div class="page-header position-relative">
    <div class="header-title">
        <h1>
            Blank Page
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
    <!-- Your Content Goes Here -->
</div>
<!-- /Page Body -->
<?php echo $_smarty_tpl->getSubTemplate ("structure/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>