<?php

namespace wow\admin\components\form;

/**
 * Componente de campo de texto
 *
 * @author Eduardo
 */
class Date extends \wow\admin\components\Base {

    const WIDTH_MAX = 12;
    const MEDIUM_MAX = 6;
    const MIN_MAX = 3;

    /**
     * Máscara de campo
     * @var string 
     */
    private $mask;

    public function __construct($name, $label) {
        $this->getMaskINI();
        parent::__construct($name, $label);
    }


    /**
     * Seta a mascara da data
     */
    private function getMaskINI(){
        $dateformat = \wow\config\Configuration::getParam('global', 'mask');
        $dateformat = str_replace(array('d','m','y'), 99, $dateformat);
        $this->mask = str_replace(array('Y'), 9999, $dateformat);
    }
    /**
     * Seta a largura do campo
     * @param int $width Largura do campo usando bootrap (de 1 a 12)
     */
    public function setWidth($width) {
        $this->width = (int) $width;
    }
    /**
     * Gera o campo
     * @return string
     */
    public function fetch() {
        $smarty = \wow\admin\Administrator::getSmarty();
        $smarty->assign('name', $this->getName());
        $smarty->assign('value', $this->getValue());
        $smarty->assign('width', $this->width);
        $smarty->assign('mask', $this->mask);
        return $smarty->fetch('form/text.tpl');
    }

    /**
     * Valor atribuido ao componente
     * @return string
     */
    public function getValue() {
        return $this->getValueWithoutMask();
    }

    /**
     * Seta o valor do componente
     * @param string $val valor do componente
     */
    public function setValue($val) {
        $this->value = substr($val, 0, $this->length);
        $this->value = $this->getValueWithoutMask();
    }
}
