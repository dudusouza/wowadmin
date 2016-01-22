<?php

namespace wow\admin\views;

/**
 * View para inserir os dados
 *
 * @author Eduardo
 */
class Delete extends Base {

    public function __construct(&$formObj) {
        parent::__construct($formObj);
        $this->addWidget(\wow\admin\Form::VIEW_LIST, 'btnDelete');
        $this->addWidget(\wow\admin\Form::VIEW_LIST, 'btnIntertable', Lister::WIDGET_POSITION_TABLE);
        $this->addWidget(\wow\admin\Form::VIEW_LIST, 'btnCheckDelete', Lister::WIDGET_POSITION_TABLE_LEFT);
    }

    /**
     * Filtro do botão
     * @return string
     */
    protected function btnDelete() {
        $this->smarty->assign('formurl', \wow\uri\URL::getUrl('admin/' . __MENU__));
        $this->smarty->assign('viewname', $this->name);
        return $this->smarty->fetch('widgets/deletetop.tpl');
    }

    /**
     * Filtro do botão
     * @return string
     */
    protected function btnCheckDelete() {
        $this->smarty->assign('formurl', \wow\uri\URL::getUrl('admin/' . __MENU__));
        $this->smarty->assign('viewname', $this->name);
        return $this->smarty->fetch('widgets/deleteleft.tpl');
    }

    /**
     * Filtro do botão
     * @return string
     */
    protected function btnIntertable() {
        $this->smarty->assign('formurl', \wow\uri\URL::getUrl('admin/' . __MENU__));
        $this->smarty->assign('viewname', $this->name);
        return $this->smarty->fetch('widgets/deleteright.tpl');
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
     * Deleta vários itens
     * @param string $ids Ids separados por :
     */
    protected function actionMany($ids) {
        $arrId = explode(':', $ids);
        $tableName = $this->formObj->getTableName();
        foreach ($arrId as $id) {
            $id = (int) $id;
            if ($id > 0) {
                \Doctrine::getTable($tableName)->find($id)->delete();
            }
        }
        \wow\uri\URL::redirBack();
    }

    /**
     * Remove todos os itens do menu
     */
    public function actionAll() {
        \Doctrine_Query::create()
                ->delete()
                ->from($this->formObj->getTableName())
                ->execute();
        \wow\uri\URL::redirBack();
    }

    /**
     * Ação para deletar um item
     * @param int $id
     */
    protected function actionDelete($id) {
        $tableObj = $this->formObj->getTableObj($id);
        $tableObj->delete();
        \wow\uri\URL::redirBack();
    }

}
