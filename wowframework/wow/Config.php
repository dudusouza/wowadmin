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

namespace wow;

/**
 * Classe de configuração
 *
 * @author Eduardo Rafael Correa de Souza
 */
class Config {

    /**
     * Arquivo do INI
     * @var array
     */
    private static $arrFile = null;

    /**
     * Sessão do site
     * @var type 
     */
    private $section = null;

    public function __construct($section = null) {
        $this->setArr();
        $this->section = $section;
    }

    /**
     * Retorna a Key
     * @param type $name
     * @return type
     */
    public function __get($name) {
        return $this->getKey($name);
    }

    /**
     * Recupera o arquivo de config
     * @return type
     */
    private function getFile() {
        $file = Storange::getPathFile('config.ini');
        return file_exists($file) ? $file : false;
    }

    /**
     * Seta o array
     */
    private function setArr() {
        if (is_null(self::$arrFile)) {
            $file = $this->getFile();
            if ($file) {
                self::$arrFile = parse_ini_file($this->getFile(), true);
            } else {
                throw new exceptions\LoadFiles('Not found file config');
            }
        }
    }

    /**
     * Retorna a chave de configuração
     * @param string $name
     * @return mixed
     */
    public function getKey($name) {
        if (!is_null($this->section)) {
            if (isset(self::$arrFile[$this->section])) {
                if (isset(self::$arrFile[$this->section][$name])) {
                    return self::$arrFile[$this->section][$name];
                }
            }
        }
        return null;
    }

    /**
     * Retorna a config com a section
     * @param string $section
     * @return \wow\Config
     */
    public static function get($section) {
        return new Config($section);
    }

}
