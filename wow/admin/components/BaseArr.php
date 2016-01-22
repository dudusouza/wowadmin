<?php

namespace wow\admin\components;

/**
 * Classe base dos componentes
 *
 * @author Eduardo
 */
abstract class BaseArr extends Base {

    /**
     * Objeto do array
     * @var type 
     */
    private $obj;

    public function __construct($name, $label) {
        parent::__construct($name, $label);
        $this->obj = new \stdClass();
        $this->obj->arr = array();
        $this->obj->value = 'value';
        $this->obj->caption = 'caption';
    }

    /**
     * Gera o array
     * @return array array gerado cujo a chave é o value e o valor atribuído é o caption
     */
    protected function generateArr() {
        $arr = array();
        foreach ($this->obj->arr as $arrItem) {
            $arr[$arrItem[$this->obj->value]] = $arrItem[$this->obj->caption];
        }
        return $arr;
    }

    /**
     * Adiciona um item
     * @param String $value
     * @param String $caption
     */
    public function addItem($value, $caption) {
        $this->obj->arr[$value] = $caption;
    }

    /**
     * Adiciona itens em um array
     * @param string $value
     * @param string $caption
     * @param array $arr
     */
    public function addArray($value, $caption, $arr) {
        if (is_array($arr)) {            
            $this->obj->arr = $arr;
            $this->obj->value = $value;
            $this->obj->caption = $caption;
        }
    }
    
    
    /**
     * Valor atribuido ao componente
     * @return float
     */
    public function getValue() {
        $arr = $this->generateArr();
        if(isset($arr[$this->value])){
            return $arr[$this->value];
        }
        return null;
    }
    

    /**
     * Retorna o objeto do array
     * @return \stdClass
     */
    protected function getObject() {
        return $this->obj;
    }

    /**
     * Retorna o array do compo
     * @return string
     */
    public function getArr() {
        return $this->generateArr();
    }

    /**
     * Retorna o nome do value do array
     * @return string
     */
    public function getNameVal() {
        return $this->obj->value;
    }

    /**
     * Retorna o nome do caption do array
     * @return string
     */
    public function getNameCaption() {
        return $this->obj->caption;
    }

}
