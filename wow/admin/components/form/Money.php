<?php

namespace wow\admin\components\form;

/**
 * Componente de campo de texto
 *
 * @author Eduardo
 */
class Money extends \wow\admin\components\Base {

    const WIDTH_MAX = 12;
    const MEDIUM_MAX = 6;
    const MIN_MAX = 3;

    /**
     * Largura do campo
     * @var int
     */
    private $width;
    
    /**
     * Largura do campo
     * @var string
     */
    private $length = 64;

    /**
     * Seta a quantidade de caracteres permitida por campo
     * @param int $length
     */
    public function setLength($length) {
        $this->length = (int) $length+3;
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
        $smarty->assign('length', $this->length);
        return $smarty->fetch('form/money.tpl');
    }

    
    /**
     * Valor atribuido ao componente
     * @return float
     */
    public function getValue() {
        return (float)$this->value;
    }
    
    /**
     * Valor atribuido ao componente
     * @return float
     */
    public function getValueDB() {
        return (float)$this->value;
    }

    /**
     * Seta o valor que recebe do banco de dados
     * @param type $val
     */
    public function setValueDB($val) {
        $this->value = (float)$val;
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
        $this->value = (float)$val;
    }

}
