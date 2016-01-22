<?php

namespace wow\conn;

/**
 * Classe de conexão do sistema
 *
 * @author Eduardo
 */
class LiveConnection {
    //mysql://username:password@localhost/test

    /**
     * Retorna o INI
     * @return string       
     */
    private function readINI() {
        return \wow\config\Configuration::getSection('database');
    }

    /**
     * Retorna o DSN conforme a configuração do banco de dados
     * @return string dsn
     */
    private function dsnByIni() {
        $arrIni = $this->readINI();
        $dsn = $arrIni['type'];
        $dsn .= '://';
        $dsn .= $arrIni['user'];
        $dsn .= ':';
        $dsn .= $arrIni['pass'];
        $dsn .= '@';
        $dsn .= $arrIni['server'];
        if (isset($arrIni['port'])) {
            $dsn .= ':';
            $dsn .= $arrIni['port'];
        }
        $dsn .= '/';
        $dsn .= $arrIni['db'];
        return $dsn;
    }

    /**
     * Conecta com o banco de dados conforme o .ini do config
     */
    public function conn() {
        $dsn = $this->dsnByIni();
        \Doctrine_Manager::connection($dsn, \Doctrine::DOCTRINE_CONNECTION_DEFAULT);
    }
    
    /**
     * Gera os modelos conforme o banco
     */
    public static function generateDB() {
        \Doctrine::generateModelsFromDb(\wow\uri\URL::getFolderProtected('model/'), array(\Doctrine::DOCTRINE_CONNECTION_DEFAULT), array('generateTableClasses' => true));
    }

}
