<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace wow\admin;

/**
 * Description of Form
 *
 * @author Eduardo
 */
abstract class Form {

    CONST TYPE_INSERT = 1;
    CONST TYPE_UPDATE = 2;
    CONST TYPE_DELETE = 3;
    CONST VIEW_INSERT = 'Insert';
    CONST VIEW_UPDATE = 'Update';
    CONST VIEW_DELETE = 'Delete';
    CONST VIEW_LIST = 'Lister';
    CONST VIEW_FILTER = 'Filter';
    CONST NAMESPACE_VIEWS = '\wow\admin\views\\';

    /**
     * Array com as views
     * @var array
     */
    private $arrViews;

    /**
     * Array de fields
     * @var array
     */
    private $arrFields;

    /**
     * Array de abas
     * @var array
     */
    private $arrTabs = array();

    /**
     * Array com os names das tabs
     * @var string
     */
    private $arrTabNames = array();

    /**
     * Nome da tabela
     * @var string
     */
    protected $tableName;

    /**
     * Objeto da tabela
     * @var \Doctrine_Manager
     */
    protected $tableObj;

    /**
     * Nome da chave primária
     * @var string
     */
    protected $pkname;

    /**
     * Inicia a view
     * @param string $table
     * @param string $tabDefault
     */
    public function __construct($table, $tabDefault = null) {
        $this->tableName = $table;
        if (is_null($tabDefault)) {
            $tabDefault = \wow\config\Language::getParam('admin', 'tab_default');
        }
        $this->arrTabNames['default'] = $tabDefault;
        $this->arrTabs['default'] = array();
        $this->pkname = \wow\helper\Table::getPkName($table);
        $this->setDefaultViews();
    }

    /**
     * Retorna o nome da chave primária
     * @return string
     */
    public function getPkName() {
        return $this->pkname;
    }

    /**
     * Adiciona uma view
     * @param string $view
     * @param string $namespace caso não passar por parametro é usado o namespace padrão
     */
    public function addView($view, $namespace = null) {
        if (!in_array($view, $this->arrViews)) {
            if (is_null($namespace)) {
                $namespace = self::NAMESPACE_VIEWS;
            }
            $this->arrViews[] = $namespace . $view;
        }
    }

    /**
     * Seta a view padrão
     * @param string $view
     * @param string $namespace caso não passar por parametro é usado o namespace padrão
     */
    public function setDefault($view, $namespace = null) {
        if (is_null($namespace)) {
            $namespace = self::NAMESPACE_VIEWS;
        }
        $this->viewDefault = $namespace . $view;
    }

    /**
     * Limpa as views
     */
    public function clearViews() {
        $this->arrViews = array();
    }

    /**
     * Seta as view padrão
     */
    public function setDefaultViews() {
        $this->clearViews();
        $this->addView(self::VIEW_LIST);
        $this->addView(self::VIEW_INSERT);
        $this->addView(self::VIEW_UPDATE);
        $this->addView(self::VIEW_DELETE);
        $this->setDefault(self::VIEW_LIST);
    }

    /**
     * Retorna o nome da tabela
     * @return string
     */
    public function getTableName() {
        return $this->tableName;
    }

    /**
     * Seta o valor nos campos conforme o banco
     */
    public function setDataForTable() {
        if (empty($this->arrFields)) {
            $this->config();
        }
        foreach ($this->arrFields as $name => $fieldsObj) {
            /* @var $fieldsObj \wow\admin\components\Base */
            if ($this->tableObj->$name != null) {
                $fieldsObj->setValueDB($this->tableObj->$name);
            }
        }
    }

    /**
     * Retorna o objeto da tabela
     * @param int $id valor da chave primaria
     * @return \Doctrine_Table|\Doctrine_Collection
     */
    public function getTableObj($id = false) {
        if ($id) {
            $this->tableObj = \Doctrine::getTable($this->tableName)->find($id);
        } elseif($this->tableObj==null) {
            $tblName = $this->tableName;
            $this->tableObj = new $tblName();
        }
        return $this->tableObj;
    }

    /**
     * seta a Tabela do Doctrine
     * @param \Doctrine_Table $tableObj
     */
    public function setTableObj($tableObj) {
        $this->tableObj = $tableObj;
    }

    /**
     * Seta os valores do post
     */
    public function setPostValue() {
        if (!empty($_POST)) {
            $this->setArrValue($_POST);
        }
    }

