<?php

//função para o lang do admin
function smarty_block_lang_adm($params, $content, $template, &$repeat) {
    return \wow\config\Language::getParam('admin', $content);
}
