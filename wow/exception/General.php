<?php
namespace wow\exception;

/**
 * Erros geral do Sistema
 *
 * @author Eduardo
 */
class General {
    
    public static function breakError($error){
        die($error);
    }
    
}
