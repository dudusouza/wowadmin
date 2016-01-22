<?php

wow\uri\Router::addRoute('/', '\controller\app\MainController', 'index');
wow\uri\Router::addRoute('/admin', '\controller\admin\MainController', 'index');
wow\uri\Router::addRoute('/admin/:menu', '\controller\admin\MainController', 'menu');
wow\uri\Router::addRoute('/admin/:menu/:view', '\controller\admin\MainController', 'menu');
wow\uri\Router::addRoute('/admin/:menu/:view/:id', '\controller\admin\MainController', 'menu');
wow\uri\Router::addRoute('/admin/:menu/:view/action/:action', '\controller\admin\MainController', 'menuaction');
wow\uri\Router::addRoute('/admin/:menu/:view/action/:action/:param', '\controller\admin\MainController', 'menuaction');

/*
 * Lógica da rota do admin
 * /menu/submenu
 * /menu/submenu/view
 * /menu/submenu/view/action/:action
 * /menu/submenu/view/action/:action/:id
 * /menu/submenu/view/routines/:action
 */