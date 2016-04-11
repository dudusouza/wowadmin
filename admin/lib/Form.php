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

    private $arrViews;
    private $viewDefault;
    private $tableName;
    
    /**
     * Objeto da tabela passado pela view
     * @var \RedBeanPHP\OODBBean
     */
    private $tableObj;
    private $pkName;
    private $arrFieldsTable;
    private $arrFieldsForm;

    public function __construct($table) {
        $this->tableName = $table;
        $this->arrFieldsForm = array();
        $this->arrFieldsTable = array();
        $this->arrViews = array();
        $this->setTableData();
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
    public function getTableObj(){
        return $this->tableObj;
    }
    
    /**
     * Retorna o valor da PK
     * @return null|int
     */
    public function getPk(){
        $pkname = $this->pkName;
        return $this->tableObj->$pkname;
    }
    
    /**
     * Retorna o nome da chave primária
     * @return string
     */
    public function getPkName(){
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
    

    public function onPost() {
        
    }

    public function onPosPost() {
        
    }

}
