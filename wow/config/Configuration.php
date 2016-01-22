<?php

namespace wow\config;

/**
 * Configurador do sistema
 *
 * @author Eduardo
 */
class Configuration {

    /**
     * Array de configuração do INI
     * @var array
     */
    private static $arrIni = array();

    /**
     * Retorna o INI de configuração
     * @return array array do parse do ini
     */
    private static function setAllINI() {
        if (empty(self::$arrIni)) {
            $fastObj = phpFastCache();
            self::$arrIni = $fastObj->get('WOW_CONFIGURATION');
            if (is_null(self::$arrIni) or !\wow\Wow::isCache()) {
                $fileConfig = \wow\uri\URL::getFolderProtected('config/app.conf.ini');
                if (!file_exists($fileConfig)) {
                    \wow\exception\General::breakError("Configuration file not fountd.");
                }
                self::$arrIni = Helper::parseINI($fileConfig);
                $fastObj->set("WOW_CONFIGURATION", self::$arrIni,86400);
            }
        }
    }

    /**
     * Retorna os dados de um parametro
     * @param string $section sessão do parametro
     * @param string $key nome do paramtro
     * @return string parametro
     */
    public static function getParam($section, $key) {
        self::setAllINI();
        if (isset(self::$arrIni[$section][$key])) {
            return self::$arrIni[$section][$key];
        }
        return null;
    }

    /**
     * Retorna os dados de uma section
     * @param string $section section
     * @return array section
     */
    public static function getSection($section) {
        self::setAllINI();
        if (isset(self::$arrIni[$section])) {
            return self::$arrIni[$section];
        }
        return null;
    }

}
