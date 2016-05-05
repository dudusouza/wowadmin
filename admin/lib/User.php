<?php

/*
 * Copyright (C) 2016 Lucas
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

namespace admin\lib;

/**
 * Manutenção do usuário
 *
 * @author Eduardo Rafael Correa de Souza
 */
class User {
    
    /**
     * Retorna o tipo de permissão (retornado do banco de dados)
     * @return string
     */
    public function getPermission(){
        return 'RW';
    }

    /**
     * Verifica se o usuário tem permissão
     * @param string $permission
     * @return string
     */
    public function checkPermission($permission){
        return strpos($this->getPermission(), $permission) === true;
    }
    
}
