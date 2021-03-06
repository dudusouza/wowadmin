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

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

/**
 * Classe de manutenção de Rotas
 *
 * @author Eduardo Rafael Correa de Souza
 */
class Route {

    const ROUT_TYPE_ANY = 'any';
    const ROUT_TYPE_POST = 'post';
    const ROUT_TYPE_GET = 'get';

    /**
     * Adiciona uma rota
     * @param string $route caminho da rota
     * @param string $controller nome do controlador
     * @param string $method nome do método para ser acionado
     * @param string $type tipo da rota se for post,get ou qualquer uma (any)
     */
    public static function addRoute($route, $controller, $method, $type = Route::ROUT_TYPE_ANY) {
        new route\Item(\Wow::$slimObj, $route, $controller, $method, $type);
    }


}
