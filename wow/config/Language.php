<?php

namespace wow\config;

/**
 * Linguagem do sistema
 *
 * @author Eduardo
 */
class Language {

    /**
     * Array de configuração do INI
     * @var array
     */
    private static $arrIni = array();

    /**
     * Retorna o INI de configuração do idioma
     * @param string $file arquivo de idioma para usar
     * @return array array do parse do ini
     */
    private static function setAllINI($file) {
        if (!isset(self::$arrIni[$file])) {
            $lang = Configuration::getParam('global', 'language');
            $fastObj = phpFastCache();
            self::$arrIni[$file] = $fastObj->get('WOW_LANG'.$file);
            if (is_null(self::$arrIni[$file]) or !\wow\Wow::isCache()) {
                $fileConfig = \wow\uri\URL::getFolderProtected('lang/' . $lang . '/' . $file . '.ini');
                if (!file_exists($fileConfig)) {
                    \wow\exception\General::breakError("Configuration file not fountd.");
                }
                self::$arrIni[$file] = Helper::parseINI($fileConfig);
                $fastObj->set("WOW_LANG".$file, self::$arrIni, 86400);
            }
        }
    }

    /**
     * Retorna os dados de um parametro
     * @param string $section sessão do parametro
     * @param string $key nome do paramtro
     * @param string $file arquivo de idioma para usar
     * @return string parametro
     */
    public static function getParam($section, $key, $file = 'system') {
        self::setAllINI($file);
        if (isset(self::$arrIni[$file][$section][$key])) {
            return self::$arrIni[$file][$section][$key];
        }
        return null;
    }

    /**
     * Retorna os dados de uma section
     * @param string $section section
     * @param string $file arquivo de idioma para usar
     * @return array section
     */
    public static function getSection($section, $file = 'system') {
        self::setAllINI($file);
        if (isset(self::$arrIni[$section][$file])) {
            return self::$arrIni[$section][$file];
        }
        return null;
    }

}