    /**
     * Seta um array nos fields
     * @param array $arr array de dados
     */
    public function setArrValue($arr) {
        foreach ($this->arrFields as $k => $fieldsObj) {
            /* @var $fieldsObj \wow\admin\components\Base */
            if (isset($arr[$fieldsObj->getName()])) {
                $fieldsObj->setValue($arr[$fieldsObj->getName()]);
                $this->arrFields[$k] = $fieldsObj;
            }
        }
    }

    /**
     * Adiciona uma aba do administrador
     * @param string $name
     * @param string $label
     */
    public function addTab($name, $label) {
        $this->arrTabNames[$name] = $label;
        $this->arrTabs[$name] = array();
    }

    /**
     * Adiciona um campo na view
     * @param components\Base $fieldObj
     * @param string $tab
     */
    public function addField($fieldObj, $tab = 'default') {
        $name = $fieldObj->getName();
        $fieldObj->setTableName($this->tableName);
        $fieldObj->setPkeyName($tab);
        if (!isset($this->arrTabs[$tab])) {
            $this->arrTabs[$tab] = array($name);
        } else {
            $this->arrTabs[$tab][] = $name;
        }
        $this->arrFields[$name] = $fieldObj;
    }

    /**
     * Retorna os campos que serão usados na action
     * @param string $action nome da action
     * @return array array com os campos
     */
    public function getFieldsByAction($action) {
        $arrFields = array();
        $this->setPostValue();
        foreach ($this->arrFields as $name => $fieldObj) {
            if ($fieldObj->isShowAction($action)) {
                $arrFields[$name] = $fieldObj;
            }
        }
        return $arrFields;
    }

    /**
     * Retorna as tabs e os campos que serão usados na action
     * @param string $action nome da action
     * @return array array com os campos
     */
    public function getTabsFieldsByAction($action) {
        $arrTabs = array();
        foreach ($this->arrTabs as $tabname => $arrFieldsNames) {
            $title = $this->arrTabNames[$tabname];
            $arrFields = array();
            foreach ($arrFieldsNames as $name) {
                $fieldObj = $this->arrFields[$name];
                if ($fieldObj->isShowAction($action)) {
                    $arrFields[$name] = array(
                        'name' => $fieldObj->getName(),
                        'label' => $fieldObj->getLabel(),
                        'field' => $fieldObj->fetch()
                    );
                }
            }
            $arrTabs[] = array(
                'name' => $tabname,
                'title' => $title,
                'arrFields' => $arrFields
            );
        }
        return $arrTabs;
    }

    protected function config() {
        
    }

    public function preSend($type) {
        
    }

    public function posSend($type) {
        
    }

    /**
     * Cria uma Query para a listagem
     * @return \Doctrine_Query
     */
    public function dqlList() {
        return \Doctrine_Query::create()->from($this->tableName);
    }

    /**
     * Renderiza o form inicial
     * @param string $view
     * @param string $action ação da view
     * @param string $param parametro da ação
     */
    public function show($view = null, $action = null, $param = null) {
        if (empty($this->arrFields)) {
            $this->config();
        }
        if ($view == null) {
            $view = $this->viewDefault;
        } else {
            $view = ucfirst($view);
            $view = self::NAMESPACE_VIEWS . $view;
        }
        views\Lister::class;
        $classView = trim($view);
        $viewObj = new $classView($this);
        /* @var $viewObj \wow\admin\views\Base */
        if (!is_null($action)) {
            $viewObj->action($action, $param);
        }
        return $viewObj->render();
    }

    /**
     * Retorna todos os widgets
     * @param string $viewfilter view do widget
     * @param string $position posição do widget na view
     * @return string
     */
    public function getWidgetsView($viewfilter, $position = views\Base::WIDGET_POSITION_DEFAULT) {
        $widgets = '';
        foreach ($this->arrViews as $view) {
            /* @var $viewObj \wow\admin\views\Base */
            $viewObj = new $view($this);
            $widget = $viewObj->executeWidget($viewfilter, $position);
            if ($widget) {
                $widgets .= $widget;
            }
        }
        return $widgets;
    }

    /**
     * Retorna a URL do menu
     * @return string
     */
    public function getUrl() {
        if (defined('__MENU__')) {
            return \wow\uri\URL::getUrl('admin/' . __MENU__);
        }
        \wow\uri\URL::getUrl('admin/');
    }

}
