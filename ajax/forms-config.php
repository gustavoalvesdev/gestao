<?php 

session_start();
date_default_timezone_set('America/Sao_Paulo');

sleep(2);

spl_autoload_register(function($class) {
	if (file_exists('../classes/'.$class.'.php')) {
		require_once '../classes/'.$class.'.php';
	}
});

define('INCLUDE_PATH','http://localhost/gestao/');

//Conectar com banco de dados!
define('HOST','localhost');
define('USER','root');
define('PASSWORD','');
define('DATABASE','gestao');

$data['sucesso'] = true;
$data['mensagem'] = '';

if (Painel::logado() == false) {
	die('Você não está logado!');
}
