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
 * Criptografa e decripta strings
 *
 * @author Eduardo Rafael Correa de Souza
 */
class Crypter {

    /**
     * Criptografa uma string
     * @param string $text
     * @return string
     */
    public static function encrypt($text) {
        $salt = hash('sha256', Config::get('system')->keysecurity);
        return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
    }

    /**
     * Descriptografa uma string criptografada
     * @param string $text
     * @return string
     */
    public static function decrypt($text) {
        $salt = hash('sha256', Config::get('system')->keysecurity);
        return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $salt, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
    }

}
