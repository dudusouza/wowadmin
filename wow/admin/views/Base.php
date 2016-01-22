<?php

namespace wow\admin\views;

/**
 * Classe de base das views
 *
 * @author Eduardo
 * @method mixed widget* retorna o vidget de alguma view, fazendo a chamada widgetNomeDaView
 */
abstract class Base {

    CONST WIDGET_POSITION_DEFAULT = 'position_default';

    /**
     * Nome da view
     * @var string
     */
    protected $name;

    /**
     * Modulos no topo
     * @var type 
     */
    private $arrModuleTop = array();

    /**
     * Modulos no rodape
     * @var type 
     */
    private $arrModuleFooter = array();

    /**
     * Objeto Smarty
     * @var \Smarty
     */
    protected $smarty;

    /**
     * Form para renderizar a view
     * @var \wow\admin\Form
     */
    protected $formObj;

    /**
     * Campos permitidos na ação atual
     * @var array
     */
    protected $arrFields;

    /**
     * Diz se é ou não módulo
     * @var bool
     */
    private $ismodule = false;

    /**
     * Array com os methodos de widgets das views
     * @var string
     */
    private $arrWidgets = array();

    public function __construct(&$formObj) {
        $this->formObj = $formObj;
        $this->setName();
        $this->smarty = \wow\admin\Administrator::getSmarty();
        $this->arrFields = $this->formObj->getFieldsByAction($this->name);
    }

    public function __call($name, $arguments) {
        if (substr($name, 0, 6) == 'widget') {
            $name = str_replace('widget', '', $name);
            $this->executeWidget($name);
        }
        return null;
    }

    /**
     * Renderiza os módulos do topo
     * @return string modulos em HTML
     */
    private function getModulesTop() {
        $top = '';
        foreach ($this->arrModuleTop as $moduleObj) {
            /* @var $moduleObj Base */
            $top.=$moduleObj->render();
        }
        return $top;
    }

    /**
     * Renderiza os módulos do rodape
     * @return string modulos em HTML
     */
    private function getModulesFooter() {
        $footer = '';
        foreach ($this->arrModuleFooter as $moduleObj) {
            /* @var $moduleObj Base */
            $footer.=$moduleObj->render();
        }
        return $footer;
    }

    /**
     * Seta o nome da view
     */
    private function setName() {
        $reflectionObj = new \ReflectionObject($this);
        $name = $reflectionObj->getName();
        $arrName = explode('\\', $name);
        $this->name = strtolower(trim(end($arrName)));
        if (!defined('__VIEWNAME__')) {
            define('__VIEWNAME__', $this->name);
        }
    }

    /**
     * Adiciona um modulo (view) no topo
     * @param Base $module
     */
    protected function addModuleTop($module) {
        $this->arrModuleTop[] = $module;
    }

    /**
     * Adiciona um modulo (view) no rodapé
     * @param Base $module
     */
    protected function addModuleFooter($module) {
        $this->arrModuleFooter[] = $module;
    }

    /**
     * Seta como modulo ou não
     * @param bool $is variavel booleana que define se é modulo
     */
    public function isModule($is = true) {
        $this->ismodule = $is;
    }

    public function action($action, $param) {
        $reflectionObj = new \ReflectionObject($this);
        $arrMethods = $reflectionObj->getMethods(\ReflectionMethod::IS_PROTECTED);
        
        foreach ($arrMethods as $methodObj) {
            $name = strtolower($methodObj->name);
            if (substr($name, 0, 6) == 'action') {
                $name = substr($name, 6);
                if ($name == $action) {
                    $method = $methodObj->name;
                    $methodObj = new \ReflectionMethod($this, $methodObj->name);
                    $numParam = $methodObj->getNumberOfRequiredParameters();
                    if ($numParam == 0) {
                        $this->$method();
                    } elseif ($numParam == 1) {
                        $this->$method($param);
                    } else {
                        throw new Exception("Erro, seu metodo $method deve de ter apenas um ou nenhum parametro");
                    }

                    exit;
                }
            }
        }
        exit;
    }

    /**
     * Renderiza a view
     * @return string
     */
    public function render() {
        $top = $footer = "";
        if (!$this->ismodule) {
            $top = $this->getModulesTop();
            $footer = $this->getModulesFooter();
        }
        $this->smarty->assign('formurl',$this->formObj->getUrl());
        $this->smarty->assign('viewname',$this->name);
        return $top . $this->smarty->fetch('views/' . $this->name . '.tpl') . $footer;
    }

    /**
     * Adiciona um widget
     * @param string $view View do Widget
     * @param string $method metodo para chamar o widget
     * @param string $position Posição do widget na view
     */
    public function addWidget($view, $method, $position = self::WIDGET_POSITION_DEFAULT) {
        if (!isset($this->arrWidgets[$view])) {
            $this->arrWidgets[$view] = array();
        }
        $this->arrWidgets[$view][] = array('method' => $method, 'position' => $position);
    }

    /**
     * Executa um widget
     * @param string $name nome da view
     * @param string $postion posição do widget na view
     * @return mixed
     */
    public function executeWidget($name, $postion = self::WIDGET_POSITION_DEFAULT) {
        $widgets = '';
        if (isset($this->arrWidgets[$name])) {
            foreach ($this->arrWidgets[$name] as $arrWidget) {
                if ($postion == $arrWidget['position'] or $postion == false) {
                    $method = $arrWidget['method'];
                    $widget = $this->$method();
                    if ($widget) {
                        $widgets .= $widget;
                    }
                }
            }
            return $widgets;
        }
        return false;
    }

}
