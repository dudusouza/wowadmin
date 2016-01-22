<?php /* Smarty version 3.1.27, created on 2016-01-21 17:21:48
         compiled from "C:\wamp\www\wow\app\protected\viewadmin\structure\top.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:184156a1059c50ced6_77073206%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6175d9d96ae0b1f74063e847246ec91d74cda1e0' => 
    array (
      0 => 'C:\\wamp\\www\\wow\\app\\protected\\viewadmin\\structure\\top.tpl',
      1 => 1453393306,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184156a1059c50ced6_77073206',
  'variables' => 
  array (
    'URL_ASSETS' => 0,
    'admmenu' => 0,
    'arrmenu' => 0,
    'SITE_ADMIN' => 0,
    'arrsubmenu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56a1059c9b84e6_82627187',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56a1059c9b84e6_82627187')) {
function content_56a1059c9b84e6_82627187 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '184156a1059c50ced6_77073206';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

    <!-- Head -->
    <head>
        <meta charset="utf-8" />
        <title>Wow Admin</title>

        <meta name="description" content="blank page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatbeible" content="IE=edge" />  
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
img/favicon.png" type="image/x-icon">

            <!--Basic Styles-->
            <link href="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
css/bootstrap.min.css" rel="stylesheet" />
            <link id="bootstrap-rtl-link" href="#" rel="stylesheet" />
            <link href="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
css/font-awesome.min.css" rel="stylesheet" />
            <link href="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
css/weather-icons.min.css" rel="stylesheet" />

            <!--Fonts-->
            <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300"
                  rel="stylesheet" type="text/css">

                <!--Beyond styles-->
                <link href="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
css/beyond.min.css" rel="stylesheet" />
                <link href="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
css/demo.min.css" rel="stylesheet" />
                <link href="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
css/typicons.min.css" rel="stylesheet" />
                <link href="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
css/animate.min.css" rel="stylesheet" />
                <link id="skin-link" href="#" rel="stylesheet" type="text/css" />

                <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->

                <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
js/jquery.min.js"><?php echo '</script'; ?>
>
                <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
js/skins.min.js"><?php echo '</script'; ?>
>
                </head>
                <!-- /Head -->
                <!-- Body -->
                <body>
                    <!-- Loading Container -->
                    <div class="loading-container">
                        <div class="loader"></div>
                    </div>
                    <!--  /Loading Container -->
                    <!-- Navbar -->
                    <div class="navbar">
                        <div class="navbar-inner">
                            <div class="navbar-container">
                                <!-- Navbar Barnd -->
                                <div class="navbar-header pull-left">
                                    <a href="#" class="navbar-brand">
                                        <small>
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
img/logo.png" alt="" />
                                        </small>
                                    </a>
                                </div>
                                <!-- /Navbar Barnd -->
                                <!-- Sidebar Collapse -->
                                <div class="sidebar-collapse" id="sidebar-collapse">
                                    <i class="collapse-icon fa fa-bars"></i>
                                </div>
                                <!-- /Sidebar Collapse -->
                                <!-- Account Area and Settings --->
                                <div class="navbar-header pull-right">
                                    <div class="navbar-account">
                                        <ul class="account-area">
                                            <li>
                                                <a class=" dropdown-toggle" data-toggle="dropdown" title="Help" href="#">
                                                    <i class="icon fa fa-warning" title="<?php $_smarty_tpl->smarty->_tag_stack[] = array('admlang', array()); $_block_repeat=true; echo smarty_block_lang_adm(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
lbl_site_error<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang_adm(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"></i>
                                                </a>
                                                <!--Notification Dropdown-->
                                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-notifications">
                                                    <li>
                                                        <a href="#">
                                                            <div class="clearfix">
                                                                <div class="notification-icon">
                                                                    <i class="fa fa-phone bg-themeprimary white"></i>
                                                                </div>
                                                                <div class="notification-body">
                                                                    <span class="title">Skype meeting with Patty</span>
                                                                    <span class="description">01:00 pm</span>
                                                                </div>
                                                                <div class="notification-extra">
                                                                    <i class="fa fa-clock-o themeprimary"></i>
                                                                    <span class="description">office</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="clearfix">
                                                                <div class="notification-icon">
                                                                    <i class="fa fa-check bg-darkorange white"></i>
                                                                </div>
                                                                <div class="notification-body">
                                                                    <span class="title">Uncharted break</span>
                                                                    <span class="description">03:30 pm - 05:15 pm</span>
                                                                </div>
                                                                <div class="notification-extra">
                                                                    <i class="fa fa-clock-o darkorange"></i>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="clearfix">
                                                                <div class="notification-icon">
                                                                    <i class="fa fa-gift bg-warning white"></i>
                                                                </div>
                                                                <div class="notification-body">
                                                                    <span class="title">Kate birthday party</span>
                                                                    <span class="description">08:30 pm</span>
                                                                </div>
                                                                <div class="notification-extra">
                                                                    <i class="fa fa-calendar warning"></i>
                                                                    <i class="fa fa-clock-o warning"></i>
                                                                    <span class="description">at home</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <div class="clearfix">
                                                                <div class="notification-icon">
                                                                    <i class="fa fa-glass bg-success white"></i>
                                                                </div>
                                                                <div class="notification-body">
                                                                    <span class="title">Dinner with friends</span>
                                                                    <span class="description">10:30 pm</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="dropdown-footer ">
                                                        <span>
                                                            Today, March 28
                                                        </span>
                                                        <span class="pull-right">
                                                            10°c
                                                            <i class="wi wi-cloudy"></i>
                                                        </span>
                                                    </li>
                                                </ul>
                                                <!--/Notification Dropdown-->
                                            </li>
                                            <li>
                                                <a class="dropdown-toggle" data-toggle="dropdown" title="<?php $_smarty_tpl->smarty->_tag_stack[] = array('admlang', array()); $_block_repeat=true; echo smarty_block_lang_adm(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
lbl_contacts<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang_adm(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" href="#">
                                                    <i class="icon fa fa-envelope"></i>
                                                    <span class="badge">3</span>
                                                </a>
                                                <!--Messages Dropdown-->
                                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-messages">
                                                    <li>
                                                        <a href="#">
                                                            <img src="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
img/avatars/divyia.jpg" class="message-avatar" alt="Divyia Austin">
                                                                <div class="message">
                                                                    <span class="message-sender">
                                                                        Divyia Austin
                                                                    </span>
                                                                    <span class="message-time">
                                                                        2 minutes ago
                                                                    </span>
                                                                    <span class="message-subject">
                                                                        Here's the recipe for apple pie
                                                                    </span>
                                                                    <span class="message-body">
                                                                        to identify the sending application when the senders image is shown for the main icon
                                                                    </span>
                                                                </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
img/avatars/bing.png" class="message-avatar" alt="Microsoft Bing">
                                                                <div class="message">
                                                                    <span class="message-sender">
                                                                        Bing.com
                                                                    </span>
                                                                    <span class="message-time">
                                                                        Yesterday
                                                                    </span>
                                                                    <span class="message-subject">
                                                                        Bing Newsletter: The January Issue‏
                                                                    </span>
                                                                    <span class="message-body">
                                                                        Discover new music just in time for the Grammy® Awards.
                                                                    </span>
                                                                </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
img/avatars/adam-jansen.jpg" class="message-avatar" alt="Divyia Austin">
                                                                <div class="message">
                                                                    <span class="message-sender">
                                                                        Nicolas
                                                                    </span>
                                                                    <span class="message-time">
                                                                        Friday, September 22
                                                                    </span>
                                                                    <span class="message-subject">
                                                                        New 4K Cameras
                                                                    </span>
                                                                    <span class="message-body">
                                                                        The 4K revolution has come over the horizon and is reaching the general populous
                                                                    </span>
                                                                </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!--/Messages Dropdown-->
                                            </li>

                                            <li>
                                                <a class="dropdown-toggle" data-toggle="dropdown" title="<?php $_smarty_tpl->smarty->_tag_stack[] = array('admlang', array()); $_block_repeat=true; echo smarty_block_lang_adm(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
lbl_last_reports<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang_adm(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" href="#">
                                                    <i class="icon fa fa-tasks"></i>
                                                    <span class="badge">4</span>
                                                </a>
                                                <!--Tasks Dropdown-->
                                                <ul class="pull-right dropdown-menu dropdown-tasks dropdown-arrow ">
                                                    <li class="dropdown-header bordered-darkorange">
                                                        <i class="fa fa-tasks"></i>
                                                        4 Tasks In Progress
                                                    </li>

                                                    <li>
                                                        <a href="#">
                                                            <div class="clearfix">
                                                                <span class="pull-left">Account Creation</span>
                                                                <span class="pull-right">65%</span>
                                                            </div>

                                                            <div class="progress progress-xs">
                                                                <div style="width:65%" class="progress-bar"></div>
                                                            </div>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="#">
                                                            <div class="clearfix">
                                                                <span class="pull-left">Profile Data</span>
                                                                <span class="pull-right">35%</span>
                                                            </div>

                                                            <div class="progress progress-xs">
                                                                <div style="width:35%" class="progress-bar progress-bar-success"></div>
                                                            </div>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="#">
                                                            <div class="clearfix">
                                                                <span class="pull-left">Updating Resume</span>
                                                                <span class="pull-right">75%</span>
                                                            </div>

                                                            <div class="progress progress-xs">
                                                                <div style="width:75%" class="progress-bar progress-bar-darkorange"></div>
                                                            </div>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="#">
                                                            <div class="clearfix">
                                                                <span class="pull-left">Adding Contacts</span>
                                                                <span class="pull-right">10%</span>
                                                            </div>

                                                            <div class="progress progress-xs">
                                                                <div style="width:10%" class="progress-bar progress-bar-warning"></div>
                                                            </div>
                                                        </a>
                                                    </li>

                                                    <li class="dropdown-footer">
                                                        <a href="#">
                                                            See All Tasks
                                                        </a>
                                                        <button class="btn btn-xs btn-default shiny darkorange icon-only pull-right"><i class="fa fa-check"></i></button>
                                                    </li>
                                                </ul>
                                                <!--/Tasks Dropdown-->
                                            </li>
                                            <li>
                                                <a class="wave in" id="chat-link" title="<?php $_smarty_tpl->smarty->_tag_stack[] = array('admlang', array()); $_block_repeat=true; echo smarty_block_lang_adm(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
lbl_chat<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang_adm(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" href="#">
                                                    <i class="icon glyphicon glyphicon-comment"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                                    <div class="avatar" title="View your public profile">
                                                        <img src="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
img/avatars/adam-jansen.jpg">
                                                    </div>
                                                    <section>
                                                        <h2><span class="profile"><span>David Stevenson</span></span></h2>
                                                    </section>
                                                </a>
                                                <!--Login Area Dropdown-->
                                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                                    <li class="username"><a>David Stevenson</a></li>
                                                    <li class="email"><a>David.Stevenson@live.com</a></li>
                                                    <!--Avatar Area-->
                                                    <li>
                                                        <div class="avatar-area">
                                                            <img src="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
img/avatars/adam-jansen.jpg" class="avatar">
                                                                <span class="caption">Change Photo</span>
                                                        </div>
                                                    </li>
                                                    <!--Avatar Area-->
                                                    <li class="edit">
                                                        <a href="profile.html" class="pull-left">Profile</a>
                                                        <a href="#" class="pull-right">Setting</a>
                                                    </li>
                                                    <!--Theme Selector Area-->
                                                    <li class="theme-area">
                                                        <ul class="colorpicker" id="skin-changer">
                                                            <li><a class="colorpick-btn" href="#" style="background-color:#5DB2FF;" rel="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
css/skins/blue.min.css"></a></li>
                                                            <li><a class="colorpick-btn" href="#" style="background-color:#2dc3e8;" rel="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
css/skins/azure.min.css"></a></li>
                                                            <li><a class="colorpick-btn" href="#" style="background-color:#03B3B2;" rel="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
css/skins/teal.min.css"></a></li>
                                                            <li><a class="colorpick-btn" href="#" style="background-color:#53a93f;" rel="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
css/skins/green.min.css"></a></li>
                                                            <li><a class="colorpick-btn" href="#" style="background-color:#FF8F32;" rel="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
css/skins/orange.min.css"></a></li>
                                                            <li><a class="colorpick-btn" href="#" style="background-color:#cc324b;" rel="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
css/skins/pink.min.css"></a></li>
                                                            <li><a class="colorpick-btn" href="#" style="background-color:#AC193D;" rel="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
css/skins/darkred.min.css"></a></li>
                                                            <li><a class="colorpick-btn" href="#" style="background-color:#8C0095;" rel="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
css/skins/purple.min.css"></a></li>
                                                            <li><a class="colorpick-btn" href="#" style="background-color:#0072C6;" rel="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
css/skins/darkblue.min.css"></a></li>
                                                            <li><a class="colorpick-btn" href="#" style="background-color:#585858;" rel="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
css/skins/gray.min.css"></a></li>
                                                            <li><a class="colorpick-btn" href="#" style="background-color:#474544;" rel="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
css/skins/black.min.css"></a></li>
                                                            <li><a class="colorpick-btn" href="#" style="background-color:#001940;" rel="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
css/skins/deepblue.min.css"></a></li>
                                                        </ul>
                                                    </li>
                                                    <!--/Theme Selector Area-->
                                                    <li class="dropdown-footer">
                                                        <a href="login.html">
                                                            Sign out
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!--/Login Area Dropdown-->
                                            </li>
                                            <!-- /Account Area -->
                                            <!--Note: notice that setting div must start right after account area list.
                                            no space must be between these elements-->
                                            <!-- Settings -->
                                        </ul><div class="setting">
                                            <a id="btn-setting" title="Setting" href="#">
                                                <i class="icon glyphicon glyphicon-cog"></i>
                                            </a>
                                        </div><div class="setting-container">
                                            <label>
                                                <input type="checkbox" id="checkbox_fixednavbar">
                                                    <span class="text">Fixed Navbar</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" id="checkbox_fixedsidebar">
                                                    <span class="text">Fixed SideBar</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" id="checkbox_fixedbreadcrumbs">
                                                    <span class="text">Fixed BreadCrumbs</span>
                                            </label>
                                            <label>
                                                <input type="checkbox" id="checkbox_fixedheader">
                                                    <span class="text">Fixed Header</span>
                                            </label>
                                        </div>
                                        <!-- Settings -->
                                    </div>
                                </div>
                                <!-- /Account Area and Settings -->
                            </div>
                        </div>
                    </div>
                    <!-- /Navbar -->
                    <!-- Main Container -->
                    <div class="main-container container-fluid">
                        <!-- Page Container -->
                        <div class="page-container">
                            <!-- Page Sidebar -->
                            <div class="page-sidebar" id="sidebar">
                                <!-- Page Sidebar Header-->
                                <div class="sidebar-header-wrapper">
                                    <input type="text" class="searchinput" />
                                    <i class="searchicon fa fa-search"></i>
                                    <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
                                </div>
                                <!-- /Page Sidebar Header -->
                                <!-- Sidebar Menu -->
                                <ul class="nav sidebar-menu">
                                    <!--Dashboard-->
                                    <li>
                                        <a href="index-2.html">
                                            <i class="menu-icon glyphicon glyphicon-home"></i>
                                            <span class="menu-text"> Dashboard </span>
                                        </a>
                                    </li>
                                    <?php
$_from = $_smarty_tpl->tpl_vars['admmenu']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['arrmenu'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['arrmenu']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['arrmenu']->value) {
$_smarty_tpl->tpl_vars['arrmenu']->_loop = true;
$foreach_arrmenu_Sav = $_smarty_tpl->tpl_vars['arrmenu'];
?>
                                        <!--UI Elements-->
                                        <li>
                                            <a href="#" class="menu-dropdown">
                                                <span class="menu-text"><?php echo $_smarty_tpl->tpl_vars['arrmenu']->value['menu']['name'];?>
</span>
                                                <i class="menu-expand"></i>
                                            </a>

                                            <ul class="submenu"> 
                                                <?php
$_from = $_smarty_tpl->tpl_vars['arrmenu']->value['sub'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['arrsubmenu'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['arrsubmenu']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['arrsubmenu']->value) {
$_smarty_tpl->tpl_vars['arrsubmenu']->_loop = true;
$foreach_arrsubmenu_Sav = $_smarty_tpl->tpl_vars['arrsubmenu'];
?>
                                                    <li>
                                                        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_ADMIN']->value;
echo $_smarty_tpl->tpl_vars['arrsubmenu']->value['menu']['nick'];?>
">
                                                            <span class="menu-text"><?php echo $_smarty_tpl->tpl_vars['arrsubmenu']->value['menu']['name'];?>
</span>
                                                        </a>
                                                    </li>
                                                <?php
$_smarty_tpl->tpl_vars['arrsubmenu'] = $foreach_arrsubmenu_Sav;
}
?>
                                            </ul>
                                        </li>
                                    <?php
$_smarty_tpl->tpl_vars['arrmenu'] = $foreach_arrmenu_Sav;
}
?>
                                </ul>
                                <!-- /Sidebar Menu -->
                            </div>
                            <!-- /Page Sidebar -->
                            <!-- Chat Bar -->
                            <div id="chatbar" class="page-chatbar">
                                <div class="chatbar-contacts">
                                    <div class="contacts-search">
                                        <input type="text" class="searchinput" placeholder="Search Contacts" />
                                        <i class="searchicon fa fa-search"></i>
                                        <div class="searchhelper">Search Your Contacts and Chat History</div>
                                    </div>
                                    <ul class="contacts-list">
                                        <li class="contact">
                                            <div class="contact-avatar">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
img/avatars/divyia.jpg" />
                                            </div>
                                            <div class="contact-info">
                                                <div class="contact-name">Divyia Philips</div>
                                                <div class="contact-status">
                                                    <div class="online"></div>
                                                    <div class="status">online</div>
                                                </div>
                                                <div class="last-chat-time">
                                                    last week
                                                </div>
                                            </div>
                                        </li>
                                        <li class="contact">
                                            <div class="contact-avatar">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
img/avatars/Nicolai-Larson.jpg" />
                                            </div>
                                            <div class="contact-info">
                                                <div class="contact-name">Adam Johnson</div>
                                                <div class="contact-status">
                                                    <div class="offline"></div>
                                                    <div class="status">left 4 mins ago</div>
                                                </div>
                                                <div class="last-chat-time">
                                                    today
                                                </div>
                                            </div>
                                        </li>
                                        <li class="contact">
                                            <div class="contact-avatar">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
img/avatars/John-Smith.jpg" />
                                            </div>
                                            <div class="contact-info">
                                                <div class="contact-name">John Smith</div>
                                                <div class="contact-status">
                                                    <div class="online"></div>
                                                    <div class="status">online</div>
                                                </div>
                                                <div class="last-chat-time">
                                                    1:57 am
                                                </div>
                                            </div>
                                        </li>
                                        <li class="contact">
                                            <div class="contact-avatar">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
img/avatars/Osvaldus-Valutis.jpg" />
                                            </div>
                                            <div class="contact-info">
                                                <div class="contact-name">Osvaldus Valutis</div>
                                                <div class="contact-status">
                                                    <div class="online"></div>
                                                    <div class="status">online</div>
                                                </div>
                                                <div class="last-chat-time">
                                                    today
                                                </div>
                                            </div>
                                        </li>
                                        <li class="contact">
                                            <div class="contact-avatar">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
img/avatars/Javi-Jimenez.jpg" />
                                            </div>
                                            <div class="contact-info">
                                                <div class="contact-name">Javi Jimenez</div>
                                                <div class="contact-status">
                                                    <div class="online"></div>
                                                    <div class="status">online</div>
                                                </div>
                                                <div class="last-chat-time">
                                                    today
                                                </div>
                                            </div>
                                        </li>
                                        <li class="contact">
                                            <div class="contact-avatar">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
img/avatars/Stephanie-Walter.jpg" />
                                            </div>
                                            <div class="contact-info">
                                                <div class="contact-name">Stephanie Walter</div>
                                                <div class="contact-status">
                                                    <div class="online"></div>
                                                    <div class="status">online</div>
                                                </div>
                                                <div class="last-chat-time">
                                                    yesterday
                                                </div>
                                            </div>
                                        </li>
                                        <li class="contact">
                                            <div class="contact-avatar">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
img/avatars/Sergey-Azovskiy.jpg" />
                                            </div>
                                            <div class="contact-info">
                                                <div class="contact-name">Sergey Azovskiy</div>
                                                <div class="contact-status">
                                                    <div class="offline"></div>
                                                    <div class="status">offline since oct 24</div>
                                                </div>
                                                <div class="last-chat-time">
                                                    22 oct
                                                </div>
                                            </div>
                                        </li>
                                        <li class="contact">
                                            <div class="contact-avatar">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
img/avatars/Lee-Munroe.jpg" />
                                            </div>
                                            <div class="contact-info">
                                                <div class="contact-name">Lee Munroe</div>
                                                <div class="contact-status">
                                                    <div class="online"></div>
                                                    <div class="status">online</div>
                                                </div>
                                                <div class="last-chat-time">
                                                    today
                                                </div>
                                            </div>
                                        </li>
                                        <li class="contact">
                                            <div class="contact-avatar">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
img/avatars/divyia.jpg" />
                                            </div>
                                            <div class="contact-info">
                                                <div class="contact-name">Divyia Philips</div>
                                                <div class="contact-status">
                                                    <div class="online"></div>
                                                    <div class="status">online</div>
                                                </div>
                                                <div class="last-chat-time">
                                                    last week
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="chatbar-messages" style="display: none;">
                                    <div class="messages-contact">
                                        <div class="contact-avatar">
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
img/avatars/divyia.jpg" />
                                        </div>
                                        <div class="contact-info">
                                            <div class="contact-name">Divyia Philips</div>
                                            <div class="contact-status">
                                                <div class="online"></div>
                                                <div class="status">online</div>
                                            </div>
                                            <div class="last-chat-time">
                                                a moment ago
                                            </div>
                                            <div class="back">
                                                <i class="fa fa-arrow-circle-left"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="messages-list">
                                        <li class="message">
                                            <div class="message-info">
                                                <div class="bullet"></div>
                                                <div class="contact-name">Me</div>
                                                <div class="message-time">10:14 AM, Today</div>
                                            </div>
                                            <div class="message-body">
                                                Hi, Hope all is good. Are we meeting today?
                                            </div>
                                        </li>
                                        <li class="message reply">
                                            <div class="message-info">
                                                <div class="bullet"></div>
                                                <div class="contact-name">Divyia</div>
                                                <div class="message-time">10:15 AM, Today</div>
                                            </div>
                                            <div class="message-body">
                                                Hi, Hope all is good. Are we meeting today?
                                            </div>
                                        </li>
                                        <li class="message">
                                            <div class="message-info">
                                                <div class="bullet"></div>
                                                <div class="contact-name">Me</div>
                                                <div class="message-time">10:14 AM, Today</div>
                                            </div>
                                            <div class="message-body">
                                                Hi, Hope all is good. Are we meeting today?
                                            </div>
                                        </li>
                                        <li class="message reply">
                                            <div class="message-info">
                                                <div class="bullet"></div>
                                                <div class="contact-name">Divyia</div>
                                                <div class="message-time">10:15 AM, Today</div>
                                            </div>
                                            <div class="message-body">
                                                Hi, Hope all is good. Are we meeting today?
                                            </div>
                                        </li>
                                        <li class="message">
                                            <div class="message-info">
                                                <div class="bullet"></div>
                                                <div class="contact-name">Me</div>
                                                <div class="message-time">10:14 AM, Today</div>
                                            </div>
                                            <div class="message-body">
                                                Hi, Hope all is good. Are we meeting today?
                                            </div>
                                        </li>
                                        <li class="message reply">
                                            <div class="message-info">
                                                <div class="bullet"></div>
                                                <div class="contact-name">Divyia</div>
                                                <div class="message-time">10:15 AM, Today</div>
                                            </div>
                                            <div class="message-body">
                                                Hi, Hope all is good. Are we meeting today?
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="send-message">
                                        <span class="input-icon icon-right">
                                            <textarea rows="4" class="form-control" placeholder="Type your message"></textarea>
                                            <i class="fa fa-camera themeprimary"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- /Chat Bar -->
                            <!-- Page Content -->
                            <div class="page-content"><?php }
}
?>