<?php /* Smarty version 3.1.27, created on 2016-01-21 17:21:48
         compiled from "C:\wamp\www\wow\app\protected\viewadmin\structure\footer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1179856a1059cac1f20_61056803%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19b82e20eadf96dbd5c92035a92d57ba371b49c8' => 
    array (
      0 => 'C:\\wamp\\www\\wow\\app\\protected\\viewadmin\\structure\\footer.tpl',
      1 => 1453393296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1179856a1059cac1f20_61056803',
  'variables' => 
  array (
    'URL_ASSETS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56a1059caf8a39_65151206',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56a1059caf8a39_65151206')) {
function content_56a1059caf8a39_65151206 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1179856a1059cac1f20_61056803';
?>
</div>
<!-- /Page Content -->
</div>
<!-- /Page Container -->
<!-- Main Container -->

</div>

<!--Basic Scripts-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
js/slimscroll/jquery.slimscroll.min.js"><?php echo '</script'; ?>
>

<!--Beyond Scripts-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['URL_ASSETS']->value;?>
js/beyond.min.js"><?php echo '</script'; ?>
>

<!--Page Related Scripts-->

</body>
<!--  /Body -->

<!-- Mirrored from beyondadmin-v1.5.0.s3-website-us-east-1.amazonaws.com/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Dec 2015 20:56:30 GMT -->
</html>
<?php }
}
?>