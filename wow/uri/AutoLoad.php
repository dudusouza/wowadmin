<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace wow\uri;

/**
 * Description of newPHPClass[
 *
 * @author eduardo
 */
class AutoLoad {

    /**
     * Carrega classes e bibliotecas do wow
     * @param string $class
     * @return bool
     */
    private static function wow($class) {
        $class = str_replace('wow\\', '', $class);
        $class = str_replace('\\', '/', $class);
        $dir = URL::getWowDir() . $class . '.php';
        if (file_exists($dir)) {
            include_once $dir;
            return true;
        }
        return false;
    }

    /**
     * Carrega automaticamente uma biblioteca de terceiros
     * @param string $class
     * @return bool
     */
    private static function lib($class) {
        $arrClass = explode('\\', $class);
        $class = end($arrClass);
        return self::loadLib($class);
    }

    /**
     * Carrega uma biblioteca de terceiros
     * @param string $lib
     * @return bool
     */
    public static function loadLib($lib) {
        $dir = URL::getWowDir('lib/' . $lib) . 'config.php';
        if (file_exists($dir)) {
            include_once $dir;
            return true;
        }
        return false;
    }

    /**
     * Carrega um controlador
     * @param string $lib
     * @return bool
     */
    public static function loadController($controller) {
        $controller = str_replace('\\', '/', $controller);
        $arrController = explode('/', $controller);
        unset($arrController[0]);
        if ($arrController[1] == 'controller')
            unset($arrController[1]);
        $controller = implode('/', $arrController);
        $dir = URL::getFolderProtected('controller/' . $controller . '.php');
        if (file_exists($dir)) {
            include_once $dir;
            return true;
        }
        return false;
    }

    /**
     * Da um auto load nas classes
     * @param string $class
     */
    public static function auto($class) {
        if (!self::wow($class)) {
            self::lib($class);
        }
    }

}
