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
 * Pega as informações do banco de dados
 *
 * @author Eduardo Rafael Correa de Souza
 */
class Information {
    
    /**
     * Retorna os dados de todas as tabelas;
     * @return array
     */
    public static function getAllTables(){
        $sql = "Show Tables";
        $arrTables = \R::getAll($sql);
        return $arrTables;
    }
    
    /**
     * Retorna os dados da tabela
     * @param string $table nome da tabela
     * @return array
     */
    public static function getDataTable($table){
        $sql = "Describe $table";
        return \R::getAll($sql);
    }
    
}
