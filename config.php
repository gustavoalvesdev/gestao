<?php

	session_start();
	date_default_timezone_set('America/Sao_Paulo');

	require_once 'environment.php';

	$autoload = function($class){
		if($class == 'Email'){
			require_once('classes/phpmailer/PHPMailerAutoLoad.php');
		}
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);


	if (ENVIRONMENT === 'development') {
		define('INCLUDE_PATH','http://localhost/gestao/');
		define('ICONS_URL', INCLUDE_PATH.'fonts/css/all.css');

		define('BASE_DIR_PAINEL',__DIR__.'/painel');

		define('HOST','localhost');
		define('USER','root');
		define('PASSWORD','');
		define('DATABASE','gestao');
		
	} else if (ENVIRONMENT === 'production') {
		define('INCLUDE_PATH','https://gustavoalvesdev.com.br/');
		define('INCLUDE_PATH',INCLUDE_PATH.'painel/');
		define('ICONS_URL', INCLUDE_PATH.'fonts/css/all.css');

		define('BASE_DIR_PAINEL',__DIR__.'/painel');

		define('HOST','localhost');
		define('USER','gustavo_site');
		define('PASSWORD','Y](nc8o/L2#');
		define('DATABASE','projeto_01');
	}

	


	//Conectar com banco de dados!
	

	//Constantes para o painel de controle
	define('NOME_EMPRESA','Gustavo Alves Dev');

	//Funções do painel
	function pegaCargo($indice){
		return Painel::$cargos[$indice];
	}

	function selecionadoMenu($par){
		/*<i class="fa fa-angle-double-right" aria-hidden="true"></i>*/
		$url = explode('/',@$_GET['url'])[0];
		if($url == $par){
			echo 'class="menu-active"';
		}
	}

	function verificaPermissaoMenu($permissao){
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			echo 'style="display:none;"';
		}
	}

	function verificaPermissaoPagina($permissao){
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			include('painel/pages/permissao_negada.php');
			die();
		}
	}

	function recoverPost($post) {
		if (isset($_POST[$post])) {
			echo $_POST[$post];
		}
	}
