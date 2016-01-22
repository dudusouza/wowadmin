<?php

namespace wow\admin;

/**
 * Classe de administração
 *
 * @author Eduardo
 */
class Administrator {

    /**
     * Classe do smarty
     * @var \Smarty
     */
    private static $smarty = false;

    /**
     * Retorna o smarty template
     * @return \Smarty
     */
    public static function getSmarty() {
        if (!self::$smarty) {
            self::$smarty = new \Smarty();
            self::$smarty->setCacheDir(\wow\uri\URL::getWowDir('admin/cache/cache/'));
            self::$smarty->setCompileDir(\wow\uri\URL::getWowDir('admin/cache/compile/'));
            self::$smarty->setTemplateDir(\wow\uri\URL::getWowDir('admin/_templates/'));
            self::$smarty->setBlockPluginLang();
        }
        return self::$smarty;
    }

    /**
     * Executa o arquivo
     * @param string $file caminho do arquivo
     */
    private function execFile($file) {
        $filepath = \wow\uri\URL::getFolderProtected("adm/$file.php");
        if (file_exists($filepath)) {
            include_once \wow\uri\URL::getFolderProtected("adm/$file.php");
            $file = "\\$file";
            $classObj = new $file();
            /* @var $classObj \wow\admin\Form */
            return $classObj;
        }
        return false;
    }

    /**
     * Retorna o formulario
     * @param string $menu
     * @return \wow\admin\Form
     */
    public function form($menu) {
        $menuObj = new model\WowMenu();
        $menuObj->nick = $menu;
        $file = $menuObj->getFileByNick();
        if (!is_null($file)) {
            return $this->execFile($file);
        }
        return false;
    }

}
