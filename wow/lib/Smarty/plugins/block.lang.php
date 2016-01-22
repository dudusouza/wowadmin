<?php

//função para o lang
function smarty_block_lang($params, $content, $template, &$repeat) {
    if (empty($params['file'])) {
        if (!empty($params['section'])) {
            return \wow\config\Language::getParam($params['section'], $content);
        } else {
            return \wow\config\Language::getParam($content);
        }
    }
    return \wow\config\Language::getParam($params['section'], $content, $params['file']);
}

