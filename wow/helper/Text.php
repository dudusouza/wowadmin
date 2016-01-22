<?php

namespace wow\helper;

/**
 * Classe de apoio para strings
 *
 * @author Eduardo
 */
class Text {

    public static function mask($mascara, $string) {
        $mascara = str_replace('9', '#', $mascara);
        $string = str_replace(' ', '', $string);
        for ($i = 0; $i < strlen($string); $i++) {
            $mascara[strpos($mascara, '#')] = $string[$i];
        }
        return $mascara;
    }

    /**
     * Remove a mascara
     * @param string $mascara mascara
     * @param string $string string para remover a mascara
     * @return string
     */
    public static function unmask($mascara, $string) {
        $mascara = str_replace('9', '#', $mascara);
        if (strlen($string) == strlen($mascara)) {
            $newString = '';
            for ($i = 0; $i < strlen($mascara); $i++) {
                if ($mascara[$i] != '#') {
                    $newString .= $string[$i];
                }
            }
            $string = $newString;
        }
        return $string;
    }

}
