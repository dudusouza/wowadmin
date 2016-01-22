<?php

namespace wow\admin\components\form;

/**
 * Componente de campo de texto
 *
 * @author Eduardo
 */
class Text extends \wow\admin\components\Base {

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
     * Seta uma mascara para o campo
     * @param string $mask
     */
    public function setMask($mask) {
        $this->mask = $mask;
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
        return $smarty->fetch('form/float.tpl');
    }

    /**
     * Valor atribuido ao componente
     * @return string
     */
    public function getValue() {
        $sm = \wow\config\Configuration::getParam('separador_milhar');
        $sd = \wow\config\Configuration::getParam('separador_decimal');
        $this->value = number_format($this->value,0,$sd,$sm);
    }

    /**
     * Valor atribuido ao componente
     * @return string
     */
    public function getValueDB() {
        return $this->getValueWithoutMask();
    }

    /**
     * Seta um valor para o banco de dados
     * @param type $val
     */
    public function setValueDB($val) {
        parent::setValueDB((float) $val);
    }

    /**
     * Seta o valor do componente
     * @param string $val valor do componente
     */
    public function setValue($val) {
        $this->value = $this->getValueWithoutMask();
    }

}
