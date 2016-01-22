<?php

namespace wow;

/**
 * Controlador principal do sistema
 *
 * @author Eduardo
 */
abstract class Controller {

    /**
     * Array de parametros
     * @var string
     */
    private $arrParams;

    /**
     * Array de variaveis de templates
     * @var array
     */
    private $arrTemplateVar = array();

    /**
     * Verificador do User Agent
     * @var \Mobile_Detect
     */
    protected $userAgentObj;

    /**
     * Namespace do objeto
     * @var string
     */
    private $namespace;

    /**
     * Smarty Obcject
     * @var \Smarty
     */
    private static $smarty = null;

    public function __construct() {
        $this->userAgentObj = new \Mobile_Detect();
        $this->setNamespace();
    }

    /**
     * Seta no smarty as pastas
     * @return \Smarty objeto do template
     */
    private function getSmarty() {
        if (is_null(self::$smarty)) {
            self::$smarty = new \Smarty();
            self::$smarty->setCacheDir(uri\URL::getFolderProtected('compiler/cache/'));
            self::$smarty->setCompileDir(uri\URL::getFolderProtected('compiler/compile/'));
            self::$smarty->setBlockPluginLang();
        }
        return self::$smarty;
    }

    /**
     * Seta o namespace para renderização
     */
    public function setNamespace() {
        $reflectionObj = new \ReflectionObject($this);
        $class = $reflectionObj->getName();
        $arrClass = explode('\\', $class);
        unset($arrClass[count($arrClass) - 1]);
        if ($arrClass[0] == 'controller') {
            unset($arrClass[0]);
        }
        $this->namespace = implode('\\', $arrClass);
    }

    /**
     * Renderiza um vizualização
     * @param string $file
     * @param type $view
     */
    private function renderView($file) {
        $viewPath = uri\URL::getFolderProtected('view');
        $theme = $this->namespace;
        //caso for admin, terá uma view específica para ele
        if ($this->namespace == uri\Router::AMD_ROUTER) {
            $viewPath .= uri\Router::AMD_ROUTER;
        } else {
            $detect = new \Mobile_Detect();
            //se for mobile e estiver configurado para usar o template mobile
            if ($detect->isMobile() and (int) config\Configuration::getParam('global', 'usemobile') == 1) {
                $viewPath .= 'mobile/' . $this->namespace;
            } else {
                $viewPath .= $this->namespace;
            }
        }
        $viewPath = uri\Helper::strFolderPath($viewPath);
        $smarty = $this->getSmarty();
        $smarty->setTemplateDir($viewPath);
        $smarty->assign('SITE_URL', uri\URL::getUrl());
        $smarty->assign('URL_ASSETS', uri\URL::getUrl("public/assets/$theme/"));
        foreach ($this->arrTemplateVar as $name => $var) {
            $smarty->assign($name, $var);
        }
        if (base\Wow::isCache()) {
            $smarty->caching = true;
            $smarty->cache_lifetime = config\Configuration::getParam('global', 'cachetime');
        }
        $smarty->display($file . '.tpl');
    }

    /**
     * Assina as variais de template
     * @param string $var nome da variavel
     * @param mixed $value valor da variavel
     */
    public function assign($var, $value) {
        $this->arrTemplateVar[$var] = $value;
    }

    /**
     * Uso do sistema, onde adiciona os parametro
     * @param array $arrRoute
     * @access private
     */
    public function addParams($arrRoute) {
        if (is_array($arrRoute)) {
            $this->arrParams = $arrRoute;
        }
    }

    /**
     * Retorna o parametro
     * @param string $param
     * @return string|null
     */
    protected function getParam($param) {
        if (isset($this->arrParams[$param])) {
            return $this->arrParams[$param];
        }
        return null;
    }

    /**
     * Renderiza a view principal
     * @param string $view
     */
    protected function view($view) {
        $this->renderView($view);
    }

}
