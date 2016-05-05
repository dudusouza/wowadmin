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

namespace wow\database;

/**
 * Paginação
 *
 * @author Eduardo Rafael Correa de Souza
 */
class Pager {

    /**
     * Sql para paginação
     * @var string
     */
    private $sql;

    /**
     * Records per Page
     * @var rp\Rp
     */
    private $rpObj;

    /**
     * Página atual
     * @var int
     */
    private $curPage;

    /**
     * Numero de páginas
     * @var int
     */
    private $pages;

    /**
     * Seta uma ordenação
     * @var string
     */
    private $order = false;

    public function __construct($sql, rp\Rp $rp, $curPage = 1) {
        $this->rpObj = $rp;
        $this->sql = $sql;
        if (is_null($curPage) or empty($curPage) or $curPage < 1) {
            $curPage = 1;
        }
        $this->curPage = $curPage;
    }

    /**
     * Conta as linhas totais do SELECT
     * @return int
     */
    private function getData() {
        $rp = $this->rpObj->getRp();
        $page = ($this->curPage - 1) * $this->rpObj->getRp();
        $orderSql = "";
        if ($this->order) {
            $orderSql = " ORDER BY {$this->order}";
        }
        $sqlCount = "SELECT * AS QNT FROM ({$this->sql}) AS TABLE $orderSql LIMIT $page,$rp";
        return (int) \R::getAll($sqlCount);
    }

    /**
     * Conta as linhas totais do SELECT
     * @return int
     */
    private function countLines() {
        $sqlCount = "SELECT COUNT(*) AS QNT FROM ({$this->sql}) AS TABLE";
        return (int) \R::getCol($sqlCount);
    }

    /**
     * Retorna a página atual
     * @return type
     */
    public function getCurrent() {
        return $this->curPage;
    }

    /**
     * Retorna o número de páginas
     * @return int
     */
    public function getNumberPages() {
        return $this->pages;
    }

    /**
     * Seta ordenação
     * @param string $order campos para ordenação
     */
    public function setOrder($order) {
        $this->order = $order;
    }

    /**
     * Retorna os dados do banco conforme a page e o RP
     * @return array
     */
    public function fetchAll() {
        $lines = $this->countLines();
        $pages = ceil($lines / $this->rpObj->getRp());
        $this->pages = $pages;
        if ($this->curPage > $pages) {
            $this->curPage = $pages;
        }
        $arrData = $this->getData();
        return $arrData;
    }

}
