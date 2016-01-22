<?php
namespace wow\uri;

/**
 * Helper da URI
 *
 * @author Eduardo
 */
class Helper {

    /**
     * Verifica se esta em uma página com ssl (HTTPS)
     * @return bool
     */
    public static function isSecure() {
        return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443;
    }
    
    /**
     * Gera a URL de domínio
     * @return string
     */
    public static function getDominianUrl(){
        $http = (self::isSecure() ? 'https' : 'http') . '://';
        $dominio = $_SERVER['HTTP_HOST'];
        $url = $http . $dominio . '/';
        return $url;
    }
    
    /**
     * Tranforma diretorio para que a string fique padrao wow
     * @param string $dir
     * @return string
     */
    public static function strFolderPath($dir){
        $dir = str_replace('\\', DIRECTORY_SEPARATOR, $dir);
        $dir = str_replace('/', DIRECTORY_SEPARATOR, $dir);
        if(substr($dir, -1)!==DIRECTORY_SEPARATOR){
            $dir .= DIRECTORY_SEPARATOR;
        }
        return $dir;
    }

}
