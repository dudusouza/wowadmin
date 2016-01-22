<?php
$dir = wow\uri\Helper::strFolderPath(dirname(__FILE__));
include_once $dir.'Doctrine.php';


spl_autoload_register(array('Doctrine', 'autoload'));

//conecta com o banco
$liveConObj = new wow\conn\LiveConnection();
$liveConObj->conn();


Doctrine::setModelsDirectory(wow\uri\URL::getFolderProtected('model'));
spl_autoload_register(array('Doctrine', 'modelsAutoload'));