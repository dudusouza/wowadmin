<?php
include_once './exec_time.php';
startExec();

//inclui o framework
include_once '../wow/Wow.php';
//registra o auto para carregar as classes automaticamente
wow\Wow::autoLoadRegister();

$php = phpFastCache();

//Informa ao wow a index para que possa saber qual é o diretorio do aplicativo
wow\uri\URL::setIndexPath(__FILE__);

wow\Wow::setCacher(false);
wow\uri\AutoLoad::loadLib('Doctrine');

//carrega as configs principais do sistema
include_once './protected/config/wow.conf.php';


//Inicia a aplicação
wow\Wow::start();

file_put_contents('exectime.ini', 'exectime='.endExec());