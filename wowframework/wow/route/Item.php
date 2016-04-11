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

namespace wow\route;

/**
 * Item da Rota
 *
 * @author Eduardo Rafael Correa de Souza
 */
final class Item {

    private $container;

    public function __construct($app, $route, $controller, $method, $type) {
        /* @var $app \Slim\App*/
        $this->container = $app->getContainer();
        
        $app->$type('/' . $route, function($request, $response, $args = array()) use ($controller, $method) {
            $controllerObj = \wow\route\Item::getController($controller);
            $controllerObj->_setParams($args);
            $reflection = new \ReflectionObject($controllerObj);
            $controllerObj->$method();
        });
    }

    /**
     * Retorna o controllador
     * @param string $controller Classe do controlador
     * @return \wow\Controller
     */
    public static function getController($controller) {
        $controllerFile = str_replace('\\', DS, $controller);
        if (substr($controllerFile, 0, 1) == DS) {
            $controllerFile = substr($controllerFile, 1);
        }
        $controllerPath = WOW_CONTROLLER_PATH . $controllerFile . '.php';
        if (file_exists($controllerPath)) {
            include_once $controllerPath;
            return new $controller;
        }
        return null;
    }

}
