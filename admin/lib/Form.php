<?php

/*
 * Copyright (C) 2016 Eduardo Rafael Correa de Souza
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace admin\lib;

/**
 * Classe do formulário
 *
 * @author Eduardo Rafael Correa de Souza
 */
abstract class Form {

    const PERMISSION_WRITE = 'W';
    const PERMISSION_READ = 'R';

    /**
     * Array com as views
     * @var array
     */
    private $arrViews;

    /**
     * View padrão de inicio do sistema
     * @var string
     */
    private $viewDefault;

    /**
     * Nome da tabela
     * @var type 
     */
    private $tableName;

    /**
     * Objeto da tabela passado pela view
     * @var \RedBeanPHP\OODBBean
     */
    private $tableObj;

    /**
     * Chave primária da tabela
     * @var string
     */
    private $pkName;

    /**
     * Array com os campos da tabela
     * @var array 
     */
    private $arrFieldsTable;

    /**
     * Array com os campos do form
     * @var array
     */
    private $arrFieldsForm;

    /**
     * Usuario do sistema
     * @var User
     */
    protected $userObj;

    /**
     * Sql do form
     * @var strin
     */
    protected $sql;

    /**
     * Registros por pagina
     * @var stdClass
     */
    private $rpObj;

    public function __construct($table) {
        $this->tableName = $table;
        $this->arrFieldsForm = array();
        $this->arrFieldsTable = array();
        $this->arrViews = array();
        $this->setTableData();
        $this->setRp(false, 30);
    }

    /**
     * Seta o RP da página
     * @param boolean $isStatic
     * @param integer $rp
     */
    public function setRp($isStatic, $rp) {
        $this->rpObj = new \wow\database\rp\Rp($rp);
        if (!$isStatic) {
            $this->rpObj->isDynamic();
        }
    }

    /**
     * Registros por página
     * @return \wow\database\rp\Rp
     */
    public function getRp() {
        return $this->rpObj;
    }

    /**
     * Seta os dados da tabela
     */
    private function setTableData() {
        $dataTable = new database\gentable\Data();
        $arrData = $dataTable->getDataTable($this->tableName);
        $this->pkName = $arrData['pk'];
        $this->arrFieldsTable = $arrData['fields'];
    }

    /**
     * 
     * @return \RedBeanPHP\OODBBean
     */
    public function getTableObj() {
        return $this->tableObj;
    }

    /**
     * Seta a tabela
     * @param \RedBeanPHP\OODBBean $tableObj
     */
    public function setTableObj($tableObj) {
        $this->tableObj = $tableObj;
    }

    /**
     * Retorna o valor da PK
     * @return null|int
     */
    public function getPk() {
        $pkname = $this->pkName;
        return $this->tableObj->$pkname;
    }

    /**
     * Retorna o nome da chave primária
     * @return string
     */
    public function getPkName() {
        return $this->pkName;
    }

    /**
     * Adiciona as views
     * @param string $viewName
     */
    public function addView($viewName) {
        if (!in_array($viewName, $this->arrViews)) {
            $this->arrViews[] = $viewName;
        }
    }

    /**
     * Adiciona como a view principal do sistema
     * @param string $viewName
     */
    public function viewDefault($viewName) {
        $this->addView($viewName);
        $this->viewDefault = $viewName;
    }

    /**
     * Retorna os widgets da view
     * @param string $viewname nome da view
     * @param string $location localização do widget dentro da view
     * @return boolean
     */
    public function getWidgets($viewname, $location) {
        foreach ($this->arrViews as $viewname) {
            $viewname = '\admin\lib\views\\' . $viewname;
            /* @var $viewObj \admin\lib\Views */
            $viewObj = new $viewname();
            $viewObj->setForm($this);
            if ($this->userObj->checkPermission($viewObj->getPermission())) {
                return $viewObj->getWidget($viewname, $location);
            }
        }
        return false;
    }

    /**
     * Seta o SQL
     * @param string $sql
     */
    public function setSql($sql) {
        $this->sql = $sql;
    }

    /**
     * Retorna o SQL
     * @return string
     */
    public function getSql() {
        return $this->sql;
    }

    public function onPost() {
        
    }

    public function onPosPost() {
        
    }

}
