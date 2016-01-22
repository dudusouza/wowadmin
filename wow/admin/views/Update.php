<?php

namespace wow\admin\views;

/**
 * View para inserir os dados
 *
 * @author Eduardo
 */
class Update extends Base {

    public function __construct(&$formObj) {
        parent::__construct($formObj);
        $this->addWidget(\wow\admin\Form::VIEW_LIST, 'btnUpdate', Lister::WIDGET_POSITION_TABLE);
    }

    /**
     * Filtro do botão
     * @return string
     */
    protected function btnUpdate() {
        $this->smarty->assign('formurl', \wow\uri\URL::getUrl('admin/' . __MENU__));
        $this->smarty->assign('viewname', $this->name);
        return $this->smarty->fetch('widgets/update.tpl');
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
        $pkname = $this->formObj->getPkName();
        $pkvalue = $this->formObj->getTableObj()->$pkname;
        $this->smarty->assign('pkvalue', $pkvalue);
        $this->smarty->assign('arrTabs', $this->formObj->getTabsFieldsByAction(__VIEWNAME__));
        return parent::render();
    }

    /**
     * Executa a ação de update
     * @param string $action nome da ação
     * @throws Exception
     */
    protected function actionUpdate($id) {
        $id = (int) $id;
        if ($id > 0) {
            $tableObj = $this->formObj->getTableObj($id);
            $this->formObj->preSend(\wow\admin\Form::TYPE_INSERT);
            foreach ($this->arrFields as $fieldsObj) {
                /* @var $fieldsObj \wow\admin\components\Base */
                $name = $fieldsObj->getName();
                $tableObj->$name = $fieldsObj->getValueDB();
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
        }

        \wow\uri\URL::redir($this->formObj->getUrl());
    }

}
