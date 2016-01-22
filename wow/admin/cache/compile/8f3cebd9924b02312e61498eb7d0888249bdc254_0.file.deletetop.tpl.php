<?php /* Smarty version 3.1.27, created on 2016-01-22 18:12:43
         compiled from "C:\wamp\www\wow\wow\admin\_templates\widgets\deletetop.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2609756a2630b0a7d76_11863894%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f3cebd9924b02312e61498eb7d0888249bdc254' => 
    array (
      0 => 'C:\\wamp\\www\\wow\\wow\\admin\\_templates\\widgets\\deletetop.tpl',
      1 => 1453482337,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2609756a2630b0a7d76_11863894',
  'variables' => 
  array (
    'formurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56a2630b15b894_90957212',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56a2630b15b894_90957212')) {
function content_56a2630b15b894_90957212 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2609756a2630b0a7d76_11863894';
?>
<div class="btn-group">
    <button class="btn btn-danger" id="delete-itens">
        <i class="fa fa-remove"></i> <?php $_smarty_tpl->smarty->_tag_stack[] = array('admlang', array()); $_block_repeat=true; echo smarty_block_lang_adm(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
lbl_delete<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang_adm(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </button>
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu"> 
        <li>
            <a href="javascript: void(0);" id="delete-all"><?php $_smarty_tpl->smarty->_tag_stack[] = array('admlang', array()); $_block_repeat=true; echo smarty_block_lang_adm(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
lbl_delete_all<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang_adm(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
        </li>
    </ul>    
</div>

    <?php echo '<script'; ?>
>
        (function () {
            var formurl = '<?php echo $_smarty_tpl->tpl_vars['formurl']->value;?>
';
            var desejadeletar = '<?php $_smarty_tpl->smarty->_tag_stack[] = array('admlang', array()); $_block_repeat=true; echo smarty_block_lang_adm(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
msg_deleteitem<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang_adm(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
';
                    var desejadeletarall = '<?php $_smarty_tpl->smarty->_tag_stack[] = array('admlang', array()); $_block_repeat=true; echo smarty_block_lang_adm(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
msg_deleteitem_all<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang_adm(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
';
                            $('#delete-all').click(function () {
                                if (confirm(desejadeletarall)) {
                                    var url = formurl + '/action/delete-many/' + values.join(':');
                                    window.location = url;
                                }
                            });
                            $('#delete-itens').click(function () {
                                if ($('.delete-item:checked').length > 0) {
                                    if (confirm(desejadeletar.replace('{total}', $('.delete-item:checked').length))) {
                                        var values = [];
                                        $('.delete-item:checked').each(function (i) {
                                            var deleteObj = $('.delete-item:checked').eq(i);
                                            values.push(deleteObj.val());
                                        });
                                        var url = formurl + '/action/delete/many/' + values.join(':');
                                        window.location = url;
                                    }
                                }

                            });
                        })();
    <?php echo '</script'; ?>
>
<?php }
}
?>