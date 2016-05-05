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

/**
 * Classe padrão
 *
 * @author Eduardo
 */
class Wow {

    /**
     * Framework Slim
     * @var Slim\App
     */
    public static $slimObj;

    /**
     * Define as constantes de caminho conforme o config.ini
     */
    private static function definePathConstants() {
        $protected = 'protected';
        $admin = 'admin';
        $pathObj = wow\Config::get('path');
        $model = $pathObj->models;
        $controllers = $pathObj->controllers;
        $view = $pathObj->view;
        $viewm = $pathObj->viewmobile;
        define('WOW_ADMIN_PATH', \wow\Storange::getPathDir($admin));
        define('WOW_ADMIN_TEMPLATES_PATH', WOW_ADMIN_PATH . 'templates' . DS);
        define('WOW_PROTECTED_PATH', \wow\Storange::getPathDir($protected));
        define('WOW_CONTROLLER_PATH', WOW_PROTECTED_PATH . $controllers . DS);
        define('WOW_MODELS_PATH', WOW_CONTROLLER_PATH . $model . DS);
        define('WOW_VIEW_PATH', WOW_PROTECTED_PATH . $view . DS);
        define('WOW_VIEWM_PATH', WOW_PROTECTED_PATH . $viewm . DS);
    }

    /**
     * Conecta no banco de dados
     */
    private static function connectDb() {
        $databaseObj = wow\Config::get('database');
        $dsn = "{$databaseObj->type}:host={$databaseObj->server};dbname={$databaseObj->db}";
        R::setup($dsn, $databaseObj->user, $databaseObj->pass);
    }

    /**
     * Inicia a configuração do Systema
     */
    public static function configure() {
        include_once __DIR__ . '/wow/Loader.php';
        wow\Loader::load();
        self::definePathConstants();
        self::$slimObj = new Slim\App();
        unset(self::$slimObj->getContainer()['errorHandler']);
        include_once wow\Storange::getPathFile(\wow\Config::get('path')->configfile);
        self::connectDb();
    }

    /**
     * Executa o sistema
     */
    public static function run() {
        self::$slimObj->run();
    }

}
