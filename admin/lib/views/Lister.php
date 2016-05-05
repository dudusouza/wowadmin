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

/**
 * View da listagem
 *
 * @author Eduardo Rafael Correa de Souza
 */
class Lister extends \admin\lib\Views implements \admin\lib\IViews{

    CONST WIDGET_LOCATION_TOP = 'TOP';
    CONST WIDGET_LOCATION_LEFT = 'LEFT';
    CONST WIDGET_LOCATION_RIGHT = 'RIGHT';

    /**
     * Retorna a paginação
     * @return \wow\database\Pager
     */
    private function pager() {
        $rpObj = $this->formObj->getRp();
        $sql = $this->formObj->getSql();
        return new wow\database\Pager($sql, $rp);
    }
    
    public function show() {
        ;
    }

}
