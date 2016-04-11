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

define('DS', '/');

/**
 * Classe genrenciadora de arquivos
 *
 * @author Eduardo Rafael Correa de Souza
 */
class Storange {

    /**
     * Path do sistema
     * @var String
     */
    private static $basepath = null;

    /**
     * Caminho da pasta do framework
     * @var string
     */
    private static $baseWowPath = null;

    /**
     * Retorna o Path do sistema
     * @return String
     */
    public static function getBasePath() {
        if (is_null(self::$basepath)) {
            self::$basepath = self::pathString(realpath('.'));
        }
        return self::$basepath;
    }

    public static function getBaseWowPath() {
        if (is_null(self::$baseWowPath)) {
            self::$baseWowPath = self::pathString(realpath(dirname(__FILE__) . DS . '..'));
        }
        return self::$baseWowPath;
    }

    /**
     * Coloca o path com o padrao do WOW
     * @param string $dir
     */
    public static function pathString($dir) {
        $dir = str_replace(DIRECTORY_SEPARATOR, DS, $dir);
        $dirlast = substr($dir, -1);
        if ($dirlast != DS) {
            $dir .= DS;
        }
        return $dir;
    }

    /**
     * Coloca o path do file com o padrao do WOW
     * @param string $file
     */
    public static function pathStringFile($file) {
        $file = str_replace(DIRECTORY_SEPARATOR, DS, $file);
        return $file;
    }

    /**
     * Retorna o diretório
     * @param string $dir diretorio para achar dentro do projeto
     * @return string absolute path
     */
    public static function getPathDir($dir) {
        $dir = self::pathString($dir);
        if (substr($dir, 0, 1) == DS) {
            $dir = substr($dir, 1);
        }
        return self::getBasePath() . $dir;
    }

    /**
     * Retorna o arquivo
     * @param string $file arquivo para achar dentro do projeto
     * @return string absolute path
     */
    public static function getPathFile($file) {

        $file = self::pathStringFile($file);
        if (substr($file, 0, 1) == DS) {
            $file = substr($dir, 1);
        }
        return self::getBasePath() . $file;
    }

}
