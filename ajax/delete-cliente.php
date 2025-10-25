<?php 

//sleep(2);

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
define('DATABASE','gestao2');

$id = $_POST['id'];

$sql = MySql::conectar()->prepare('SELECT imagem FROM `tb_admin.clientes` WHERE id = :id');
$sql->bindValue(':id', $id);
$sql->execute();
$imagem = $sql->fetch()['imagem']; 

@unlink('../uploads/'.$imagem);

MySql::conectar()->exec('DELETE FROM `tb_admin.clientes` WHERE id = '.$id);
MySql::conectar()->exec("DELETE FROM `tb_admin.financeiro` WHERE id = $id");
