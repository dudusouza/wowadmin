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

namespace admin\lib\form;

/**
 * Classe base para os campos
 *
 * @author Eduardo Rafael Correa de Souza
 */
abstract class Field {

    /**
     * Nome do campo
     * @var string
     */
    protected $name;

    /**
     * Label do campo que será exibido para o usuário
     * @var string
     */
    protected $label;

    /**
     * Formulário a quem ele pertence
     * @var \admin\lib\Form
     */
    protected $formObj;

    /**
     * Valor atual do campo
     * @var null|string 
     */
    protected $value = null;

    /**
     * Constroi o objeto e seta o nome e o label
     * @param string $name nome do campo no DB
     * @param string $label label que será exibido para o cliente
     */
    public function __construct($name, $label = null) {
        $this->name = $name;
        $this->label = $label;
    }

    /**
     * Seta o formutário
     * @param \admin\lib\Form $formObj
     */
    public function setForm(\admin\lib\Form $formObj) {
        if (is_object($formObj)) {
            $this->formObj = $formObj;
        }
    }

    /**
     * Seta o valor vindo do DB
     * @param mixed $val
     */
    public function setValue($val) {
        $this->value = $val;
    }

    /**
     * Seta valor recebido por post
     * @param string $val
     */
    public function setPostVal($val) {
        $this->value = $val;
    }

}
