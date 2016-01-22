<?php

namespace controller\admin;

/**
 * Controlador do app
 *
 * @author Eduardo
 */
class MainController extends \wow\Controller {

    public function __construct() {
        parent::__construct();
        define('WOW_ADMIN', true);
        $menuObj = new \wow\admin\model\WowMenu();
        $this->assign('admmenu', $menuObj->getMenus());
        $this->assign('SITE_ADMIN', \wow\uri\URL::getUrl('admin/'));
    }

    public function index() {
        $this->view('home');
    }

    public function menu() {
        $menu = $this->getParam("menu");
        $view = $this->getParam("view");
        $id = $this->getParam("id");
        
        define('__MENU__', $menu);
        $admObj = new \wow\admin\Administrator();
        $formObj = $admObj->form($menu, $view);
        $formObj->getTableObj(is_null($id) ? false : $id);
        if(!is_null($id)){
            $formObj->setDataForTable();
        }
        $menuObj = \wow\admin\model\WowMenu::getMenu($menu);
        $this->assign('form', $formObj->show($view));
        $this->assign('formurl', $formObj->getUrl());
        $this->assign('menuname', $menuObj['name']);
        $this->view('form');
    }

    public function menuaction() {
        if (isset($_SERVER['HTTP_REFERER']) and ! empty($_SERVER['HTTP_REFERER'])) {
            $menu = $this->getParam("menu");
            $view = $this->getParam("view");
            $action = $this->getParam("action");
            $param = $this->getParam("param");
            define('__MENU__', $menu);
            $admObj = new \wow\admin\Administrator();
            $formObj = $admObj->form($menu, $view);
            $menuObj = \wow\admin\model\WowMenu::getMenu($menu);
            if ($menuObj) {
                $this->assign('form', $formObj->show($view, $action, $param));
                $this->assign('menuname', $menuObj['name']);
                $this->view('form');
            }
            die('404');
        } else {
            die('Forbiden');
        }
    }

}
