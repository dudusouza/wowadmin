<?php

namespace wow\admin\views;

/**
 * View da Listagem dos dados
 *
 * @author Eduardo
 */
class Lister extends Base {

    CONST WIDGET_POSITION_TABLE = 'position_table';
    CONST WIDGET_POSITION_TABLE_LEFT = 'position_table_left';

    /**
     * view do Filtro
     * @var Filter
     */
    private $filter;

    public function __construct($formObj) {
        parent::__construct($formObj);
        $this->filter = new Filter($formObj);
        $this->addModuleTop($this->filter);
    }

    /**
     * Pega o valor da data conforme do componente
     * @param array $arrRow
     * @return array
     */
    private function dataComponent($arrRow) {
        $arrNewData = array();
        foreach ($arrRow as $index => $arrData) {
            foreach ($arrData as $name => $val) {
                if (isset($this->arrFields[$name])) {
                    $this->arrFields[$name]->setValue($val);
                    $arrNewData[$index][$name] = $this->arrFields[$name]->fetchList();
                    $this->arrFields[$name]->setValue(null);
                }
                if ($name == $this->formObj->getPkName()) {
                    $arrNewData[$index]['__wow__pkname__'] = $val;
                }
            }
        }
        return $arrNewData;
    }

    /**
     * Faz a paginação dos dados
     * @return array dados paginados
     */
    private function pagination() {
        $rp = \wow\config\Configuration::getParam('admin', 'rp');
        $currentPage = 1;
        $pagination = new \Doctrine_Pager($this->filter->getDQLFilter(), $currentPage, $rp);
        $arrData = $pagination->execute();
        return array(
            'data' => $this->dataComponent($arrData),
            'total' => $pagination->getLastPage(),
            'current' => $pagination->getPage(),
            'rp' => $pagination->getMaxPerPage()
        );
    }

    /**
     * Retorna o nome das colunas
     * @return array
     */
    public function getNameColumns() {
        $arrColumns = array();
        foreach ($this->arrFields as $fieldObj) {
            /* @var $fieldObj \wow\admin\components\BaseArr */
            $arrColumns[] = $fieldObj->getLabel();
        }
        return $arrColumns;
    }

    /**
     * Renderiza os dados do smarty
     */
    public function render() {
        $widgetstable = $this->formObj->getWidgetsView(\wow\admin\Form::VIEW_LIST,  self::WIDGET_POSITION_TABLE);
        $widgetstableleft = $this->formObj->getWidgetsView(\wow\admin\Form::VIEW_LIST,  self::WIDGET_POSITION_TABLE_LEFT);
        $widgetsdefault = $this->formObj->getWidgetsView(\wow\admin\Form::VIEW_LIST);
        
        $arrpager = $this->pagination();
        $this->smarty->assign('arrColumns', $this->getNameColumns());
        $this->smarty->assign('arrData', $arrpager['data']);
        $this->smarty->assign('totalpage', $arrpager['total']);
        $this->smarty->assign('curpage', $arrpager['rp']);
        $this->smarty->assign('widegetdefault', $widgetsdefault);
        $this->smarty->assign('widegettable', $widgetstable);
        $this->smarty->assign('widegettableleft', $widgetstableleft);
        return parent::render();
    }

}
