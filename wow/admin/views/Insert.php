<?php

namespace wow\admin\views;

/**
 * View para inserir os dados
 *
 * @author Eduardo
 */
class Insert extends Base {

    public function __construct(&$formObj) {
        parent::__construct($formObj);
        $this->addWidget(\wow\admin\Form::VIEW_LIST, 'btnAdd', Lister::WIDGET_POSITION_DEFAULT);
    }

    /**
     * Filtro do botão
     * @return string
     */
    protected function btnAdd() {
        $this->smarty->assign('formurl', $this->formObj->getUrl());
        $this->smarty->assign('viewname', $this->name);
        return $this->smarty->fetch('widgets/insert.tpl');
    }

    /**
     * Retorna os campos dos fields
     * @return array
     */
    private function getFields() {
        $arrFields = array();
        foreach ($this->arrFields as $fieldsObj) {
            /* @var $fieldsObj \wow\admin\components\Base */
            $field = $fieldsObj->fetch();
            $label = $fieldsObj->getLabel();
            $name = $fieldsObj->getName();
            $arrFields[] = array('field' => $field, 'label' => $label, 'name' => $name);
        }
        return $arrFields;
    }

    /**
     * Renderiza os campos
     */
    public function render() {
        $this->smarty->assign('arrTabs', $this->formObj->getTabsFieldsByAction(__VIEWNAME__));
        return parent::render();
    }

    /**
     * Executa a ação de insert
     * @throws Exception
     */
    protected function actionInsert() {
        $tableName = $this->formObj->getTableName();
        /* @var $tableObj \Doctrine_Table */
        $tableObj = new $tableName();
        $this->formObj->setTableObj($tableObj);
        $this->formObj->preSend(\wow\admin\Form::TYPE_INSERT);
        foreach ($this->arrFields as $fieldsObj) {
            /* @var $fieldsObj \wow\admin\components\Base */
            $nameField = $fieldsObj->getName();
            $tableObj->$nameField = $fieldsObj->getValueDB();
        }
        try {
            $tableObj->save();
            $this->formObj->setTableObj($tableObj);
            $this->formObj->posSend(\wow\admin\Form::TYPE_INSERT);
        } catch (\Doctrine_Exception $ex) {
            $error = \wow\config\Language::getParam('dberror', 'error_' + $ex->getCode());
            if (!is_null($error)) {
                throw new Exception($error, $ex->getCode());
            } else {
                throw new Exception($ex->getMessage(), $ex->getCode());
            }
        }
        \wow\uri\URL::redir($this->formObj->getUrl());
    }

}
