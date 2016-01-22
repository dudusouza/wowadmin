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
     * Máscara de campo
     * @var string 
     */
    private $mask;

    /**
     * Tamanho do texto do campo
     * @var int
     */
    private $length = 255;

    /**
     * Largura do campo
     * @var int
     */
    private $width = 6;

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
    public function setMask($mask){
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
        $smarty->assign('mask', $this->mask);
        return $smarty->fetch('form/text.tpl');
    }
    
    /**
     * Filtro do componente
     * @return string
     */
    public function getFilter() {
        return "{$this->getName()} like '%{$this->getValueDB()}%'";
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
    
    
    /**
     * Retorna o valor do componente sem a mascara
     * @return string
     */
    public function getValueWithoutMask($val=false) {
        $val = $this->value;
        if(!empty($this->mask) and !  is_null($this->mask)){
            $val = \wow\helper\Text::unmask($this->mask, $val);
        }
        return $val;
    }
}
