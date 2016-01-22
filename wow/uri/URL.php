<?php

namespace wow\uri;

//incluio o fastcach pois já irá inclui-lo
include_once __DIR__ . '/../lib/phpfastcache/phpfastcache.php';

/**
 * Description of Router
 *
 * @author Eduardo
 */
class URL {

    /**
     * Nome da pasta do aplicativo
     * @var String
     */
    private static $folder;

    /**
     * Caminho da pasta do aplicativo
     * @param String $path
     */
    private static $folderPath;

    /**
     * Se tiver true, siginifica que está em um dominio
     * @var bool
     */
    private static $isdominian = false;

    /**
     * Url Absoluta do app
     * @var string
     */
    private static $url = false;

    /**
     * Alias que se encontra o app
     * @var string
     */
    private static $alias;

    /**
     * Diretorio do framwork
     * @var string 
     */
    private static $wowDir = false;

    /**
     * Rota atual do sistema
     * @var string
     */
    private static $route = false;

    /**
     * Seta o caminho do arquivo do index.php
     * @param string $path
     */
    public static function setIndexPath($path) {
        //pega caminho do diretorio
        $dir = dirname($path);

        //seta no path
        self::$folderPath = Helper::strFolderPath($dir);

        //da um explode para separar os nomes dos diretórios
        $arrDir = explode(DIRECTORY_SEPARATOR, $dir);
        //pega o nome do último diretório
        self::$folder = end($arrDir);
    }

    /**
     * Monta a url absoluta
     */
    private static function mountUrl() {
        $url = Helper::getDominianUrl();
        //caso não for na raiz do dominio
        if (!self::$isdominian) {
            //esta calculando rota
            $isRoute = false;
            //passa por todas as pastas do uri até chegar a do aplicativo, ou ao seu alias
            $arrURI = explode('/', $_SERVER['REQUEST_URI']);
            $arrNewURI = array();
            //array da rota
            $arrNewURIRoute = array();
            foreach ($arrURI as $dirURI) {
                if (!empty($dirURI)) {
                    //caso esteja calculando uma rota é colocado dentro do array de rotas
                    if (!$isRoute) {
                        $arrNewURI[] = $dirURI;
                    } else {
                        $arrNewURIRoute[] = $dirURI;
                    }
                    //caso ja tenha chego ao fim, calcula a rota
                    if ($dirURI == self::$folder or $dirURI == self::$alias) {
                        $isRoute = true;
                    }
                }
            }

            //monta a url
            $url .= implode('/', $arrNewURI) . '/';
        }
        self::$url = $url;
    }

    /**
     * Seta se for apenas um dominio
     * @param bool $isDominian
     */
    public static function isDominian($isDominian = true) {
        self::$isdominian = $isDominian;
    }

    /**
     * Seta um alias para que o app use-o para gerenciar as rotas
     * @param string $alias
     */
    public static function setAlias($alias) {
        self::$alias = $alias;
    }

    /**
     * Retorna a url absoluta
     * @param strin $uri uri da url
     * @return string url absoluta
     */
    public static function getUrl($uri = "") {
        $cacheObj = \phpFastCache();
        if (!self::$url) {
            $url = $cacheObj->get("WOW_URL");
            if ($url == null) {
                self::mountUrl();
                $cacheObj->set("WOW_URL", self::$url, 1800);
            } else {
                self::$url = $url;
            }
        }
        return self::$url . $uri;
    }

    /**
     * Carrega a url do folder
     * @param string $folder
     * @return string
     */
    public static function getWowDir($folder = "") {
        if (!self::$wowDir) {
            $dir = realpath(dirname(__FILE__) . '/../');
            self::$wowDir = Helper::strFolderPath($dir);
        }
        return Helper::strFolderPath(self::$wowDir . $folder);
    }

    /**
     * Gera a Rota atual
     */
    public static function genRoute() {
        if (!self::$route) {
            $url = Helper::getDominianUrl() . substr($_SERVER['REQUEST_URI'], 1);
            $absoluteURl = self::getUrl();
            self::$route = '/' . str_replace($absoluteURl, '', $url);
            $arrRoute = explode('?', self::$route);
            self::$route = $arrRoute[0];
        }
        return self::$route;
    }

    /**
     * Volta para a página anterior
     */
    public static function redirBack() {
        self::redir($_SERVER['HTTP_REFERER']);
    }

    /**
     * Redireciona para uma página
     */
    public static function redir($url) {
        header('location: ' . $url);
    }

    /**
     * Retorna a pasta do aplicatico
     * @param string $dir subpasta o aplicativo
     * @return string
     */
    public static function getFolderApp($dir = "") {
        return self::$folderPath . $dir;
    }

    /**
     * Sub pasta da pasta protegida do app
     * @param string $dir
     */
    public static function getFolderProtected($dir) {
        return self::getFolderApp(\wow\Wow::PROTECTED_FOLDER . '/' . $dir);
    }

}
