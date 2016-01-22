<?php

namespace wow\helper;

/**
 * Helper da Table do doctrine
 *
 * @author Eduardo
 */
class Table {

    /**
     * Retorna o nome da PK da tabela
     * @param string $table nome da tabela
     * @return string|boolean
     */
    public static function getPkName($table) {
        $tblObj = new $table();
        /* @var $tblObj \Doctrine_Table */
        $arrFields = $tblObj->getTable()->getColumns();
        foreach ($arrFields as $name => $arrField) {
            if ($arrField['primary']) {
                return $name;
            }
        }
        return false;
    }

}
