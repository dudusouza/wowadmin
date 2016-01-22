<?php

/*
 *  $Id: Doctrine.php 7490 2010-03-29 19:53:27Z jwage $
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the LGPL. For more information, see
 * <http://www.doctrine-project.org>.
 */

require_once 'Doctrine/Core.php';

/**
 * This class only exists for backwards compatability. All code was moved to 
 * Doctrine_Core and this class extends Doctrine_Core
 *
 * @package     Doctrine
 * @author      Konsta Vesterinen <kvesteri@cc.hut.fi>
 * @author      Lukas Smith <smith@pooteeweet.org> (PEAR MDB2 library)
 * @license     http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link        www.doctrine-project.org
 * @since       1.0
 * @version     $Revision: 7490 $
 */
class Doctrine extends Doctrine_Core {

    const DOCTRINE_CONNECTION_DEFAULT = 'siteconn';

    /**
     * Retorna a conexão
     * @return Doctrine_Connection
     */
    public static function getConn() {
        return Doctrine_Manager::getInstance()->getConnection(DOCTRINE_CONNECTION_DEFAULT);
    }

    /**
     * Retorna um array da primeira linha do SQL
     * @param string $statement
     * @return array
     */
    public static function fetchSql($statement) {
        $connObj = self::getConn();
        $statementObj = $connObj->prepare($statement);
        return $statementObj->fetch(Doctrine_Core::FETCH_ASSOC);
    }

    /**
     * Retorna um array bidimensional da consulta do SQL
     * @param string $statement
     * @return array
     */
    public static function fetchAllSql($statement) {
        $connObj = self::getConn();
        $statementObj = $connObj->prepare($statement);
        return $statementObj->fetchAll(Doctrine_Core::FETCH_ASSOC);
    }

    /**
     * Executa um SQL
     * @param string $statement
     * @return integer numero de linhas afetadas
     */
    public static function execSql($statement) {
        $connObj = self::getConn();
        return $connObj->exec($statement);
    }

    /**
     * Retorna o último ID inserido no banco
     * @return int último ID
     */
    public static function lastId() {
        return self::getConn()->lastInsertId();
    }

    /**
     * Carrega os modelos do doctrine
     * @param string $className
     */
    public static function modelsAutoload($className) {
        $loaded = parent::modelsAutoload($className);
        if(!$loaded){
            $modelPath = \wow\uri\Helper::strFolderPath(self::getModelsDirectory());
            $modelPath .= 'generated/';
            if(file_exists($modelPath.$className.'.php')){
                include_once $modelPath.$className.'.php';
            }
        }
    }
}
