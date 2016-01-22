<?php

namespace wow\admin\widgets;

/**
 * Base para os widgets
 *
 * @author Eduardo
 */
abstract class Base {

    CONST WIDGET_FOLDER = 'widgets';

    /**
     * Objeto do smarty
     * @var \Smarty
     */
    private static $smarty = null;

    /**
     * Tamanho da grid
     * @var int
     */
    protected $length;

    /**
     * Retorna o total da grid
     * @return int
     */
    public function getLength() {
        return $this->length;
    }

    /**
     * Objeto do smarty
     * @return \Smarty
     */
    protected function getSmarty() {
        if (is_null(self::$smarty)) {
            self::$smarty = \wow\admin\Administrator::getSmarty();
            self::$smarty->setTemplateDir(\wow\uri\URL::getFolderProtected('view' . \wow\uri\Router::AMD_ROUTER . '/' . self::WIDGET_FOLDER . '/'));
        }
        return self::$smarty;
    }

    /**
     * Renderiza o widget
     * @param string $template
     */
    public function show($template) {
        $this->getSmarty()->fetch($template);
    }

}
