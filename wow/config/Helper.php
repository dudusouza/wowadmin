<?php

namespace wow\config;

/**
 * Classe de apoio para o config
 *
 * @author Eduardo
 */
class Helper {

    /**
     * Abre arquivo em modo protegido
     * @param type $fileName
     * @param type $dataToSave
     */
    private static function safefilerewrite($fileName, $dataToSave) {
        if ($fp = fopen($fileName, 'w')) {
            $startTime = microtime(TRUE);
            do {
                $canWrite = flock($fp, LOCK_EX);
                // If lock not obtained sleep for 0 - 100 milliseconds, to avoid collision and CPU load
                if (!$canWrite)
                    usleep(round(rand(0, 100) * 1000));
            } while ((!$canWrite)and ( (microtime(TRUE) - $startTime) < 5));

            //file was locked so now we can store information
            if ($canWrite) {
                fwrite($fp, $dataToSave);
                flock($fp, LOCK_UN);
            }
            fclose($fp);
        }
    }

    /**
     * Escreve no arquivo INI
     * @param array $array
     * @param array $file
     */
    public static function WriteINI($array, $file) {
        $res = array();
        foreach ($array as $key => $val) {
            if (is_array($val)) {
                $res[] = "[$key]";
                foreach ($val as $skey => $sval)
                    $res[] = "$skey = " . (is_numeric($sval) ? $sval : '"' . $sval . '"');
            } else
                $res[] = "$key = " . (is_numeric($val) ? $val : '"' . $val . '"');
        }
        self::safefilerewrite($file, implode("\r\n", $res));
    }
    
    /**
     * Transforma um ini em um array para trabalhar com os dados
     * @param string $inifile arquivo de configuração
     * @return array array bidimensional do INI
     */
    public static function parseINI($inifile){
        return parse_ini_file($inifile,true);
    }
}
