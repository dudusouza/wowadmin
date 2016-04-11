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

namespace admin\lib\database\gentable;

/**
 * Gera os dados da tabela
 *
 * @author Eduardo Rafael Correa de Souza
 */
class Data {

    /**
     * Array do arquivo com todas as tabelas
     * @var array
     */
    private static $arrFile = null;

    /**
     * Retorna a chave primária da tabela
     * @param array $arrFields campos da tabela
     * @return string
     */
    private function getArrFieldsPrimary($arrFields) {
        foreach ($arrFields as $arrField) {
            if ($arrField['Key'] == 'PRI') {
                return $arrField['name'];
            }
        }
        return null;
    }

    /**
     * Gera o array com os dados de todas as tabelas
     * @return array
     */
    private function genArray() {
        $arrData = array();
        $arrTables = Information::getAllTables();
        foreach ($arrTables as $arrTable) {
            $table = $arrTable[0];
            $arrFields = Information::getDataTable($table);
            $pkname = $this->getArrFieldsPrimary($arrFields);
            if (!is_null($pkname)) {
                $arrData[$table]['fields'] = $arrFields;
                $arrData[$table]['pk'] = $pkname;
            }
        }
        return $arrData;
    }

    /**
     * Gera o arquivo com os dados da tabela
     */
    public function genFile() {
        $arrTables = $this->genArray();
        self::$arrFile = $arrTables;
        $seriable = serialize($arrTables);
        unset($arrTables);
        $cripter = \wow\Crypter::encrypt($seriable);
        $file = WOW_ADMIN_PATH . 'config' . DS . 'database.wow';
        file_put_contents($file, $cripter);
    }

    /**
     * Retorna os dados das tabelas
     * @return array
     */
    public function getDataTables() {
        if (is_null($var)) {
            $file = WOW_ADMIN_PATH . 'config' . DS . 'database.wow';
            if(!file_exists($file)){
                $this->genFile();
            }
            $cripter = file_get_contents($file);
            $seriable = \wow\Crypter::decrypt($cripter);
            self::$arrFile = unserialize($seriable);
        }
        return self::$arrFile;
    }

    /**
     * Retorna os dados da tabela
     * @param string $table nome da tabela para recuperar as informações
     * @return array|null
     */
    public function getDataTable($table) {
        $arrTables = $this->getDataTables();
        if (isset($arrTables[$table])) {
            $table = $arrTables[$table];
            unset($arrTables);
            return $table;
        }
        return null;
    }

}
