<?php


//função para o lang global
function smarty_block_lang_global($params, $content, $template, &$repeat) {
    return \wow\config\Language::getParam('global', $content);
}