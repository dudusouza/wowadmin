<?php

namespace wow;

/**
 * Classe que realiza os loaders
 *
 * @author Eduardo Souza
 */
class Loader {

    /**
     * Carrega os arquivos excenciais
     */
    private static function initialLoad() {
        include_once __DIR__ . '/Storange.php';
        Storange::getPathDir('wowframework/');
        include_once __DIR__ . '/exceptions/LoadFiles.php';
    }

    /**
     * Carrega o arquivo Vendor
     */
    private static function vendor() {
        $file = Storange::getPathFile('vendor/autoload.php');
        if (file_exists($file)) {
            include_once $file;
        } else {
            throw new exceptions\LoadFiles('Error to load vendor autoload. Check the composer libs', 0);
        }
    }
    
    /**
     * Carrega as bibliotecas de base para o sistema
     */
    private static function loadLibs(){
        $file = Storange::getBaseWowPath().'wow/lib/readbeans/rb.php';
        if(file_exists($file)){
            include_once $file;
        }
    }

    /**
     * Faz o auto load das classes do site
     * @param string $class
     */
    public static function autLoad($class){
        $arrDirs = array('adimn/class', 'wowframework', 'wowframework/wow','wowframework/wow/lib','lib');
        foreach ($arrDirs as $dir){
            $path = Storange::getPathDir($dir);
            $file = Storange::pathStringFile($path.$class.'.php');
            if(file_exists($file)){
                include_once $file;
            }
        }
    }
    
    /**
     * Faz o carregamento automatico das classes do sistema
     */
    public static function load() {
        self::initialLoad();
        self::vendor();
        self::loadLibs();
        //registra o SLP AUTO LOAD
        spl_autoload_register(array('\wow\Loader','autLoad'));
    }

}
