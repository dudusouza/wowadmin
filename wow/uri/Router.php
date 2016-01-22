<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace wow\uri;

/**
 * Description of Router
 *
 * @author eduardo
 */
class Router {

    const AMD_ROUTER = 'admin';

    /**
     * Rota para ser adicionada
     * @var type 
     */
    private static $arrRoute = array();

    /**
     * Array de parametros
     * @var string
     */
    private static $arrParams = array();

    private static function internalRoute($route) {
        switch ($route) {
            case '/wow/genmodel/':
            case '/wow/genmodel':
                if (isset($_GET['user']) and isset($_GET['pass'])) {
                    $user = $_GET['user'];
                    $pass = $_GET['pass'];
                    if ($user == \wow\config\Configuration::getParam('genmodel', 'user') and $pass == \wow\config\Configuration::getParam('genmodel', 'pass')) {
                        \wow\conn\LiveConnection::generateDB();
                    } else {
                        \wow\exception\General::breakError('Forbiden');
                    }
                } else {
                    \wow\exception\General::breakError('Forbiden');
                }
                return true;
                break;
        }
        return false;
    }

    /**
     * Verifica a rota do item
     * @param array $arrRoute array da rota atual
     * @param array $arrRouteRec array da rota preconfigurada
     * @return boolean
     */
    private static function routeItem($arrRoute, $arrRouteRec) {
        $isRoute = true;
        foreach ($arrRoute as $k => $item) {
            if ($arrRouteRec[$k] != $item) {
                if (substr($arrRouteRec[$k], 0, 1) == ':') {
                    self::$arrParams[substr($arrRouteRec[$k], 1)] = $item;
                } else {
                    self::$arrParams = array();
                    $isRoute = false;
                }
            }
        }
        return $isRoute;
    }

    /**
     * Carrega o controlador e o metodo conforme a rota
     * @param sdtClass $routeObj
     */
    private static function loadController($routeObj) {
        $controller = $routeObj->controller;
        AutoLoad::loadController($controller);
        $controllerObj = null;
        eval('$controllerObj = new ' . $controller . '();');
        /* @var $controllerObj \wow\Controller */
        $controllerObj->addParams(self::$arrParams);
        $reflection = new \ReflectionObject($controllerObj);
        eval('$controllerObj->' . $routeObj->method . '();');
        self::$arrRoute = array();
    }

    /**
     * Adiciona uma rota
     * @param string $route rota a ser usada
     * @param string $controller controlador para chamar
     * @param string $method metodo do controlador
     */
    public static function addRoute($route, $controller, $method) {
        $routeObj = new \stdClass();
        $routeObj->controller = $controller;
        $routeObj->method = $method;
        self::$arrRoute[$route] = $routeObj;
    }

    /**
     * Adiciona uma rota para o admin
     * @param string $route rota a ser usada
     * @param string $controller controlador para chamar
     * @param string $method metodo do controlador
     */
    public static function addAdmRoute($route, $controller, $method) {
        self::addRoute(AMD_ROUTER . '/' . $route, $controller, $method);
    }

    /**
     * Calcula a rota
     * @param type $route
     */
    public static function route($route) {
        if (!self::internalRoute($route)) {
            $arrRoute = explode('/', $route);
            foreach (self::$arrRoute as $routeItem => $obj) {
                $arrRouteItem = explode('/', $routeItem);
                if (count($arrRoute) == count($arrRouteItem) and self::routeItem($arrRoute, $arrRouteItem)) {
                    self::loadController($obj);
                }
            }
        }
    }

}
