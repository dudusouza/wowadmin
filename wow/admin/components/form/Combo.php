<?php

namespace wow\admin\components\form;

/**
 * Combo
 *
 * @author Eduardo
 */
class Combo extends \wow\admin\components\BaseArr{
    
    const WIDTH_MAX = 12;
    const MEDIUM_MAX = 6;
    const MIN_MAX = 3;

    /**
     * Largura do campo
     * @var int
     */
    private $width = 6;


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
        $smarty->assign('value', $this->value);
        $smarty->assign('arr', $this->getArr());
        $smarty->assign('width', $this->width);
        return $smarty->fetch('form/combo.tpl');
    }

    
    /**
     * Seta o valor do componente
     * @param float $val valor do componente
     */
    public function setValue($val) {
        $sm = \wow\config\Configuration::getParam('global', 'separador_milhar');
        $sd = \wow\config\Configuration::getParam('global', 'separador_decimal');
        $val = str_replace($sm, '', $val);
        $val = str_replace($sd, '.', $val);
        $this->value = $val;
    }

}
