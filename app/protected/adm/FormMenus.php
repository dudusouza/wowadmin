<?php

use wow\admin\components\form;

/**
 * Description of FormMenus
 *
 * @author Lucas
 */
class FormMenus extends \wow\admin\Form {

    public function __construct() {
        parent::__construct('WowMenu', null);
    }

    /**
     * Retorna um array de arquivos
     * @return array
     */
    private function getArrFiles() {
        $dir = __DIR__ . '/*.php';
        $arrFilesPath = glob($dir);
        $arrFiles = array();
        foreach ($arrFilesPath as $file) {
            $file = str_replace('\\', '/', $file);
            $arrFileExplode = explode('/', $file);
            $file = end($arrFileExplode);
            $arrFiles[]['file'] = str_replace('.php', '', $file);
        }
        return $arrFiles;
    }

    public function config() {
        $this->addTab('data', 'Dados');

        $name = new form\Text('name', 'Nome');
        $this->addField($name);

        $nick = new form\Text('nick', 'Apelido');
        $this->addField($nick);



        $file = new form\Combo('file', 'Arquivo');
        $file->addArray('file', 'file',$this->getArrFiles());
        $this->addField($file, 'data');
    }

}
