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

namespace wow\database\rp;

/**
 * Classe para dados RP
 *
 * @author Eduardo Rafael Correa de Souza
 */
class Rp {

    /**
     * Variavel default do get
     */
    const DEFAULT_PAGER_GET = 'wow_pager';

    /**
     * Records por página padrão
     */
    const DEFAULT_RP = 30;

    /**
     * Total de RP
     * @var int
     */
    private $rp = null;

    /**
     * Se estiver setado será statico
     * @var string
     */
    private $isStatic = true;

    public function __construct($rp = false) {
        if ($this->rp) {
            $this->rp = $rp;
        } else {
            $this->isDynamic();
        }
    }

    /**
     * Seta o RP como dinamico
     */
    public function isDynamic() {
        $this->isStatic = false;
        $rp = filter_input(INPUT_GET, self::DEFAULT_PAGER_GET);
        if (is_null($rp)) {
            $rp = 1;
        }
        $this->rp = $rp;
    }

    /**
     * Retorna o RP
     * @return int
     */
    public function getRp() {
        if ($this->isStatic) {
            if (is_null($this->rp)) {
                return self::DEFAULT_RP;
            }
        }
        return $this->rp;
    }

}
