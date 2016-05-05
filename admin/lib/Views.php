<?php

/*
 * Copyright (C) 2016 Lucas
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
 * Classe de base para as views
 *
 * @author Eduardo Rafael Correa de Souza
 */
abstract class Views {

    CONST WIDGET_LOCATION_DEFAULT = 'DEFAULT';

    /**
     * Nome da view
     * @var string
     */
    private $name;

    /**
     * Permissão necessária para acessar a view R=read, RW Read and Write
     * @var type 
     */
    private $permission;

    /**
     * Nome da tabela
     * @var Form
     */
    protected $formObj;

    /**
     * Array com widgets
     * @var array
     */
    protected $arrWidget;

    public function __construct($name) {
        $this->name = $name;
    }

    /**
     * Adiciona
     * @param string $name nome da view
     * @param string $method nome do metodo da view atual
     * @param string $location location
     */
    protected function addWidget($name, $method, $location = Views::WIDGET_LOCATION_DEFAULT) {
        $this->arrWidget[$name][$location] = $method;
    }
    

    /**
     * Seta o form
     * @param Form $formObj
     */
    public function setForm($formObj) {
        $this->formObj = $formObj;
    }

    /**
     * Retorna o widget conforme os dados passados
     * @return mixed
     */
    public function getWidget($name, $location = Views::WIDGET_LOCATION_DEFAULT) {
        if (isset($this->arrWidget[$name])) {
            if (isset($this->arrWidget[$name][$location])) {
                $method = $this->arrWidget[$name][$location];
                $method = 'widget' . ucfirst($method);
                if (method_exists($this, $method)) {
                    return $this->$method();
                }
            }
        }
        return false;
    }

    /**
     * Retorna o tipo de permissão
     * @return string
     */
    public function getPermission() {
        return $this->permission;
    }

    /**
     * Verifica se está no post 
     * @return string
     */
    public function isPost() {
        return filter_input(INPUT_SERVER, 'REQUEST_METHOD') == 'POST';
    }
    
}
