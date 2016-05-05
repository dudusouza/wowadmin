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

namespace wow;

/**
 * Classe de template do admin
 *
 * @author Eduardo Rafael Correa de Souza
 */
class Template {
    
    
    public function render($file) {
        $template = 'wow';
        $templatePath = WOW_ADMIN_TEMPLATES_PATH . $template . DS;
        $filePath = $template . $file;
    }
}
