<?php

namespace wow\admin\components\form;

/**
 * Componente de campo de texto
 *
 * @author Eduardo
 */
class Int extends \wow\admin\components\Base {

    const WIDTH_MAX = 12;
    const MEDIUM_MAX = 6;
    const MIN_MAX = 3;

    /**
     * Largura do campo
     * @var int
     */
    private $width;

    /**
     * Seta a quantidade de caracteres permitida por campo
     * @param int $length
     */
    public function setLength($length) {
        $this->length = (int) $length;
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
     * @return int
     */
    public function getValue() {
        return (int)$this->value;
    }


    /**
     * Seta o valor do componente
     * @param int $val valor do componente
     */
    public function setValue($val) {
        $this->value = (int)$val;
    }

}
