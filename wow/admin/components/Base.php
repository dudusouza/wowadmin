<?php

namespace wow\admin\components;

/**
 * Classe base dos componentes
 *
 * @author Eduardo
 */
abstract class Base {

    /**
     * Constantes de validação
     */
    CONST VALIDATE_MISMATCH = 'mismatch ';
    CONST VALIDATE_REQUIRED = 'required';
    CONST VALIDATE_VALID_EMAIL = 'valid_email';
    CONST VALIDATE_MAX_LEN = 'max_len';
    CONST VALIDATE_MIN_LEN = 'min_len';
    CONST VALIDATE_EXACT_LEN = 'exact_len';
    CONST VALIDATE_ALPHA = 'alpha';
    CONST VALIDATE_ALPHA_NUMERIC = 'alpha_numeric';
    CONST VALIDATE_ALPHA_DASH = 'alpha_dash';
    CONST VALIDATE_NUMERIC = 'numeric';
    CONST VALIDATE_INTEGER = 'integer';
    CONST VALIDATE_BOOLEAN = 'boolean';
    CONST VALIDATE_FLOAT = 'float';
    CONST VALIDATE_VALID_URL = 'valid_url';
    CONST VALIDATE_URL_EXISTS = 'url_exists';
    CONST VALIDATE_VALID_IP = 'valid_ip';
    CONST VALIDATE_VALID_CC = 'valid_cc';
    CONST VALIDATE_VALID_NAME = 'valid_name';
    CONST VALIDATE_CONTAINS = 'contains';
    CONST VALIDATE_STREET_ADDRESS = 'street_address';
    CONST VALIDATE_DATE = 'date';
    CONST VALIDATE_MIN_NUMERIC = 'min_numeric';
    CONST VALIDATE_MAX_NUMERIC = 'max_numeric';
    CONST VALIDATE_MIN_AGE = 'min_age';

    /**
     * Array de actions em que será permitida a ação
     * @var string
     */
    private $arrShowInAction = array();

    /**
     * Array com as views em que irá aparecer
     * @var array
     */
    private $arrShowView = array();

    /**
     * Label para apresentar ao front-end
     * @var string
     */
    private $label;

    /**
     * Name Salvo no banco de dados
     * @var string
     */
    private $name;

    /**
     * Valor dado ao componente
     * @var mixed
     */
    protected $value = null;

    /**
     * Nome da tabela
     * @var string
     */
    protected $tableName = null;

    /**
     * Nome da chave primaria
     * @var string 
     */
    protected $pkeyName;

    /**
     * Valor da chave promária
     * @var int
     */
    protected $pkeyVal;

    /**
     * Validações
     * @var array
     */
    private $arrValidate = array();

    /**
     * Inicia o componente
     * @param string $name nome do campo do banco
     * @param string $label nome que aparecerá na view
     */
    public function __construct($name, $label) {
        $this->label = $label;
        $this->name = $name;
        $this->setDefaultAction();
        $this->setValuePost();
    }

    /**
     * Recebe o valor recuperado do post
     */
    private function setValuePost() {
        $val = filter_input(INPUT_POST, $this->name);
        if (!is_null($val)) {
            $this->setValue($val);
        }
    }

    public function setDefaultAction() {
        $this->arrShowInAction = array(
            \wow\admin\Form::VIEW_DELETE,
            \wow\admin\Form::VIEW_INSERT,
            \wow\admin\Form::VIEW_UPDATE,
            \wow\admin\Form::VIEW_LIST,
            \wow\admin\Form::VIEW_FILTER,
        );
    }

    /**
     * Adiciona um tipo de validação 
     * @param string $validate
     */
    public function addValidate($validate) {
        $this->arrValidate[] = $validate;
    }

    /**
     * Seta o nome da tabela
     * @param string $table
     */
    public function setTableName($table) {
        $this->tableName = $table;
    }

    /**
     * Seta o nome da chave primária
     * @param string $pk
     */
    public function setPkeyName($pk) {
        $this->pkeyName = $pk;
    }

    /**
     * Seta o valor da chave primária
     * @param int $val
     */
    public function setPkeyVal($val) {
        $this->pkeyVal = (int) $val;
    }

    /**
     * Retorna o name
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Retorna o label
     * @return string
     */
    public function getLabel() {
        return $this->label;
    }

    /**
     * Adiciona uma view para mostrar o form
     * @param string $viewName
     */
    public function addView($viewName) {
        $this->arrShowView[] = $viewName;
    }

    /**
     * Adiciona vároas views para verificação
     * @param type $viewNames
     */
    public function addViews($viewNames) {
        if (!is_array($viewNames)) {
            $viewNames = explode(',', $viewNames);
        }
        $this->arrShowView = array_merge($viewNames, $this->arrShowView);
    }

    /**
     * Verifica se o item pode estar na view atual
     * @param string $viewname
     * @return boolean
     */
    public function showInView($viewname) {
        if (!empty($this->arrShowView)) {
            return (array_search($viewname, $this->arrShowView) !== false);
        }
        return true;
    }

    /**
     * Caso voltar true será valido, caso retornar um array serão os erros
     * @return bool|array
     */
    public function isValid() {
        return \GUMP::is_valid($this->value, $this->arrValidate);
    }

    /**
     * Seta um valor vindo do banco de dados
     * @param string $val
     */
    public function setValueDB($val) {
        $this->setValue($val);
    }

    /**
     * Retorna o valor para o banco de dados
     * @return string
     */
    public function getValueDB() {
        return $this->getValue();
    }

    /**
     * Seta uma ação
     * @param array $arr
     * @return \wow\admin\components\Base
     */
    public function setArrayAction($arr) {
        foreach ($arr as $action) {
            $this->setAction($action);
        }
        return $this;
    }

    /**
     * Limpa as ações
     * @return \wow\admin\components\Base
     */
    public function clearActions() {
        $this->arrShowInAction = array();
        return $this;
    }

    /**
     * Seta uma ação 
     * @param string $action nome da action
     * @return \wow\admin\components\Base
     */
    public function setAction($action) {
        if (!in_array($action, $this->arrShowInAction)) {
            $this->arrShowInAction[] = strtolower($action);
        }
        return $this;
    }

    /**
     * Verifica se a ação está para ser utulizada com esse campo
     * @param string $action nome da ação
     * @return bool
     */
    public function isShowAction($action) {
        return in_array(strtolower($action), array_map('strtolower', $this->arrShowInAction));
    }

    /**
     * Filtro do componente
     * @return string
     */
    public function getFilter() {
        return "{$this->name}='{$this->getValueDB()}'";
    }

    /**
     * Verifica se tem o valor
     * @return bool
     */
    public function issetVal() {
        return !(is_null($this->value) || empty($this->value));
    }

    /**
     * Retorna o campo do list
     * @return string
     */
    public function fetchList() {
        return $this->getValue();
    }

    /**
     * Seta o valor atual
     * @param mixed $val
     */
    abstract function setValue($val);

    /**
     * Retorna o valor atual
     * @return mixed valor
     */
    abstract public function getValue();

    /**
     * Renderiza o html do campo
     * @return string html do campo
     */
    abstract public function fetch();
}
