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
 * Controlador Sistema
 *
 * @author Eduardo Rafael Correa de Souza
 */
class Controller {

    /**
     * Array de variaveis do site
     * @var array
     */
    private $arrVar = array();

    /**
     * Array de parametros
     * @var array
     */
    private $arrParams;

    private function pathview() {
        $isviewm = Config::get('system')->mobileview;
        $sitetheme = Config::get('theme')->site;
        $view = WOW_VIEW_PATH;
        if ($isviewm) {
            $view = WOW_VIEWM_PATH;
        }
        return $view.$sitetheme.DS;
    }

    /**
     * Verifica se é mobile
     * @return string
     */
    protected function isMobile() {
        $mobileDetect = new \Mobile_Detect();
        return $mobileDetect->isMobile();
    }

    /**
     * Seta um array de parametros
     * @param array $arrParams
     */
    public function _setParams($arrParams) {
        $this->arrParams = $arrParams;
    }

    /**
     * Retorna o parametro
     * @param string $param nome do paramtro para retornar
     * @return string
     */
    protected function getParam($param) {
        if (isset($this->arrParams[$param])) {
            return $this->arrParams[$param];
        }
        return null;
    }

    /**
     * Assina uma variavel no template
     * @param public $var
     * @param public $value
     */
    public function assign($var, $value) {
        $this->arrVar[$var] = $value;
    }

    /**
     * Renderiza o template
     * @param string $file
     * @throws exceptions\LoadFiles
     */
    protected function render($file) {
        $view = $this->pathview();
        $fileview = $view . $file . '.php';
        if (file_exists($fileview)) {
            foreach ($this->arrVar as $var => $val) {
                $$var = $val;
            }
            include $fileview;
        } else {
            throw new exceptions\LoadFiles('View ' . $fileview . ' not exists');
        }
    }

}
