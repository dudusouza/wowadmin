<?php

namespace wow\admin\views;

/**
 * Filtro de dados
 *
 * @author Eduardo
 */
class Filter extends Base {

    public function __construct($formObj) {
        parent::__construct($formObj);
    }

    /**
     * Retorna os campos dos fields
     * @return array
     */
    private function getFields() {
        $arrFields = array();
        foreach ($this->arrFields as $fieldsObj) {
            /* @var $fieldsObj \wow\admin\components\Base */
            $label = $fieldsObj->getLabel();
            $name = $fieldsObj->getName();
            $val = filter_input(INPUT_POST, $name);
            if(!is_null($val)){
                $fieldsObj->setValue($val);
            }
            $field = $fieldsObj->fetch();
            $arrFields[] = array('field' => $field, 'label' => $label, 'name' => $name);
        }
        return $arrFields;
    }

    /**
     * Faz um filtro com o DQL
     * @return \Doctrine_Query
     */
    public function getDQLFilter() {
        $dql = $this->formObj->dqlList();

        foreach ($this->arrFields as $fieldsObj) {
            /* @var $fieldsObj \wow\admin\components\Base */
            if ($fieldsObj->issetVal()) {
                $dql->addWhere($fieldsObj->getFilter());
            }
        }
        return $dql;
    }

    /**
     * Renderiza os campos
     */
    public function render() {
        $this->smarty->assign('arrFields', $this->getFields());
        return parent::render();
    }

}
