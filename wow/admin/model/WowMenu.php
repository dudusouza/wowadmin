<?php

namespace wow\admin\model;

/**
 * Modelo de menu do admin
 *
 * @author Eduardo
 */
class WowMenu extends \BaseWowMenu {

    /**
     * Retorna o arquivo do item de menu
     * @return string
     */
    public function getFileByNick() {
        $tblObj = \Doctrine::getTable('WowMenu')->findByNick($this->nick);
        /* @var $tblObj \Doctrine_Collection */
        $tblMenu = $tblObj->getFirst();
        if ($tblMenu) {
            return $tblMenu->file;
        }
        return false;
    }

    /**
     * Gera um array de menus (função recursiva)
     * @param int $parent menu pai
     * @return array
     */
    public function getMenus($parent = 0) {
        $arrMenu = array();
        $dql = \Doctrine_Query::create()
                ->from(WowMenu::class);
        if ($parent > 0) {
            $dql->where('parent_id=' . $parent);
        } else {
            $dql->where('parent_id is null or parent_id = 0');
        }
        $arrDql = $dql->fetchArray();
        foreach ($arrDql as $arr) {
            $arrSub = $this->getMenus($arr['menu_id']);
            $arrMenuData = array('menu' => $arr);
            $arrMenuData['sub'] = $arrSub;
            $arrMenu[] = $arrMenuData;
        }
        return $arrMenu;
    }

    /**
     * Retorna os dados do menu por string
     * @param string $nick
     * @return array
     */
    public static function getMenu($nick) {
        $dql = \Doctrine_Query::create()
                ->from('WowMenu')
                ->where("nick=?", $nick);
        return $dql->fetchOne(array(), \Doctrine::HYDRATE_ARRAY);
    }

}
