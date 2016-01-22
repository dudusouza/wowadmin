<?php

namespace wow\base;

/**
 * Classe de base padrão para o sistema
 *
 * @author Eduardo
 */
abstract class Wow {

    /**
     * Variavel booleana que diz se vai ou não armazenar cache
     * @var bool
     */
    private static $cacher = true;

    /**
     * Seta se irá armazenar cache
     * @param bool $bool
     */
    public static function setCacher($bool) {
        self::$cacher = $bool;
    }

    /**
     * Verifica se armazena o cache
     * @return string
     */
    public static function isCache() {
        return self::$cacher;
    }

    /**
     * Adiciona as rotas ao sistema
     */
    private static function addRoutes() {
        include_once \wow\uri\URL::getFolderProtected('config/router.php');
    }

    /**
     * Registra o autoload para fazer o include automatico das classes
     */
    public static function autoLoadRegister() {
        //Carrega o diretorio atual para dar os includes
        $dir = dirname(__FILE__) . DIRECTORY_SEPARATOR;
        $dir = str_replace(DIRECTORY_SEPARATOR, "/", $dir);
        //da o include no helper e no autoload
        include_once $dir . '../uri/Helper.php';
        include_once $dir . '../uri/URL.php';
        include_once $dir . '../uri/AutoLoad.php';
        //Registra o autoload
        spl_autoload_register(array('wow\uri\AutoLoad', 'auto'));
    }

    /**
     * Inicia a aplicação
     */
    public static function start() {
        self::addRoutes();
        \wow\uri\Router::route(\wow\uri\URL::genRoute());
    }

}
